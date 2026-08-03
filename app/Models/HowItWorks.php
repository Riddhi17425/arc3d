<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HowItWorks extends Model
{ 
    protected $table = 'howitworks';
    use SoftDeletes;    
    protected $fillable = [
        'id',
        'name',
        'description', 
        'image',
        'alt_tag',
        'status',  
        'created_at',
        'updated_at',  
        'deleted_at',
    ]; 
}
