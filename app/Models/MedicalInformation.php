<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalInformation extends Model
{
    use HasFactory;

     protected $fillable = [
        'user_id',
        'national_id',
        'emergency_contact',
        'emergency_contact_name',
        'yob',
        'blood_type',
        'medical_conditions',
        'allergies',
        'other'
    ];


/*    protected $hidden = [
        'national_id',

    ];*/

 

}
