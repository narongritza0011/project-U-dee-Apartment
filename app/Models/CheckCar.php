<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckCar extends Model
{
    use HasFactory;
    protected $fillable = [
        'car_id',
        'oil_status',
        'rubber_status',
        'elect_status',
        'status',
        'take_car',

    ];
}
