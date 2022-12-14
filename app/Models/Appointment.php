<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'symptoms',
        'date',
        'time',
        'patient_id',
        'affiliation_id',
        'doc_specialty_id',
        'status',
    ];
}
