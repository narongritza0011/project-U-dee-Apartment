<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Carbon\Carbon;
use Illuminate\Http\Request;

class statusSelectController extends Controller
{
    public function index()
    {

        $data = Car::join('check_cars', 'check_cars.car_id', '=', 'cars.id')->get(['cars.full_name', 'cars.tel', 'cars.status', 'check_cars.take_car']);





        return view('welcome', compact('data'));
    }



    public function check_status(Request $request)
    {
        // dd($request->check_status);


        $check = Car::where('tel', $request->check_status)->count();


        if ($check > 0) {
            $check = Car::where('tel', $request->check_status)->get();

            $status = $check[0]['status'];
            if ($status == 1) {
                $status =  'กำลังดำเนินการ';
            } elseif ($status == 2) {
                $status = 'เสร็จสิ้นเเล้ว';
            }
            // dd($status);

            $data =   'ชื่อ-นามสกุล : ' . $check[0]['full_name'] . ' ' . 'เบอร์โทร : ' . $check[0]['tel'] . ' สถานะ : ' . $status;


            // dd($data);

            return redirect()->back()->with('success', $data);
        } else {
            return redirect()->back()->with('error', 'ไม่มี ' . $request->check_status . ' ในระบบ !!!');
        }
    }










    //     $data = Car::all();

    //     // dd($data);
    //     return view('welcome', compact('data'));
    // }
}
