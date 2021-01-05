<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;
    protected $primaryKey = "advertisement_id"; 

    protected $fillable = [
        'advertisement_name',
        'advertisement_image', 
        'advertisement_status', 
        'advertisement_title', 
        'advertisement_description'
    ];
}
