<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $primaryKey = 'doctorid';

    protected $fillable = [
        'doctor_name',
        'doctor_address',
        'doctor_phone',
    ];

    public function juniorDoc()
    {
        return $this->belongsTo(JuniorMember::class);
    }

    public function seniorDoc()
    {
        return $this->belongsTo(SeniorMember::class);
    }
}
