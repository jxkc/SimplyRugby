<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeniorMember extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'sru_number',
        'doctorid',
        'kinid',
        'position'
    ];

    public function nextOfKin()
    {
        return $this->hasMany(NextOfKin::class, 'kinid', 'kinid');
    }

    public function doctors()
    {
        return $this->hasOne(Doctor::class, 'kinid', 'kinid');
    }


    public function membership()
    {
        return $this->belongsTo(Member::class, 'sru_number', 'sru_number');
    }
}