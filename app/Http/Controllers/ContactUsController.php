<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ContactUsController extends Controller
{

    public function index()
    {
        $data = ContactUs::all();
        return view('dashboards.admins.contacts.index', compact('data'));
    }



    function store(Request $request)
    {
        // dd($request->all());


        $data = new ContactUs();
        $data->full_name = $request->full_name;
        $data->email = $request->email;
        $data->tel = $request->tel;
        $data->message = $request->message;
        $data->created_at = Carbon::now();


        if ($data->save()) {

            return redirect()->back()->with('success', 'ส่งข้อความสำเร็จ');
        } else {
            Alert::error('เพิ่มข้อมูลไม่สำเร็จ');
            return redirect()->back()->with('error');
        }
    }

    public function view($id)
    {

        $data = ContactUs::find($id);
        return view('dashboards.admins.contacts.edit', compact('data'));
    }

    public function delete($id)
    {

        //1.ลบภาพ
        ContactUs::find($id);
        //2.ลบข้อมูลจากฐานข้อมูล
        $delete = ContactUs::find($id)->delete();
        return redirect()->back()->with('success', "ลบข้อมูลเรียบร้อย");
    }
}
