<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $primaryKey = "banner_id"; 

    protected $fillable = [
        'banner_name',
        'banner_image', 
        'banner_status', 
        'banner_title', 
        'banner_description'
    ];
}
