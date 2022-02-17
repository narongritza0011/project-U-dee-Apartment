<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'about',
        'tel',
        'email',
        'facebook_name',
        'facebook_link',
        'ig_link',
        'map',


    ];
}
