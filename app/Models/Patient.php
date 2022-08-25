<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstName',
        'middleName',
        'lastName',
        'gender',
        'birthdate',
        'phoneNumber',
        'mobileNumber',
        'emergencyContact',
        'address',
        'city',
        'province',
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id');
    }
}
