<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'title',
        'description',
        'date_obtained',
        'credential_id',
        'image_path',
        'order_number'
    ];
}
