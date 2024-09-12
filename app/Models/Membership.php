<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = ['reg_no', 'player_name', 'phone', 'email', 'photo', 'status', 'city', 'nationality', 'player_type', 'jersey_name', 'jersey_size', 'jersey_number', 'payment_screenshot'];

    public function player()
    {
        return $this->belongsTo(Player::class, 'phone', 'phone');
    }
}
