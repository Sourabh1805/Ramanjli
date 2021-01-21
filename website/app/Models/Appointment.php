<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $primaryKey = "Appointment_id"; 

    protected $fillable = [
        'patient_id',
        'patient_name',
        'reason', 
        'appointment_status', 
        'Time_and_Date',
        'book_date'
    ];
}
