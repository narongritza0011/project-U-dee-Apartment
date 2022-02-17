<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    function index()
    {

        $data = Contact::all();
        return view('dashboards.admins.locations.index', compact('data'));
    }

    function edit($id)
    {
        $data = Contact::find($id);

        return view('dashboards.admins.locations.edit', compact('data'));
    }



    function update(Request $request, $id)
    {
        //  dd($request->all());




        Contact::find($id)->update([
            'about' => $request->about,
            'tel' => $request->tel,
            'email' => $request->email,
            'facebook_name' => $request->facebook_name,
            'facebook_link' => $request->facebook_link,
            'ig_link' => $request->ig_link,
            'map' => $request->map,


        ]);

        return redirect()->route('admin.location')->with('success', "อัพเดทข้อมูลสำเร็จ");
    }
}
