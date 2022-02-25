<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequestFrom;
use App\Models\Bill;
use App\Models\ElectWarter;
use App\Models\Pay;
use App\Models\Room;
use App\Models\Roomer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PDF;

use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    function index()


    {

        $total_income = Pay::sum('total');
        $total_nopay_income = Bill::where('status', 1)->sum('total');

        // dd($total_income);
        $room = Room::where('status', 2)->get();

        return view('dashboards.admins.index', compact('room', 'total_income', 'total_nopay_income'));
    }



    function bill($id)
    {

        $water_electric = ElectWarter::all();
        $room = Room::leftJoin('room_types', 'room_types.id', '=', 'rooms.room_type')
            ->get(['room_types.name', 'room_types.price', 'rooms.id', 'rooms.status', 'rooms.room_number', 'rooms.created_at'])->find($id);
        //  dd($room);

        $r_num = $room['id'];
        //  dd($r_num);

        $year = Carbon::now()->format('Y');

        // dd($year);
        $table_bill = Bill::where('room_number', $r_num)->get();
        //  dd($table_bill);
        $widget = Bill::where('room_number', $r_num)->latest('id')->get(['electric_now_meter', 'water_now_meter'])->first();
        // dd($widget);
        return view('dashboards.admins.bills.bill', compact('room', 'water_electric', 'widget', 'year', 'table_bill'));
    }



    function addBill(Request $request)
    {

        $request->validate(
            [

                'bill' => 'required',
                'electric_now_meter' => 'required',
                'water_now_meter' => 'required',




            ],
            [
                'bill.required' => "กรุณาเลือกรอบบิล",
                'electric_now_meter.required' => "กรุณากรอกเลขมิเตอร์ไฟฟ้า",
                'water_now_meter.required' => "กรุณากรอกเลขมิเตอร์ค่าน้ำ",

            ],

        );



        $data = new Bill();
        $data->room_number = $request->room_number;
        $data->bill = $request->bill;
        $data->rental_fee = $request->rental_fee;
        $data->water_now_meter = $request->water_now_meter;
        $data->water_old_meter = $request->water_old_meter;
        $data->water_unit = $request->water_unit;
        $data->water = $request->water;
        $data->water_sum = $request->water_sum;
        $data->electric_now_meter = $request->electric_now_meter;
        $data->electric_old_meter = $request->electric_old_meter;
        $data->electric_unit = $request->electric_unit;
        $data->electric = $request->electric;
        $data->electric_sum = $request->electric_sum;
        $data->total = $request->total;
        $data->status = 1;

        $data->created_at = Carbon::now();

        if ($data->save()) {
            // return redirect()->back()->with('success', 'เพิ่มข้อมูลผู้ดูเเลระบบเรียบร้อยเเล้ว');
            return redirect()->back()->with('success', 'บันทึกบิลสำเร็จ');
        } else {
            return redirect()->back()->with('error', 'บันทึกบิลไม่สำเร็จ!');
        }

        // dd($request->all());
    }



    public function edit($id)
    {

        $data = Bill::leftJoin('rooms', 'rooms.id', '=', 'bills.room_number')
            ->get(['rooms.room_number', 'bills.id', 'bills.bill', 'bills.rental_fee', 'bills.water_now_meter', 'bills.water_old_meter', 'bills.water_unit', 'bills.electric_now_meter', 'bills.electric_old_meter', 'bills.electric_unit', 'bills.total', 'bills.electric_sum', 'bills.water_sum', 'bills.water', 'bills.electric'])->find($id);



        $year = Carbon::now()->format('Y');

        return view('dashboards.admins.bills.bill_edit', compact('data', 'year'));
    }




    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate(
            [

                'bill' => 'required',
                'electric_now_meter' => 'required',
                'water_now_meter' => 'required',




            ],
            [
                'bill.required' => "กรุณาเลือกรอบบิล",
                'electric_now_meter.required' => "กรุณากรอกเลขมิเตอร์ไฟฟ้า",
                'water_now_meter.required' => "กรุณากรอกเลขมิเตอร์ค่าน้ำ",

            ],

        );


        $data =  Bill::find($id);
        $data->bill = $request->bill;
        $data->rental_fee = $request->rental_fee;
        $data->water_now_meter = $request->water_now_meter;
        $data->water_old_meter = $request->water_old_meter;
        $data->water_unit = $request->water_unit;
        $data->water = $request->water;
        $data->water_sum = $request->water_sum;
        $data->electric_now_meter = $request->electric_now_meter;
        $data->electric_old_meter = $request->electric_old_meter;
        $data->electric_unit = $request->electric_unit;
        $data->electric = $request->electric;
        $data->electric_sum = $request->electric_sum;
        $data->total = $request->total;






        if ($data->update()) {


            return redirect()->route('admin.dashboard')->with('success', 'อัพเดทข้อมูลสำเร็จ');
        }

        return redirect()->back()->with('error', 'อัพเดทข้อมูลไม่สำเร็จ');
    }



    public function delete($id)
    {


        //2.ลบข้อมูลจากฐานข้อมูล
        Bill::find($id)->delete();
        return redirect()->back()->with('success', "ลบข้อมูลเรียบร้อย");
    }



    public function print($id)
    {


        // $data = Roomer::leftJoin('bills', 'bills.room_number', '=', 'roomers.room_number')
        // ->get(['bills.id', 'bills.bill', 'bills.rental_fee', 'bills.water_now_meter', 'bills.water_old_meter', 'bills.water_unit', 'bills.water', 'bills.water_sum', 'bills.electric_now_meter', 'bills.electric_old_meter', 'bills.electric_unit', 'bills.electric', 'bills.electric_sum', 'bills.total', 'bills.status', 'roomers.room_number', 'roomers.full_name', 'roomers.tel', 'roomers.full_name'])->find($id);
        // dd($data);

        $data = Roomer::leftJoin('bills', 'bills.room_number', '=', 'roomers.room_number')
            ->leftJoin('rooms', 'rooms.id', '=', 'bills.room_number')
            ->get(['bills.id', 'bills.bill', 'bills.rental_fee', 'bills.water_now_meter', 'bills.water_old_meter', 'bills.water_unit', 'bills.water', 'bills.water_sum', 'bills.electric_now_meter', 'bills.electric_old_meter', 'bills.electric_unit', 'bills.electric', 'bills.electric_sum', 'bills.total', 'bills.status', 'rooms.room_number', 'roomers.full_name', 'roomers.tel', 'roomers.full_name'])->find($id);


        // dd($data);


        $time = Carbon::today()->toFormattedDateString();
        // echo $time->toDateTimeString();
        // $result =   $data['price'] + $data['pay_first'];


        $pdf = PDF::loadView('dashboards.admins.bills.billprint', compact('time', 'data'));

        return @$pdf->stream();
    }




    function wallet()
    {
        // $bills = Bill::where('status', 1)->get();


        $bills = Roomer::leftJoin('bills', 'bills.room_number', '=', 'roomers.room_number')->where('roomers.status', 1)
            ->leftJoin('rooms', 'rooms.id', '=', 'bills.room_number')
            ->where('bills.status', 1)->get(['bills.id', 'bills.bill', 'bills.rental_fee', 'bills.water_sum', 'bills.electric_sum', 'bills.total', 'rooms.room_number', 'roomers.full_name']);
        // dd($bills);
        return view('dashboards.admins.bills.cash_no', compact('bills'));
    }


    function pay($id)
    {

        $data = Roomer::leftJoin('bills', 'bills.room_number', '=', 'roomers.room_number')
            ->leftJoin('rooms', 'rooms.id', '=', 'bills.room_number')
            ->get(['bills.id', 'bills.bill', 'bills.rental_fee', 'bills.water_now_meter', 'bills.water_old_meter', 'bills.water_unit', 'bills.water', 'bills.water_sum', 'bills.electric_now_meter', 'bills.electric_old_meter', 'bills.electric_unit', 'bills.electric', 'bills.electric_sum', 'bills.total', 'bills.created_at', 'bills.status', 'rooms.room_number', 'roomers.full_name', 'roomers.tel', 'roomers.full_name'])->find($id);
        // $time = Carbon::today()->toFormattedDateString();
        $t = $data['created_at'];


        $time = date('d-m-Y', strtotime($t));

        return view('dashboards.admins.bills.cash_pay', compact('data', 'time'));
    }


    function addPay(Request $request)
    {



        $data = new Pay();
        $data->bill_id = $request->bill_id;
        $data->payment = $request->payment;
        $data->total = $request->total;
        $data->status = 1;
        $data->created_at = Carbon::now();


        $bill =  Bill::find($request->id);
        $bill->status = 2;




        if ($data->save()) {

            $bill->update();


            return redirect()->route('admin.cash')->with('success', 'ชำระเงินสำเร็จ');
        } else {
            return redirect()->back()->with('error', 'ชำระเงินไม่สำเร็จ!');
        }

        // dd($request->all());
    }




    function wallet_success()
    {
        $bills = Roomer::leftJoin('bills', 'bills.room_number', '=', 'roomers.room_number')->where('roomers.status', 1)
            ->leftJoin('rooms', 'rooms.id', '=', 'bills.room_number')
            ->where('bills.status', 2)->get(['bills.id', 'bills.bill', 'bills.rental_fee', 'bills.water_sum', 'bills.electric_sum', 'bills.total', 'rooms.room_number', 'roomers.full_name']);
        // dd($bills);

        return view('dashboards.admins.bills.cash_success', compact('bills'));
    }



    function view_success($id)
    {
        $data = Roomer::leftJoin('bills', 'bills.room_number', '=', 'roomers.room_number')
            ->leftJoin('rooms', 'rooms.id', '=', 'bills.room_number')
            ->get(['bills.id', 'bills.bill', 'bills.rental_fee', 'bills.water_now_meter', 'bills.water_old_meter', 'bills.water_unit', 'bills.water', 'bills.water_sum', 'bills.electric_now_meter', 'bills.electric_old_meter', 'bills.electric_unit', 'bills.electric', 'bills.electric_sum', 'bills.total', 'bills.created_at', 'bills.status', 'rooms.room_number', 'roomers.full_name', 'roomers.tel', 'roomers.full_name'])->find($id);
        // $time = Carbon::today()->toFormattedDateString();
        $bill = Bill::leftJoin('pays', 'pays.bill_id', '=', 'bills.id')->get(['bills.id', 'pays.created_at', 'pays.payment', 'pays.total'])->find($id);
        //  dd($bill);
        return view('dashboards.admins.bills.view_success', compact('data', 'bill'));
    }







    function payAll()
    {
        $bills = Pay::all();
        // dd($bills);

        return view('dashboards.admins.bills.payall', compact('bills'));
    }



    public function deletepay($id)
    {



         Pay::find($id)->delete();
        return redirect()->back()->with('success', "ลบข้อมูลเรียบร้อย");
    }






    function profile()
    {
        return view('dashboards.admins.profile');
    }


    function profileUpdate(Request $request, $id)
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

        return redirect()->route('admin.profile')->with('success', "อัพเดทข้อมูลสำเร็จ");
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
