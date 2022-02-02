<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class RoomController extends Controller
{
    function index()
    {
        $room_type = RoomType::all();

        $room = Room::leftJoin('room_types', 'room_types.id', '=', 'rooms.room_type')
            ->get(['room_types.name', 'rooms.id', 'rooms.status', 'rooms.room_number', 'rooms.created_at']);
        // dd($room);

        return view('dashboards.admins.rooms.index', compact('room', 'room_type'));
    }


    function add(Request $request)
    {
        // dd($request->all());
        $request->validate(
            [
                'room_type' => 'required|max:255',
                'room_number' => 'required|unique:rooms|max:255',
                'status' => 'required|max:255',


            ],
            [
                'room_type.required' => "กรุณาป้อนชื่อประเภทห้องพัก",
                'room_type.max' => "ห้ามป้อนเกิน 255 ตัวอักษร",

                'room_number.required' => "กรุณาป้อนเลขห้องพัก",
                'room_number.max' => "ห้ามป้อนเกิน 255 ตัวอักษร",
                'room_number.unique' => "เลขห้องพักซ้ำ",

                'status.required' => "กรุณาเลือกสถานะ",
                'status.max' => "ห้ามป้อนเกิน 255 ตัวอักษร",


            ],

        );

        $room = new Room();
        $room->room_type = $request->room_type;
        $room->room_number = $request->room_number;
        $room->status = $request->status;
        $room->created_at = Carbon::now();


        if ($room->save()) {
            // return redirect()->back()->with('success', 'เพิ่มข้อมูลผู้ดูเเลระบบเรียบร้อยเเล้ว');
            return redirect()->back()->with('success', 'เพิ่มห้องพักสำเร็จ');
        } else {
            return redirect()->back()->with('error', 'เพิ่มห้องพักไม่สำเร็จ!');
        }
    }



    public function edit($id)
    {

        $room_type = RoomType::all();

        // $data = Room::join('room_types', 'room_types.id', '=', 'rooms.room_type')
        //     ->get(['room_types.id', 'rooms.id', 'rooms.status', 'rooms.room_number'])->find($id);

        $data = Room::find($id);
        //  dd($data);


        return view('dashboards.admins.rooms.edit', compact('data', 'room_type'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());

        // ตรวจสอบข้อมูล
        $request->validate(
            [
                'room_type' => 'required|max:255',
                'status' => 'required|max:255',
                'room_number' => ['required', 'string', 'max:255', Rule::unique('rooms')->ignore($id)],


            ],
            [
                'room_type.required' => "กรุณาป้อนชื่อประเภทห้องพัก",
                'room_type.max' => "ห้ามป้อนเกิน 255 ตัวอักษร",

                'room_number.required' => "กรุณาป้อนเลขห้องพัก",
                'room_number.max' => "ห้ามป้อนเกิน 255 ตัวอักษร",

                'status.required' => "กรุณาเลือกสถานะ",
                'status.max' => "ห้ามป้อนเกิน 255 ตัวอักษร",


            ],

        );

        Room::find($id)->update([
            'room_type' => $request->room_type,
            'room_number' => $request->room_number,
            'status' => $request->status,


        ]);



        // return redirect()->route('services')->with('success', "อัพเดทประเภทห้องพักเรียบร้อย");
        return redirect()->route('admin.room')->with('success', "อัพเดทข้อมูลห้องพักเรียบร้อย");
    }

    public function delete($id)
    {

        //1.ลบภาพ
        Room::find($id);
        //2.ลบข้อมูลจากฐานข้อมูล
        $delete = Room::find($id)->delete();
        return redirect()->back()->with('success', "ลบข้อมูลเรียบร้อย");
    }
}
