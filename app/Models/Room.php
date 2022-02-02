<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_type',
        'room_number',
        'status',
    ];

    // public function statusName()
    // {
    //     if ($this->status == 1) {
    //         return 'ว่างให้เช่า';
    //     } elseif ($this->status == 2) {
    //         # code...
    //         return 'มีผู้เช่าเเล้ว';
    //     } elseif ($this->status == 3) {
    //         # code...
    //         return 'ซ่อมเเซม';
    //     }
    // }
}
