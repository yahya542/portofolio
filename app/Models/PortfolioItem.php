<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PortfolioItem extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image_path',
        'category_id',
        'project_url',
        'github_url',
        'order_number',
        'is_featured',
        'is_published'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
