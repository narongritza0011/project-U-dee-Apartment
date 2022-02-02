<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

use Yajra\DataTables\Facades\DataTables;

class NewsController extends Controller
{
    function index()
    {

        return view('dashboards.admins.news.index');
    }

    function getNews()
    {
        $data = News::all();
        return DataTables::of($data)
            ->make(true);
    }
}
