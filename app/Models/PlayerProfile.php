<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class PlayerProfile extends Model
{
    use HasFactory;

    public function member()
    {
        return $this->belongsTo(Member::class, 'sru_number', 'sru_number');
    }

    public function skills()
    {
        return $this->hasMany(Skill::class, 'skillid');
    }

    protected $fillable = [
        'sru_number',
        'squad',
        'comment',
        'medical_note',
    ];
}
