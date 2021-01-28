<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $primaryKey = "Patient_id"; 

    protected $fillable = [
        'Patient_user_id',
        'Patient_username',
        'Patient_dob', 
        'Patient_gender', 
        'Patient_secret_key',
        'Patient_status'
    ];
}
