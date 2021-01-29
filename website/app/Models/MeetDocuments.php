<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetDocuments extends Model
{
    use HasFactory;
    protected $primaryKey = "Meet_Document_id"; 

    protected $fillable = [
        'Meet_Document_meet_id',
        'Meet_Document_imageurl',
        'Meet_Document_patient_id'
    ];
}
