<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Roomer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class RoomerController extends Controller
{
    public function index()
    {



        $data = Room::all();
        // $roomers = Roomer::where('status', 1)->get();
        $roomers = Roomer::all();
        return view('dashboards.admins.roomers.index', compact('data', 'roomers'));
    }


    public function store(Request $request)
    {
        // dd($request->all());


        $request->validate(
            [
                'room_number' => 'required',
                'card_number' => 'required|max:13',
                'full_name' => 'required|max:255',
                'tel' => 'required|max:10',
                'contact_other' => 'required|max:255',
                'start_date' => 'required',


            ],
            [
                'room_number.required' => "กรุณาเลือกเลขห้องพัก",

                'card_number.required' => "กรุณากรอกเลขบัตรประชาชน",
                'card_number.max' => "ห้ามป้อนเกิน 13 ตัว",
                'full_name.required' => "กรุณากรอกชื่อ-นามสกุล",
                'full_name.max' => "ห้ามป้อนเกิน 255 ตัว",
                'tel.required' => "กรุณากรอกเบอร์ติดต่อ",
                'tel.max' => "ห้ามป้อนเกิน 10 ตัว",
                'contact_other.required' => "กรุณากรอกผู้ติดต่อกรณีฉุกเฉิน",
                'contact_other.max' => "ห้ามป้อนเกิน 255 ตัว",
                'start_date.required' => "กรุณาเลือกวันที่เข้าพัก",

            ],

        );

        $data = new Roomer();
        $data->room_number = $request->room_number;
        $data->card_number = $request->card_number;
        $data->full_name = $request->full_name;
        $data->tel = $request->tel;
        $data->contact_other = $request->contact_other;
        $data->status = 1;
        $data->start_date = $request->start_date;
        $data->created_at = Carbon::now();


        if ($data->save()) {
            // return redirect()->back()->with('success', 'เพิ่มข้อมูลผู้ดูเเลระบบเรียบร้อยเเล้ว');
            return redirect()->back()->with('success', 'เพิ่มข้อมูลสำเร็จ');
        } else {
            Alert::error('เพิ่มข้อมูลไม่สำเร็จ');
            return redirect()->back()->with('error');
        }
    }



    public function edit($id)
    {

        $room = Room::all();

        $data = Roomer::find($id);
        return view('dashboards.admins.roomers.edit', compact('data', 'room'));
    }



    public function update(Request $request, $id)
    {


        // dd($request->all());


        $request->validate(
            [
                'room_number' => 'required',
                'card_number' => 'required|max:13',
                'full_name' => 'required|max:255',
                'tel' => 'required|max:10',
                'contact_other' => 'required|max:255',
                'start_date' => 'required',
                'status' => 'required',


            ],
            [
                'room_number.required' => "กรุณาเลือกเลขห้องพัก",

                'card_number.required' => "กรุณากรอกเลขบัตรประชาชน",
                'card_number.max' => "ห้ามป้อนเกิน 13 ตัว",
                'full_name.required' => "กรุณากรอกชื่อ-นามสกุล",
                'full_name.max' => "ห้ามป้อนเกิน 255 ตัว",
                'tel.required' => "กรุณากรอกเบอร์ติดต่อ",
                'tel.max' => "ห้ามป้อนเกิน 10 ตัว",
                'contact_other.required' => "กรุณากรอกผู้ติดต่อกรณีฉุกเฉิน",
                'contact_other.max' => "ห้ามป้อนเกิน 255 ตัว",
                'start_date.required' => "กรุณาเลือกวันที่เข้าพัก",
                'status.required' => "กรุณาเลือกสถานะ",


            ],

        );


        Roomer::find($id)->update([
            'room_number' => $request->room_number,
            'card_number' => $request->card_number,
            'full_name' => $request->full_name,
            'tel' => $request->tel,
            'contact_other' => $request->contact_other,
            'status' => $request->status,
            'start_date' => $request->start_date,

        ]);
        return redirect()->route('roomer.all')->with('success', "อัพเดทข้อมูลสำเร็จ");
    }



    public function delete($id)
    {

        //1.ลบภาพ
        Roomer::find($id);
        //2.ลบข้อมูลจากฐานข้อมูล
        $delete = Roomer::find($id)->delete();
        return redirect()->back()->with('success', "ลบข้อมูลเรียบร้อย");
    }
}
