<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'floor_id','name','capacity','type','facilities','price_hour','price_day'
    ];

    protected $casts = [
        'facilities' => 'array',
        'capacity' => 'integer',
        'price_hour' => 'decimal:2',
        'price_day'  => 'decimal:2',
    ];

    public function floor() {
        return $this->belongsTo(Floor::class);
    }

    public function bookings() {
        return $this->hasMany(Booking::class);
    }
}
