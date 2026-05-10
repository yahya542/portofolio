<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResumeSection extends Model
{
    protected $fillable = [
        'section_type',
        'title',
        'content',
        'order_number',
        'is_active'
    ];

    protected $casts = [
        'content' => 'array', // JSON cast to array
        'is_active' => 'boolean'
    ];

    public function scopeOrdered($query)
    {
        return $query->orderBy('order_number')->orderBy('created_at');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
