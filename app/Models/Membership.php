<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = ['player_name', 'phone', 'photo', 'status', 'city', 'nationality', 'player_type', 'jersey_name', 'jersey_size', 'jersey_number', 'payment_screenshot'];
}
