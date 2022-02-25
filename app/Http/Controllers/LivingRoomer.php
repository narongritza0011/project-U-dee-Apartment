<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Roomer;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LivingRoomer extends Controller
{
    public function index()
    {
        // $roomers = Roomer::leftJoin('rooms', 'rooms.id', '=', 'roomers.room_number')
        //     ->get(['rooms.room_number', 'roomers.full_name', 'roomers.id', 'roomers.card_number', 'roomers.tel']);
        // dd($roomers);
        $roomers = Roomer::join('rooms', 'rooms.id', '=', 'roomers.room_number')->where('roomers.status', 1)->get(['rooms.room_number', 'roomers.full_name', 'roomers.id', 'roomers.card_number', 'roomers.tel']);






        // select count(*) from roomers join bills on bills.room_number = roomers.room_number where bills.status = 1 and roomers.id = 6


        return view('dashboards.admins.livings.index', compact('roomers'));
    }



    public function edit($id)
    {


        $data = Roomer::join('rooms', 'rooms.id', '=', 'roomers.room_number')->get(['rooms.room_number', 'roomers.full_name', 'roomers.id', 'roomers.card_number', 'roomers.tel', 'roomers.contact_other'])->find($id);
        $roomer_id = $data['id'];

        $check = Roomer::join('bills', 'bills.room_number', '=', 'roomers.room_number')->where('bills.status', 1)->where('roomers.id', $roomer_id)->count();
        // dd($check);
        //  $room_n = Roomer::leftJoin('rooms', 'rooms.id', '=', 'roomers.room_number')
        //      ->get(['rooms.room_number','roomers.id'])->find($id);
        //  dd($room_n);

        // $room = Room::all();

        // $data = Roomer::find($id);
        return view('dashboards.admins.livings.edit', compact('data', 'check'));
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


        $data =  Roomer::find($id);
        $data->end_date = $request->end_date;
        $data->status = 2;






        // $bill =  Room::find($request->room_number);
        // dd($request->room_number);

        // dd($bill->status);



        if ($data->update()) {

            Room::where('room_number', $request->room_number)->update(['status' => 1]);


            return redirect()->route('living.all')->with('success', 'อัพเดทข้อมูลสำเร็จ');
        }

        return redirect()->back()->with('error', 'อัพเดทข้อมูลไม่สำเร็จ');
    }
}
