<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'tel',
        'brand',
        'model',
        'number_car',
        'author',
        'check_date',
        'status',

    ];
}
