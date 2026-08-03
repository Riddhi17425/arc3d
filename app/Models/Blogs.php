<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    protected $table = 'blogs';
    use SoftDeletes;
    protected $fillable = [
        'title',
        'short_description', 
        'front_image',
        'detail_image',
        'url',
        'meta_title',
        'meta_description',
        'date',
        'detail_description',
        'title_description',
        'status',
        'front_image_alt',
        'detail_image_alt',
        'updated_at',
        'deleted_at' 
    ];
    
    protected $casts = [
        'title_description' => 'array',
    ];
}
 