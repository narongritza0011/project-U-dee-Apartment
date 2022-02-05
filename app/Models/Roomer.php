<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roomer extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_number',
        'card_number',
        'full_name',
        'tel',
        'contact_other',
        'status',
        'start_date',
    ];
}
