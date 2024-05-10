<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use HasFactory;

    protected $primaryKey = 'guardianid';

    protected $fillable = [
        'guardian_name',
        'guardian_address',
        'guardian_postcode',
        'guardian_phone',
        'guardian_signature',
    ];
}
