<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreeMeet extends Model
{
    use HasFactory;
    protected $primaryKey = "FreeMeet_id"; 

    protected $fillable = [
        'FreeMeet_user_id',
        'FreeMeet_cancled_meet_id',
        'FreeMeet_claimed_meet_id', 
        'FreeMeet_reason', 
        'FreeMeet_status'
    ];
}
