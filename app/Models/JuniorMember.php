<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JuniorMember extends Model
{
    use HasFactory;

    // Define the relationship with the Member model
    public function membership()
    {
        return $this->belongsTo(Member::class, 'sru_number', 'sru_number');
    }

    public function doctor()
    {
        return $this->hasMany(Doctor::class);
    }

    public function guardian()
    {
        return $this->hasMany(Guardian::class);
    }

    protected $table = 'junior_members';

    protected $fillable = [
        'sru_number',
        'doctorid',
        'guardianid_1',
        'guardianid_2',
        'position',
        // Add other junior member attributes here
    ];
}
