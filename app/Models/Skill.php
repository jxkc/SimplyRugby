<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $table = 'skills';

    protected $fillable = [
        'passing_standard',
        'passing_spin',
        'passing_pop',
        'tackling_front_rear',
        'tackling_rear_side',
        'tackling_side',
        'tackling_scrabble',
        'kicking_drop_punt',
        'kicking_drop_grubber',
        'kicking_drop_goal',
    ];

    // Define the inverse relationship with the PlayerProfile model
    public function playerProfile()
    {
        return $this->belongsTo(PlayerProfile::class);
    }
}
