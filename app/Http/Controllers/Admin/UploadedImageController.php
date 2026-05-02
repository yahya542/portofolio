<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UploadedImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class UploadedImageController extends Controller
{
    /**
     * Display a listing of uploaded images in grid layout.
     */
    public function index()
    {
        $images = UploadedImage::where('is_published', true)
            ->orderBy('order_number')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.images.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'images' => 'required|array|max:10',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120', // 5MB max
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        $uploadedImages = [];

        foreach ($request->file('images') as $file) {
            // Generate unique filename
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            // Store original image
            $path = $file->storeAs('uploads/images', $filename, 'public');

            // Get image dimensions
            $imageInfo = getimagesize($file->getPathname());
            $width = $imageInfo[0] ?? null;
            $height = $imageInfo[1] ?? null;

            // Create thumbnail (optional)
            $thumbnailPath = null;
            try {
                $image = Image::read($file->getPathname());
                $thumbnail = $image->scale(width: 300);
                $thumbnailFilename = 'thumb_' . $filename;
                $thumbnailPath = 'uploads/thumbnails/' . $thumbnailFilename;
                Storage::disk('public')->put($thumbnailPath, $thumbnail->encode());
            } catch (\Exception $e) {
                // Thumbnail creation failed, continue without it
            }

            // Create database record
            $uploadedImage = UploadedImage::create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'image_path' => $path,
                'filename' => $filename,
                'file_size' => $file->getSize(),
                'mime_type' => $file->getMimeType(),
                'width' => $width,
                'height' => $height,
                'order_number' => UploadedImage::max('order_number') + 1,
                'is_featured' => false,
                'is_published' => true,
            ]);

            $uploadedImages[] = $uploadedImage;
        }

        return redirect()->route('admin.images.index')
            ->with('success', count($uploadedImages) . ' image(s) uploaded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(UploadedImage $uploadedImage)
    {
        return view('admin.images.show', compact('uploadedImage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UploadedImage $uploadedImage)
    {
        return view('admin.images.edit', compact('uploadedImage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UploadedImage $uploadedImage)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
            'order_number' => 'integer',
        ]);

        $uploadedImage->update($request->only([
            'title', 'description', 'is_featured', 'is_published', 'order_number'
        ]));

        return redirect()->route('admin.images.index')
            ->with('success', 'Image updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UploadedImage $uploadedImage)
    {
        // Delete files from storage
        Storage::disk('public')->delete($uploadedImage->image_path);

        // Delete thumbnail if exists
        $thumbnailPath = str_replace('uploads/images/', 'uploads/thumbnails/', $uploadedImage->image_path);
        if (Storage::disk('public')->exists($thumbnailPath)) {
            Storage::disk('public')->delete($thumbnailPath);
        }

        // Delete from database
        $uploadedImage->delete();

        return redirect()->route('admin.images.index')
            ->with('success', 'Image deleted successfully.');
    }

    /**
     * Bulk delete images.
     */
    public function bulkDelete(Request $request)
    {
        $request->validate([
            'image_ids' => 'required|array',
            'image_ids.*' => 'exists:uploaded_images,id',
        ]);

        $count = 0;
        foreach ($request->image_ids as $id) {
            $image = UploadedImage::find($id);
            if ($image) {
                // Delete files
                Storage::disk('public')->delete($image->image_path);
                $thumbnailPath = str_replace('uploads/images/', 'uploads/thumbnails/', $image->image_path);
                if (Storage::disk('public')->exists($thumbnailPath)) {
                    Storage::disk('public')->delete($thumbnailPath);
                }
                $image->delete();
                $count++;
            }
        }

        return redirect()->route('admin.images.index')
            ->with('success', $count . ' image(s) deleted successfully.');
    }

    /**
     * Update image order.
     */
    public function updateOrder(Request $request)
    {
        $request->validate([
            'orders' => 'required|array',
            'orders.*.id' => 'required|integer|exists:uploaded_images,id',
            'orders.*.order' => 'required|integer',
        ]);

        foreach ($request->orders as $orderData) {
            UploadedImage::where('id', $orderData['id'])
                ->update(['order_number' => $orderData['order']]);
        }

        return response()->json(['success' => true]);
    }
}
