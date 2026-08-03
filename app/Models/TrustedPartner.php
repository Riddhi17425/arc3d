<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrustedPartner extends Model
{
    protected $table = 'trusted_partner';
    use SoftDeletes;    
    protected $fillable = [
        'id',
        'name',
        'image',
        'alt_tag',
        'status',  
        'created_at',
        'updated_at', 
        'deleted_at',
    ]; 
}
