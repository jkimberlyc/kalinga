<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocSpecialty extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'specialty_id'
    ];
}
