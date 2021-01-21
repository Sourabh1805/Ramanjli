<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $primaryKey = "Patient_id"; 

    protected $fillable = [
        'Patient_name',
        'User_id',
        'Patient_dob', 
        'Patient_gender', 
        'Secret_key'
    ];
}
