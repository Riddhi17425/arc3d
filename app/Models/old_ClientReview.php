<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientReview extends Model
{
    protected $table = 'client_revivew';
    use SoftDeletes;
    protected $fillable = [
        'id',
        'name',
        'description',
        'image',
        'rating',
        'status',
        'alt',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
