<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomTypeRequestForm;
use App\Models\RoomType;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class RoomTypeController extends Controller
{

    function room_type()
    {
        $room = RoomType::all();
        return view('dashboards.admins.room_types.index', compact('room'));
    }


    function addRoom_type(Request $request)
    {

        $request->validate(
            [
                'name' => 'required|unique:room_types|max:255',

            ],
            [
                'name.required' => "กรุณาป้อนชื่อประเภทห้องพัก",
                'name.max' => "ห้ามป้อนเกิน 255 ตัวอักษร",
                'name.unique' => "ชื่อประเภทห้องซ้ำ",


            ],

        );

        $room = new RoomType();
        $room->name = $request->name;
        $room->created_at = Carbon::now();

        if ($room->save()) {
            // return redirect()->back()->with('success', 'เพิ่มข้อมูลผู้ดูเเลระบบเรียบร้อยเเล้ว');
            return redirect()->back()->with('success', 'เพิ่มประเภทห้องสำเร็จ');
        } else {
            return redirect()->back()->with('error', 'เพิ่มประเภทห้องไม่สำเร็จ!');
        }
    }


    public function editRoom_type($id)
    {
        $room = RoomType::find($id);
        //dd($department->department_name);


        return view('dashboards.admins.room_types.edit', compact('room'));
    }


    public function updateRoom_type(RoomTypeRequestForm $request, $id)
    {
        // dd($request->all());
        // ตรวจสอบข้อมูล

        RoomType::find($id)->update([
            'name' => $request->name,

        ]);


        // return redirect()->route('services')->with('success', "อัพเดทประเภทห้องพักเรียบร้อย");
        return redirect()->route('admin.room_type')->with('success', "อัพเดทประเภทห้องพักเรียบร้อย");
    }



    public function deleteRoom_type($id)
    {

        //1.ลบภาพ
        RoomType::find($id);
        //2.ลบข้อมูลจากฐานข้อมูล
        $delete = RoomType::find($id)->delete();
        return redirect()->back()->with('success', "ลบข้อมูลเรียบร้อย");
    }
}
