<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    function index()
    {
        
        return view('dashboards.admins.rooms.index');
    }
}
