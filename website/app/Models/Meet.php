<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meet extends Model
{
    use HasFactory;

    protected $primaryKey = "Meet_id"; 

    protected $fillable = [
        'appointment_id',
        'Meet_treatment',
        'Meet_date', 
        'Meet_note', 
        'Meet_charges',
        'Meet_documents'
    ];
}
