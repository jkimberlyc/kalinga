<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affiliation extends Model
{
    use HasFactory;

    protected $table = 'affiliations';
    protected $primaryKey = 'id';
    protected $fillable = [
        'doctor_id',
        'hospital_id',
    ];

    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor', 'id');
    }
}
