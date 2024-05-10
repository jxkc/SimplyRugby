<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NextOfKin extends Model
{
    use HasFactory;

    protected $primaryKey = 'kinid';

    protected $fillable = [
        'kin_name',
        'kin_address',
        'kin_phone',
    ];
}
