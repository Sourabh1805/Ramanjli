<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slots extends Model
{
    use HasFactory;

    protected $primaryKey = "Slot_id"; 

    protected $fillable = [
        'Slot_date',
        'Slot_is_available',
        'Slot_max_appointment_count_change',
    ];
}
