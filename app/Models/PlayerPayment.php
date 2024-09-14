<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerPayment extends Model
{
    use HasFactory;

    protected $fillable = ['player_id', 'payment_date', 'amount'];
}
