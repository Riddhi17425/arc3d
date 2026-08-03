<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class FeatureProject extends Model
{
    protected $table = 'feature_project';
    use SoftDeletes;
    protected $fillable = [
        'id',
        'title',
        'description', 
        'services',
        'url',
        'home_status',
        'image',
        'status', 
        'alt_tag',
        'updated_at',
        'deleted_at' 
    ];
}
 