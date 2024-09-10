<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UpcomingMatch extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'team_1_id',
        'team_2_id',
        'location',
        'type',
        'date',
        'time',
    ];

    public function team_1()
    {
        return $this->belongsTo(Team::class, 'team_1_id');
    }

    public function team_2()
    {
        return $this->belongsTo(Team::class, 'team_2_id');
    }
}