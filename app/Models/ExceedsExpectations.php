<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExceedsExpectations extends Model
{ 
    protected $table = 'exceeds_expectations';
    use SoftDeletes;    
    protected $fillable = [
        'id',
        'name',
        'description',
        'status',  
        'created_at',
        'updated_at',  
        'deleted_at',
    ]; 
}
