<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceInquires extends Model
{ 
    protected $table = 'service_enquiry';
    use SoftDeletes;    
    protected $fillable = [
        'id',
        'fullname',
        'company_name',
        'service_name',  
        'contact',
        'email',  
        'message',
        'created_at',
        'updated_at',
    ]; 
}
