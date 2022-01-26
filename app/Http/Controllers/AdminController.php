<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


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

        //get all admin
        $user = User::all();


        return view('dashboards.admins.admins.index', compact('user'));
    }

    function addAdmin(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique::user',
            'tel' => 'required',
            'password' => 'required',


        ]);


        // if (!$validator->passes()) {
        //     return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        // } else {
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->role = 1;
        $data->tel = $request->tel;
        $data->password = Hash::make($request->password);
        $query = $data->save();

        if (!$query) {
            return response()->json(['code' => 0, 'msg' => 'มีบางอย่างผิดพลาด']);
        } else {
            return response()->json(['code' => 1, 'msg' => 'บันทึกข้อมูลสำเร็จ']);
        }

        // }

        // return view('dashboards.admins.admins.index');
    }

    function member()
    {
        return view('dashboards.admins.members.index');
    }
    function location()
    {
        return view('dashboards.admins.locations.index');
    }
    function contact()
    {
        return view('dashboards.admins.contacts.index');
    }
    function new()
    {
        return view('dashboards.admins.news.index');
    }
    function slide()
    {
        return view('dashboards.admins.slides.index');
    }
    function personnel_type()
    {
        return view('dashboards.admins.personnel_types.index');
    }
    function personnel()
    {
        return view('dashboards.admins.personnels.index');
    }
    function settings()
    {
        return view('dashboards.admins.settings');
    }
}
