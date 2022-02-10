<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Roomer;
use Illuminate\Http\Request;

class LivingRoomer extends Controller
{
    public function index()
    {
        // $roomers = Roomer::leftJoin('rooms', 'rooms.id', '=', 'roomers.room_number')
        //     ->get(['rooms.room_number', 'roomers.full_name', 'roomers.id', 'roomers.card_number', 'roomers.tel']);
        // dd($roomers);

        // $data = Room::all();
        $roomers = Roomer::join('rooms', 'rooms.id', '=', 'roomers.room_number')->where('roomers.status', 1)->get(['rooms.room_number', 'roomers.full_name', 'roomers.id', 'roomers.card_number', 'roomers.tel']);
        // $roomers = Roomer::all();
        return view('dashboards.admins.livings.index', compact('roomers'));
    }



    public function edit($id)
    {


        // $room = Roomer::leftJoin('rooms', 'rooms.id', '=', 'roomers.room_number')
        //     ->get(['rooms.room_number']);
        // dd($data);

        $room = Room::all();

        $data = Roomer::find($id);
        return view('dashboards.admins.livings.edit', compact('data', 'room'));
    }



    public function update(Request $request, $id)
    {
        //  dd($request->end_date);
        $request->validate(
            [
                'end_date' => 'required',



            ],
            [
                'end_date.required' => "กรุณาเลือกวันที่ย้ายออก",
            ],

        );


        Roomer::find($id)->update([
            'end_date' => $request->end_date,
            'status' => 2,
            

        ]);
        return redirect()->route('living.all')->with('success', "อัพเดทข้อมูลสำเร็จ");
    }
}
