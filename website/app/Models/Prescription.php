<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $primaryKey = "Prescription_id"; 

    protected $fillable = [
        'Appointment_id',
        'Medicine_Type',
        'Medicine_name', 
        'Medicine_quantity', 
        'Medicine_time'
    ];
}
