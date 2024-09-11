<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MatchResult extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['team_1_id', 'team_2_id', 'won_team_id', 'team_1_score', 'team_2_score', 'team_1_wicket', 'team_2_wicket', 'team_1_over', 'team_2_over', 'won_by', 'won_by_no'];

    public function team_1()
    {
        return $this->belongsTo(Team::class, 'team_1_id');
    }

    public function team_2()
    {
        return $this->belongsTo(Team::class, 'team_2_id');
    }

    public function won_team()
    {
        return $this->belongsTo(Team::class, 'won_team_id');
    }
}