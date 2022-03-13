<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CheckCar;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CarController extends Controller
{
    function index()
    {

        $data = Car::all();

        return view('dashboards.admins.cars.index', compact('data'));
    }



    function store(Request $request)
    {

        // dd($request->all());
        $request->validate(
            [
                'full_name' => 'required',
                'brand' => 'required',
                'model' => 'required',
                'number_car' => 'required',
                'tel' => 'required',

                'check_date' => 'required',






            ],
            [
                'full_name.required' => "กรุณากรอกชื่อ-นามสกุล",
                'brand.required' => "กรุณากรอกยี่ห้อรถ",
                'model.required' => "กรุณากรอกรุ่นรถ",
                'number_car.required' => "กรุณากรอกเลขทะเบียนรถ",
                'tel.required' => "กรุณากรอกเบอร์",

                'check_date.required' => "กรุณาเลือกวันที่เช็ครถ",



            ],

        );

        $data = new Car();
        $data->full_name = $request->full_name;
        $data->tel = $request->tel;
        $data->brand = $request->brand;
        $data->model = $request->model;
        $data->number_car = $request->number_car;
        $data->author = $request->author;
        $data->check_date = $request->check_date;
        $data->status = 1;
        $data->created_at = Carbon::now();

        if ($data->save()) {
            // return redirect()->back()->with('success', 'เพิ่มข้อมูลผู้ดูเเลระบบเรียบร้อยเเล้ว');
            return redirect()->back()->with('success', 'เพิ่มข้อมูลสำเร็จ');
        } else {
            return redirect()->back()->with('error', 'เพิ่มข้อมูลไม่สำเร็จ!');
        }
    }


    public function edit($id)
    {
        $data = Car::find($id);


        return view('dashboards.admins.cars.edit', compact('data'));
    }


    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate(
            [
                'full_name' => 'required',
                'brand' => 'required',
                'model' => 'required',
                'number_car' => 'required',
                'tel' => 'required',

                'check_date' => 'required',






            ],
            [
                'full_name.required' => "กรุณากรอกชื่อ-นามสกุล",
                'brand.required' => "กรุณากรอกยี่ห้อรถ",
                'model.required' => "กรุณากรอกรุ่นรถ",
                'number_car.required' => "กรุณากรอกเลขทะเบียนรถ",
                'tel.required' => "กรุณากรอกเบอร์",

                'check_date.required' => "กรุณาเลือกวันที่เช็ครถ",



            ],

        );

        Car::find($id)->update([
            'full_name' => $request->full_name,
            'tel' => $request->tel,

            'brand' => $request->brand,
            'model' => $request->model,
            'number_car' => $request->number_car,
            'author' => $request->author,
            'check_date' => $request->check_date,
            'status' => $request->status,


        ]);


        return redirect()->route('cars.all')->with('success', "อัพเดทข้อมูลเรียบร้อย");
    }


    public function view($id)

    {


        // select count(*) from check_cars join cars on check_cars.car_id = cars.id where check_cars.status = 1 and cars.id = 3

        $check_car = Car::join('check_cars', 'check_cars.car_id', '=', 'cars.id')->where('check_cars.status', 1)->where('cars.id', $id)->count();
        // select count(*) from check_cars  where   car_id = 3
        $data = Car::find($id);

        return view('dashboards.admins.cars.view', compact('data', 'check_car'));
    }


    public function delete($id)
    {

        Car::find($id)->delete();
        return redirect()->back()->with('success', "ลบข้อมูลเรียบร้อย");
    }



    public function StoreCheckCar(Request $request)
    {


        $request->validate(
            [


                'take_car' => 'required',






            ],
            [


                'take_car.required' => "กรุณาเลือกวันที่รับรถ",



            ],

        );

        $data = new CheckCar();
        $data->car_id = $request->car_id;
        $data->oil_status = $request->oil_status;
        $data->rubber_status = $request->rubber_status;
        $data->elect_status = $request->elect_status;
        $data->take_car = $request->take_car;

        $data->status = 1;
        $data->created_at = Carbon::now();

        if ($data->save()) {

            Car::find($request->car_id)->update([

                'status' => 2,


            ]);

            // return redirect()->back()->with('success', 'เพิ่มข้อมูลผู้ดูเเลระบบเรียบร้อยเเล้ว');
            return redirect()->route('cars.all')->with('success', 'เพิ่มข้อมูลสำเร็จ');
        } else {
            return redirect()->back()->with('error', 'เพิ่มข้อมูลไม่สำเร็จ!');
        }
    }
}
