<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends Model
{
    protected $table = 'faqs';
    use SoftDeletes;    
    protected $fillable = [
        'id',
        'faq_url', 
        'title_description', 
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'title_description' => 'array',
    ];
}
