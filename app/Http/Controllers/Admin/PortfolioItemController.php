<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PortfolioItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PortfolioItemController extends Controller
{
    /**
     * Display a listing of the portfolio items.
     */
    public function index()
    {
        $portfolioItems = PortfolioItem::with('category')
            ->orderBy('order_number')
            ->get();

        return view('admin.portfolio.index', compact('portfolioItems'));
    }

    /**
     * Show the form for creating a new portfolio item.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.portfolio.create', compact('categories'));
    }

    /**
     * Store a newly created portfolio item.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_path' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'project_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'order_number' => 'integer',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        PortfolioItem::create($validated);

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio item created successfully.');
    }

    /**
     * Display the specified portfolio item.
     */
    public function show(PortfolioItem $portfolioItem)
    {
        return view('admin.portfolio.show', compact('portfolioItem'));
    }

    /**
     * Show the form for editing the specified portfolio item.
     */
    public function edit(PortfolioItem $portfolioItem)
    {
        $categories = Category::all();
        return view('admin.portfolio.edit', compact('portfolioItem', 'categories'));
    }

    /**
     * Update the specified portfolio item.
     */
    public function update(Request $request, PortfolioItem $portfolioItem)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'project_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'order_number' => 'integer',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120', // 5MB max
        ]);

        // Handle image upload if a new file is provided
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            
            // Generate unique filename
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            
            // Store the uploaded image in storage/app/public/uploads/portfolio
            $path = $file->storeAs('uploads/portfolio', $filename, 'public');
            
            // Delete old image if it exists
            if ($portfolioItem->image_path && file_exists(public_path($portfolioItem->image_path))) {
                @unlink(public_path($portfolioItem->image_path));
            }
            
            // Store path with 'storage/' prefix for public access
            $validated['image_path'] = 'storage/' . $path;
        } else {
            // Keep existing image_path from hidden input
            $validated['image_path'] = $request->input('image_path', $portfolioItem->image_path);
        }

        $validated['slug'] = Str::slug($validated['title']);

        $portfolioItem->update($validated);

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio item updated successfully.');
    }

    /**
     * Remove the specified portfolio item.
     */
    public function destroy(PortfolioItem $portfolioItem)
    {
        $portfolioItem->delete();

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio item deleted successfully.');
    }
}
