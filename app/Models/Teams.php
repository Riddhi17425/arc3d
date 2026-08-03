<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teams extends Model
{ 
    protected $table = 'teams';
    use SoftDeletes;    
    protected $fillable = [
        'id',
        'name',
        'designation',
        'description',
        'image',
        'alt_tag',
        'status',  
        'created_at',
        'updated_at',  
        'deleted_at',
    ]; 
}
