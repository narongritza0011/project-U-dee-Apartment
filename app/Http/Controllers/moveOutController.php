<?php

namespace App\Http\Controllers;

use App\Models\Roomer;
use Illuminate\Http\Request;

class moveOutController extends Controller
{
    public function index()
    {
        // $roomers = Roomer::leftJoin('rooms', 'rooms.id', '=', 'roomers.room_number')
        //     ->get(['rooms.room_number', 'roomers.full_name', 'roomers.id', 'roomers.card_number', 'roomers.tel']);
        // dd($roomers);

        // $data = Room::all();
        $roomers = Roomer::join('rooms', 'rooms.id', '=', 'roomers.room_number')->where('roomers.status', 2)->get(['rooms.room_number', 'roomers.full_name','roomers.end_date', 'roomers.id', 'roomers.card_number', 'roomers.tel']);
        // $roomers = Roomer::all();
        return view('dashboards.admins.moveouts.index', compact('roomers'));
    }

}
