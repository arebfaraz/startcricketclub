<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerStat extends Model
{
    use HasFactory;

    protected $fillable = ['player_id', 'matches', 'innings', 'runs', 'strike_rate', 'highest_runs', 'catches', 'overs', 'wickets', 'fours', 'sixes', 'fifties', 'hundreds', 'average', 'economy'];
}
