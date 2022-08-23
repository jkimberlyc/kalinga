<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstName',
        'middleName',
        'lastName',
        'phoneNumber',
        'mobileNumber',
        'address',
        'city',
        'province',
        'license',
    ];

    protected $casts = [
        'specialization_id' => 'array'
    ];
}
