<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    protected $table = 'gallery';
    use SoftDeletes;    
    protected $fillable = [
        'id',
        'gallery_type', 
        'image',
        'alt_tag',
        'status',  
        'created_at',
        'updated_at', 
        'deleted_at',
    ]; 
}
