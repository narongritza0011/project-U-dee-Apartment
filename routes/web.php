<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ElectWaterController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('welcome');
});


Route::middleware(['middleware' => 'PreventBackHistory'])->group(function () {
    Auth::routes();
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin', 'auth', 'PreventBackHistory']], function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');

    //ผู้ดูเเลระบบ
    Route::get('admin', [AdminController::class, 'admin'])->name('admin.admin');
    Route::post('add-admin', [AdminController::class, 'addAdmin'])->name('admin.add');
    Route::get('edit-admin/{id}', [AdminController::class, 'editAdmin'])->name('admin.edit');
    Route::post('update-admin', [AdminController::class, 'updateAdmin'])->name('admin.update');
    Route::get('delete-admin/{id}', [AdminController::class, 'deleteAdmin'])->name('admin.delete');



    //สมาชิก
    Route::get('member', [AdminController::class, 'member'])->name('admin.member');
    Route::post('add-member', [AdminController::class, 'addMember'])->name('member.add');




    Route::get('location', [AdminController::class, 'location'])->name('admin.location');
    Route::get('contact', [AdminController::class, 'contact'])->name('admin.contact');


    //ข่าวสาร
    Route::get('new', [NewsController::class, 'index'])->name('admin.new');
    Route::get('get-news', [NewsController::class, 'getNews'])->name('get.news');





    Route::get('slide', [AdminController::class, 'slide'])->name('admin.slide');



    //ประเภทห้อง
    Route::get('all/room_type', [RoomTypeController::class, 'room_type'])->name('admin.room_type');
    Route::get('all/room_type/add-form', [RoomTypeController::class, 'add_Form'])->name('admin.add.form');
    Route::post('room_type/add', [RoomTypeController::class, 'addRoom_type'])->name('room_type.add');
    Route::get('all/room_type/edit/{id}', [RoomTypeController::class, 'editRoom_type'])->name('room_type.edit');
    Route::post('room_type/update/{id}', [RoomTypeController::class, 'updateRoom_type'])->name('room_type.update');
    Route::get('room_type/delete/{id}', [RoomTypeController::class, 'deleteRoom_type'])->name('room_type.delete');


    //ประเภทห้อง -อัลบั้มรูป
    Route::get('all/room_type/get-image-all/{id}', [RoomTypeController::class, 'getImageAll'])->name('admin.get.image.all');
    Route::get('all/room_type/get-image-all/add-form-albums', [RoomTypeController::class, 'addFormAlbum'])->name('admin.add.form.album');
    Route::post('all/room_type/get-image-all/add-form-albums/add', [RoomTypeController::class, 'addAlbum'])->name('album.add');
    Route::get('room_type/albums/delete/{id}', [RoomTypeController::class, 'deleteAlbum'])->name('album.delete');




    //รายการหอพัก
    Route::get('all/room', [RoomController::class, 'index'])->name('admin.room');
    Route::post('room/add', [RoomController::class, 'add'])->name('room.add');
    Route::get('room/edit/{id}', [RoomController::class, 'edit'])->name('room.edit');
    Route::post('room/update/{id}', [RoomController::class, 'update'])->name('room.update');

    Route::get('room/delete/{id}', [RoomController::class, 'delete'])->name('room.delete');


    //ค่าน้ำค่าไฟ
    Route::get('all/elect_water', [ElectWaterController::class, 'index'])->name('admin.elect_water');
    Route::get('elect_water/edit/{id}', [ElectWaterController::class, 'edit'])->name('elect_water.edit');

    Route::post('elect_water/add', [ElectWaterController::class, 'add'])->name('elect_water.add');
    Route::post('elect_water/update/{id}', [ElectWaterController::class, 'update'])->name('elect_water.update');
    Route::get('elect_water/delete/{id}', [ElectWaterController::class, 'delete'])->name('elect_water.delete');




    Route::get('settings', [AdminController::class, 'settings'])->name('admin.settings');
});


Route::group(['prefix' => 'user', 'middleware' => ['isUser', 'auth', 'PreventBackHistory']], function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('settings', [UserController::class, 'settings'])->name('user.settings');
});
