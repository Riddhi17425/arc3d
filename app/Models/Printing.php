<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Printing extends Model
{
    protected $table = 'printing';
    use SoftDeletes;
    protected $fillable = [
        'id',
        'title',
        'description', 
        'industires',
        'url',
        'image',
        'status',
        'alt_tag',
        'printing_material_desc',
        'printing_technology_desc',
        'printing_btob_desc',
        'updated_at',
        'deleted_at' 
    ];
}
 