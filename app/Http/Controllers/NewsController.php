<?php

namespace App\Http\Controllers;

use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class NewsController extends Controller
{
    public function index()
    {
        $data = News::all();
        return view('dashboards.admins.news.index', compact('data'));
    }

    public function store(Request $request)
    {

        // dd($request->all());
        $request->validate(
            [

                'title' => 'required',
                'detail' => 'required',




            ],
            [

                'title.required' => "กรุณากรอกหัวข้อ",
                'detail.required' => "กรุณากรอกรายละเอียด",






            ],

        );

        $data = new News();
        $data->title = $request->title;
        $data->detail = $request->detail;
        $data->created_at = Carbon::now();


        if ($data->save()) {

            return redirect()->back()->with('success', 'เพิ่มข้อมูลสำเร็จ');
        } else {
            Alert::error('เพิ่มข้อมูลไม่สำเร็จ');
            return redirect()->back()->with('error');
        }
    }

    public function edit($id)
    {

        $data = News::find($id);
        return view('dashboards.admins.news.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {

        // dd($request->all());
        $request->validate(
            [

                'title' => 'required',
                'detail' => 'required',




            ],
            [

                'title.required' => "กรุณากรอกหัวข้อ",
                'detail.required' => "กรุณากรอกรายละเอียด",






            ],

        );



        News::find($id)->update([

            'title' => $request->title,
            'detail' => $request->detail,

        ]);
        return redirect()->route('admin.new')->with('success', "อัพเดทข้อมูลสำเร็จ");
    }

    public function delete($id)
    {

        //1.ลบภาพ
        News::find($id);
        //2.ลบข้อมูลจากฐานข้อมูล
        $delete = News::find($id)->delete();
        return redirect()->back()->with('success', "ลบข้อมูลเรียบร้อย");
    }
}
