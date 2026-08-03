<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';
    use SoftDeletes;
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'country',
        'phone_code',
        'company_name',
        'services',
        'email',
        'contact',
        'message',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
 