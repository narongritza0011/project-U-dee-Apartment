<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequestFrom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    function index()
    {


        return view('dashboards.admins.index');
    }
    function profile()
    {
        return view('dashboards.admins.profile');
    }
    



    function admin()
    {
        // Alert::success('สำเร็จ', 'success');
        $user = User::where('role', 1)->get();

        return view('dashboards.admins.admins.index', compact('user'));
    }



    function addAdmin(AdminRequestFrom $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->tel = $request->tel;
        $user->role = 1;
        $user->password = Hash::make($request->password);


        if ($user->save()) {
            // return redirect()->back()->with('success', 'เพิ่มข้อมูลผู้ดูเเลระบบเรียบร้อยเเล้ว');
            return redirect()->back()->with('success', 'เพิ่มข้อมูลสำเร็จ');
        } else {
            return redirect()->back()->with('error', 'อัพเดทข้อมูลไม่สำเร็จ!');
        }
    }





    function editAdmin(Request $request, $id)
    {

        $data = User::find($id);
        return response()->json($data);
    }


    function updateAdmin(AdminRequestFrom $request)
    {


        // dd($request->all());
        $data = User::find($request->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->tel = $request->tel;
        if (!empty($request->password)) {
            $data->password = Hash::make($request->password);
        }
        $data->save();
        return redirect()->back()->with('success', 'อัพเดทข้อมูลสำเร็จ');
    }

    public function deleteAdmin($id)
    {

        //1.ลบภาพ
        User::find($id);
        //2.ลบข้อมูลจากฐานข้อมูล
        $delete = User::find($id)->delete();
        return redirect()->back()->with('success', "ลบข้อมูลเรียบร้อย");
    }






    function member()
    {


        // Alert::success('สำเร็จ', 'success');
        $user = User::where('role', 2)->get();

        return view('dashboards.admins.members.index', compact('user'));
    }

    function addMember(AdminRequestFrom $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->tel = $request->tel;
        $user->role = 2;
        $user->password = Hash::make($request->password);


        if ($user->save()) {
            // return redirect()->back()->with('success', 'เพิ่มข้อมูลผู้ดูเเลระบบเรียบร้อยเเล้ว');
            return redirect()->back()->with('success', 'เพิ่มข้อมูลสำเร็จ');
        } else {
            return redirect()->back()->with('error', 'อัพเดทข้อมูลไม่สำเร็จ!');
        }
    }





    
   
    function new()
    {
        return view('dashboards.admins.news.index');
    }
    function slide()
    {
        return view('dashboards.admins.slides.index');
    }


    function room()
    {
        return view('dashboards.admins.rooms.index');
    }
    function settings()
    {
        return view('dashboards.admins.settings');
    }
}
