<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Technologies extends Model
{
    protected $table = 'technologies';
    use SoftDeletes;
    protected $fillable = [
        'id',
        'shortname',
        'fullname',
        'url',
        'description',
        'image',
        'status', 
        'alt_tag',
        'updated_at',
        'deleted_at'
    ];
}
 