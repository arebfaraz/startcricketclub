<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['sr_no', 'name', 'image', 'email', 'phone', 'type', 'player_type', 'team_id', 'active', 'status_in_cambodia', 'city', 'nationality', 'jersey_name', 'jersey_size', 'jersey_number', 'payment_screenshot', 'is_payment'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function payments()
    {
        return $this->hasMany(PlayerPayment::class);
    }

    public function current_month_payment()
    {
        return $this->hasOne(PlayerPayment::class)
            ->whereMonth('payment_date', Carbon::now()->month)
            ->whereYear('payment_date', Carbon::now()->year);
    }
}
