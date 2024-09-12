<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['sr_no', 'name', 'image', 'email', 'phone', 'type', 'player_type', 'team_id', 'active'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
