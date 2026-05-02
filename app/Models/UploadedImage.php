<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UploadedImage extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image_path',
        'filename',
        'file_size',
        'mime_type',
        'width',
        'height',
        'order_number',
        'is_featured',
        'is_published'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
    ];

    public function getImageUrlAttribute()
    {
        return asset($this->image_path);
    }

    public function getFileSizeFormattedAttribute()
    {
        $bytes = $this->file_size;
        $units = ['B', 'KB', 'MB', 'GB'];

        for ($i = 0; $bytes > 1024 && $i < 3; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }
}
