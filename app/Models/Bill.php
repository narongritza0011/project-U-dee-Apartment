<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_number',
        'bill',
        'rental_fee',
        'water_now_meter',
        'water_old_meter',
        'water_unit',
        'water',
        'water_sum',
        'electric_now_meter',
        'electric_old_meter',
        'electric_unit',
        'electric',
        'electric_sum',
        'total',
    ];
}
