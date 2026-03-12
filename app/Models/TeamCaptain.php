<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamCaptain extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'full_name',
        'birthday',
        'age',
        'address',
        'id_image',
        'ml_id',
        'server',
        'ml_username',
        'role',
        'selfie_image'
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
