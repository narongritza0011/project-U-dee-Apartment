<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // function index()
    // {
    //     return view('dashboards.users.index');
    // }


    function update(Request $request, $id)
    {



        $request->validate(
            [
                'name' => 'required|string|max:255',
                'tel' => 'required',
                'password' => 'nullable|string|min:8',

            ],
            [
                'name.required' => "กรุณาป้อนชื่อ",
                'name.string' => "กรุณาป้อนให้ถูกต้อง",
                'name.max' => "ห้ามป้อนเกิน 255 ตัวอักษร",
                'password.min' => "กรุณาป้อนรหัสผ่าน มากกว่า 8 ตัว",



                'tel.required' => "กรุณาป้อนเบอร์ติดต่อ",





            ],

        );



        // dd($request->all());
        User::find($id)->update([
            'name' => $request->name,

            'tel' => $request->tel,

            'password' => Hash::make($request->password),


        ]);

        return redirect()->route('user.profile')->with('success', "อัพเดทข้อมูลสำเร็จ");
    }

    function profile()
    {
        return view('dashboards.users.profile');
    }
    function bills()
    {
        return view('dashboards.users.bills');
    }
}
