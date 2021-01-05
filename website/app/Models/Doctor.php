<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $primaryKey = "Doctor_id"; 
 /**
     * The attributes that are mass assignable.
     * Doctor_holiday
     * 1: Monday 
     * 2: Tuesday
     * 3: Wednesday
     * 4: Thursday
     * 5: Friday
     * 6: Saturday
     * 7: Sunday
     * @var array
     */
    protected $fillable = [
        "Doctor_user_id", 
        'Doctor_name',
        'Doctor_degree',
        'Doctor_specialization', 
        'Doctor_address', 
        'Doctor_contact_number', 
        'Doctor_maximum_number_of_appointments', 
        'Doctor_clinic_time_from', 
        'Doctor_clinic_time_to', 
        'Doctor_holiday', 
    ];
}
