<?php

namespace App\Http\Controllers;

use App\Models\Albums;
use App\Models\News;
use App\Models\RoomType;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $news = News::all();

        // $data = RoomType::leftJoin('albums', 'albums.room_type', '=', 'room_types.id')
        //     ->get(['room_types.*',  'albums.name']);
        //  dd($data);
        $albums = Albums::all();
        $data = RoomType::all();
        return view('welcome', compact('data', 'albums','news'));
    }


    public function detail($id)
    {
        $data = RoomType::find($id);

        $albums = RoomType::leftJoin('albums', 'albums.room_type', '=', 'room_types.id')->where('albums.room_type', $id)
            ->get(['room_types.id',  'albums.*']);
        // dd($albums);
        // $albums = Albums::all();

        return view('detail', compact('data', 'albums'));
    }
}
