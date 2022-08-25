<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'doctors';
    protected $primaryKey = 'id';
    protected $fillable = [
        'firstName',
        'middleName',
        'lastName',
        'gender',
        'phoneNumber',
        'mobileNumber',
        'address',
        'city',
        'province',
        'license',
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id');
    }

    public function affiliations()
    {
        return $this->hasMany('App\Models\Affiliation', 'doctor_id');
    }
}
