<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingSession extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'training_sessions';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'trainingsessionid';

    protected $fillable = [
        'dos', //date of session
        'location',
        'time',
        'session_note',
        'medical_report',
    ];
}
