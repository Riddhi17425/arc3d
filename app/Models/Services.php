<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table = 'services';
    use SoftDeletes;
    protected $fillable = [
        'id',
        'title',
        'description',
        'url',
        'image',
        'status',
        'alt_tag',
        'back_alt_tag',
        'back_image',
        'service_short_desc',
        'howitworks',
        'exceeds_expectations',
        'its_worth_description',
        'its_worth_image',
        'its_worth_image_alt',
        'howitworks_short_desc',
        'howitworks_desc',
        'meta_title',
        'meta_description',
        'created_at',
        'updated_at',
        'deleted_at' 
    ]; 
}
 