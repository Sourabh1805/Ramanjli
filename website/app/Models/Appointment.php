<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $primaryKey = "Appointment_id"; 

    protected $fillable = [
        'Appointment_patient_id',
        'Appointment_reason',
        'Appointment_date', 
        'Appointment_charges', 
        'Appointment_status',
        'Appointment_isPaymentComplete'
    ];
}
