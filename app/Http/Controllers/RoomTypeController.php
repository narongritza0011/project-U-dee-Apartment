<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomTypeRequestForm;
use App\Models\Albums;
use App\Models\Room;
use App\Models\RoomType;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class RoomTypeController extends Controller
{

    function room_type()
    {
        // Alert::error('สำเร็จ', 'success');

        $room = RoomType::all();
        return view('dashboards.admins.room_types.index', compact('room'));
    }


    function add_Form()
    {
        // Alert::error('สำเร็จ', 'success');

        return view('dashboards.admins.room_types.add');
    }



    function addRoom_type(Request $request)
    {
        // dd($request->all());
        $request->validate(
            [
                'name' => 'required|unique:room_types|max:255',
                'detail' => 'required',
                'price' => 'required',
                'pay_first' => 'required',
                'deposit' => 'required',
                'image' => 'required|mimes:jpg,jpeg,png|max:2000',



            ],
            [
                'name.required' => "กรุณากรอกชื่อประเภทห้องพัก",
                'name.max' => "ห้ามกรอกเกิน 255 ตัวอักษร",
                'name.unique' => "ชื่อประเภทห้องซ้ำ",

                'detail.required' => "กรุณากรอกรายละเอียด",
                'price.required' => "กรุณากรอกค่าเช่า",
                'pay_first.required' => "กรุณากรอกจ่ายล่วงหน้า",
                'deposit.required' => "กรุณากรอกค่ามัดจำ",
                'image.required' => "กรุณาเลือกรูปภาพ",
                'image.mimes' => "กรุณาเลือกประเภทรูปภาพ",




            ],

        );




        Alert::error('ผิดพลาด', 'เพิ่มประเภทห้องสำเร็จไม่สำเร็จ');




        //การเข้ารหัสรูปภาพ
        $service_image = $request->file('image');
        // dd($service_image);

        //generate ชื่อภาพ
        $name_gen = hexdec(uniqid());

        //ดึงนามสกุลไฟล์ภาพ
        $img_ext = strtolower($service_image->getClientOriginalExtension());
        //รวมชื่อกับนามสกุลไฟล์ 
        $img_name = $name_gen . '.' . $img_ext;

        //บันทึกข้อมูลเเละอัพโหลด
        $upload_location = 'image/room_type/';
        $full_path = $upload_location . $img_name;
        // dd($full_path);


        $room = new RoomType();
        $room->name = $request->name;
        $room->detail = $request->detail;
        $room->price = $request->price;
        $room->pay_first = $request->pay_first;
        $room->deposit = $request->deposit;
        $room->image = $full_path;
        $room->created_at = Carbon::now();

        if ($room->save()) {
            //อัพโหลดภาพ
            $service_image->move($upload_location, $img_name);
            // return redirect()->back()->with('success', 'เพิ่มข้อมูลผู้ดูเเลระบบเรียบร้อยเเล้ว');
            return redirect()->route('admin.room_type')->with('success', 'เพิ่มประเภทห้องสำเร็จ');
        } else {
            return redirect()->back()->with('error');
        }
    }


    public function editRoom_type($id)
    {
        $room = RoomType::find($id);
        //dd($department->department_name);


        return view('dashboards.admins.room_types.edit', compact('room'));
    }


    public function updateRoom_type(Request $request, $id)
    {



        //การเข้ารหัสรูปภาพ
        $service_image = $request->file('image');

        //อัพเดทภาพเเละชื่อ
        if ($service_image) {



            // dd($service_image);

            //generate ชื่อภาพ
            $name_gen = hexdec(uniqid());

            //ดึงนามสกุลไฟล์ภาพ
            $img_ext = strtolower($service_image->getClientOriginalExtension());
            //รวมชื่อกับนามสกุลไฟล์ 
            $img_name = $name_gen . '.' . $img_ext;

            //บันทึกข้อมูลเเละอัพโหลด
            $upload_location = 'image/room_type/';
            $full_path = $upload_location . $img_name;
            //  dd($full_path);



            //อัพเดทข้อมูล
            RoomType::find($id)->update([
                'name' => $request->name,
                'detail' => $request->detail,
                'price' => $request->price,
                'pay_first' => $request->pay_first,
                'deposit' => $request->deposit,
                'image' => $full_path,



            ]);

            //ลบภาพเก่าเเละอัพภาพใหม่เเทนที่
            $old_image = $request->old_image;
            unlink($old_image);

            //อัพโหลดภาพ
            $service_image->move($upload_location, $img_name);

            return redirect()->route('admin.room_type')->with('success', "อัพเดทประเภทห้องพักเรียบร้อย");
        } else {
            //อัพเดทชื่ออย่างเดียว
            //อัพเดทข้อมูล
            RoomType::find($id)->update([
                'name' => $request->name,
                'detail' => $request->detail,
                'price' => $request->price,
                'pay_first' => $request->pay_first,
                'deposit' => $request->deposit,


            ]);
            return redirect()->route('admin.room_type')->with('success', "อัพเดทประเภทห้องพักเรียบร้อย");
        }




        // dd($request->all());
        // // ตรวจสอบข้อมูล

        // RoomType::find($id)->update([
        //     'name' => $request->name,

        // ]);




        // // return redirect()->route('services')->with('success', "อัพเดทประเภทห้องพักเรียบร้อย");
        // return redirect()->route('admin.room_type')->with('success', "อัพเดทประเภทห้องพักเรียบร้อย");

    }



    public function deleteRoom_type($id)
    {


        $data = Room::where('room_type', $id)->count();
        $album = Albums::where('room_type', $id)->count();
        if ($data  > 0) {

            Alert::error('ไม่สามารถลบข้อมูลได้', 'เนื่องจากมีห้องเช่าที่อยู่ในประเภทนี้');



            return redirect()->back()->with('error');
        } elseif ($album > 0) {

            Alert::error('ไม่สามารถลบข้อมูลได้', 'เนื่องจากมีรูปภาพอยู่ในอัลบั้ม');



            return redirect()->back()->with('error');
        }
        //1.ลบภาพ
        $image = RoomType::find($id)->image;
        unlink($image);


        //2.ลบข้อมูลจากฐานข้อมูล
        $delete = RoomType::find($id)->delete();
        return redirect()->back()->with('success', "ลบข้อมูลเรียบร้อย");
    }



    //ส่วนของเพิ่มรูปในอัลบั้ม
    public function getImageAll($id)
    {
        // $room = RoomType::find($id);

        $data = RoomType::find($id);

        $albums = Albums::where('room_type', $id)->get();
        return view('dashboards.admins.room_types.albums.index', compact('data', 'albums'));
    }






    public function addAlbum(Request $request)
    {

        // dd($request->all());
        $request->validate(
            [
                'name' => 'required',
                'name.*' => 'mimes:jpeg,jpg,png,svg|max:2048'
                //   'file_internship' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                // 'file_internship.*' => 'mimetypes:application/pdf|max:10000'


            ],
            [
                'name.required' => "กรุณาเลือกรูปภาพ",
                'name.mimes' => "กรุณาเลือกประเภทรูปภาพใหม่",


            ],
        );


        //บันทึกข้อมูลเเละอัพโหลด


        // dd($full_path);

        if ($request->hasFile('name')) {
            foreach ($request->file('name') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $upload_location = 'image/albums';
                $full_path = $image->move($upload_location, $filename);

                $data = new Albums();

                $data->name = $full_path;
                $data->room_type = $request->room_type;
                $data->created_at = Carbon::now();
                $data->save();
            }
        }
        return back()->with('success', "อัพโหลดรูปภาพอัลบั้มสำเร็จ");
    }


    public function deleteAlbum($id)
    {



        //1.ลบภาพ
        $image = Albums::find($id)->name;
        unlink($image);


        //2.ลบข้อมูลจากฐานข้อมูล
        $delete = Albums::find($id)->delete();
        return redirect()->back()->with('success', "ลบข้อมูลสำเร็จ");
    }
}
