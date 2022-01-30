<?php

namespace App\Http\Controllers;

use App\Models\ElectWarter;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ElectWaterController extends Controller
{
    function index()
    {
        //dd('test');
        $data = ElectWarter::all();


        // dd($room);

        return view('dashboards.admins.electwarterbins.index', compact('data'));
    }


    function add(Request $request)
    {
        // dd($request->all());
        $request->validate(
            [
                'electricity' => 'required|max:255',
                'warter' => 'required|max:255',



            ],
            [
                'electricity.required' => "กรุณาป้อนกรอกค่าไฟ",
                'electricity.max' => "ห้ามป้อนเกิน 255 ตัวอักษร",

                'warter.required' => "กรุณาป้อนกรอกค่าน้ำ",
                'warter.max' => "ห้ามป้อนเกิน 255 ตัวอักษร",





            ],

        );

        $data = new ElectWarter();
        $data->electricity = $request->electricity;
        $data->warter = $request->warter;
        $data->created_at = Carbon::now();


        if ($data->save()) {
            // return redirect()->back()->with('success', 'เพิ่มข้อมูลผู้ดูเเลระบบเรียบร้อยเเล้ว');
            return redirect()->back()->with('success', 'เพิ่มห้องพักสำเร็จ');
        } else {
            return redirect()->back()->with('error', 'เพิ่มห้องพักไม่สำเร็จ!');
        }
    }



    public function edit($id)
    {


        // $data = Room::join('room_types', 'room_types.id', '=', 'rooms.room_type')
        //     ->get(['room_types.id', 'rooms.id', 'rooms.status', 'rooms.room_number'])->find($id);

        $data = ElectWarter::find($id);
        //  dd($data);


        return view('dashboards.admins.electwarterbins.edit', compact('data'));
    }


    public function update(Request $request, $id)
    {
        // dd($request->all());

        // ตรวจสอบข้อมูล
        // dd($request->all());
        $request->validate(
            [
                'electricity' => 'required|max:255',
                'warter' => 'required|max:255',



            ],
            [
                'electricity.required' => "กรุณาป้อนกรอกค่าไฟ",
                'electricity.max' => "ห้ามป้อนเกิน 255 ตัวอักษร",

                'warter.required' => "กรุณาป้อนกรอกค่าน้ำ",
                'warter.max' => "ห้ามป้อนเกิน 255 ตัวอักษร",





            ],

        );

        ElectWarter::find($id)->update([
            'electricity' => $request->electricity,
            'warter' => $request->warter,

        ]);

        // return redirect()->route('services')->with('success', "อัพเดทประเภทห้องพักเรียบร้อย");
        return redirect()->route('admin.elect_water')->with('success', "อัพเดทข้อมูลห้องพักเรียบร้อย");
    }


    public function delete($id)
    {

        //1.ลบภาพ
        ElectWarter::find($id);
        //2.ลบข้อมูลจากฐานข้อมูล
        $delete = ElectWarter::find($id)->delete();
        return redirect()->back()->with('success', "ลบข้อมูลเรียบร้อย");
    }
}
