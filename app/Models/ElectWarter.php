<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectWarter extends Model
{
    use HasFactory;
    protected $fillable = [
        'electricity',
        'warter',
        
    ];
}
