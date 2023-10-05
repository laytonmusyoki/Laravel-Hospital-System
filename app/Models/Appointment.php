<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor',
        'username',
        'name',
        'email',
        'phone',
        'time',
        'address',
        'action',
        'testname',
        'allergies',
        'medication',
        'testmethod',
        'testcost'
    ];
}
