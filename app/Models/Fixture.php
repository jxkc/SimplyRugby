<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'fixtureid';

    protected $fillable = [
        'opposition_name',
        'dom', // date of match
        'location',
        'kick_off', // time of kick off
        'result', // result of the match
        'score', // score of teams 36/23 ex..
    ];
}
