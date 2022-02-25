<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ElectWaterController;
use App\Http\Controllers\LivingRoomer;
use App\Http\Controllers\moveOutController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomerController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
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



Route::get('/', [WelcomeController::class, 'index']);
Route::get('room/detail/{id}', [WelcomeController::class, 'detail'])->name('room.detail');
//ส่งข้อความ contact us หน้าบ้าน
Route::post('contact-us/store', [ContactUsController::class, 'store'])->name('contact.us.store');

Route::middleware(['middleware' => 'PreventBackHistory'])->group(function () {
    Auth::routes();
});

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin', 'auth', 'PreventBackHistory']], function () {

    //หน้าออกบิล หน้าหลัก
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('dashboard/bill/{id}', [AdminController::class, 'bill'])->name('admin.dashboard.bill');
    Route::post('dashboard/bill/add', [AdminController::class, 'addBill'])->name('bill.add');
    Route::get('dashboard/bill/print/{id}', [AdminController::class, 'print'])->name('bill.print');
    Route::get('bill/delete/{id}', [AdminController::class, 'delete'])->name('bill.delete');
    Route::get('dashboard/bill/edit/{id}', [AdminController::class, 'edit'])->name('bill.edit');
    Route::post('dashboard/bill/update/{id}', [AdminController::class, 'update'])->name('bill.update');



    //หน้ารายการชำระเงิน
    Route::get('no_cash', [AdminController::class, 'wallet'])->name('admin.cash');
    Route::get('no_cash/pay/{id}', [AdminController::class, 'pay'])->name('admin.cash.pay');
    Route::post('no_cash/pay/add', [AdminController::class, 'addPay'])->name('pay.add');

    Route::get('cash_success', [AdminController::class, 'wallet_success'])->name('admin.cash_success');
    Route::get('cash_success/view/{id}', [AdminController::class, 'view_success'])->name('admin.view_success');



    




    Route::get('slide', [AdminController::class, 'slide'])->name('admin.slide');
    Route::get('settings', [AdminController::class, 'settings'])->name('admin.settings');



    //จัดการข้อมูลเกี่ยวกับ เเละ เเผนที่ ของ หน้าบ้าน
    Route::get('location', [ContactController::class, 'index'])->name('admin.location');
    Route::get('location/edit/{id}', [ContactController::class, 'edit'])->name('location.edit');
    Route::post('location/update/{id}', [ContactController::class, 'update'])->name('location.update');




    // ข้อมูลของฉัน
    Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');

    Route::post('profile/update/{id}', [AdminController::class, 'profileUpdate'])->name('profile.update');





    //ข้อมูล ผู้ที่ติดต่อมา
    Route::get('contact', [ContactUsController::class, 'index'])->name('admin.contact');
    Route::get('contact/view/{id}', [ContactUsController::class, 'view'])->name('contact.view');
    Route::get('contact/delete/{id}', [ContactUsController::class, 'delete'])->name('contact.delete');





    //ข้อมูลผู้เข้าพัก

    Route::get('roomer', [RoomerController::class, 'index'])->name('roomer.all');
    Route::post('roomer/store', [RoomerController::class, 'store'])->name('roomer.store');
    Route::get('roomer/edit/{id}', [RoomerController::class, 'edit'])->name('roomer.edit');
    Route::post('roomer/update/{id}', [RoomerController::class, 'update'])->name('roomer.update');
    Route::get('roomer/bill/{id}', [RoomerController::class, 'bill'])->name('roomer.bill');
    Route::get('roomer/bill/print/{id}', [RoomerController::class, 'printBill'])->name('roomer.printBill');
    Route::get('roomer/delete/{id}', [RoomerController::class, 'delete'])->name('roomer.delete');



    //ข้อมูลผู้เข้าพักที่อาศัยอยู่
    Route::get('living', [LivingRoomer::class, 'index'])->name('living.all');
    Route::get('living/edit/{id}', [LivingRoomer::class, 'edit'])->name('living.edit');
    Route::post('living/update/{id}', [LivingRoomer::class, 'update'])->name('living.update');


    //ข้อมูลผู้เข้าพักที่ย้ายออกเเล้ว
    Route::get('moveOut', [moveOutController::class, 'index'])->name('moveOut.all');







    //ผู้ดูเเลระบบ
    Route::get('admin', [AdminController::class, 'admin'])->name('admin.admin');
    Route::post('add-admin', [AdminController::class, 'addAdmin'])->name('admin.add');
    Route::get('edit-admin/{id}', [AdminController::class, 'editAdmin'])->name('admin.edit');
    Route::post('update-admin', [AdminController::class, 'updateAdmin'])->name('admin.update');
    Route::get('delete-admin/{id}', [AdminController::class, 'deleteAdmin'])->name('admin.delete');


    //สมาชิก
    Route::get('member', [AdminController::class, 'member'])->name('admin.member');
    Route::post('add-member', [AdminController::class, 'addMember'])->name('member.add');




    //ข่าวสาร
    Route::get('new', [NewsController::class, 'index'])->name('admin.new');
    Route::post('new/store', [NewsController::class, 'store'])->name('new.store');
    Route::get('new/edit/{id}', [NewsController::class, 'edit'])->name('new.edit');
    Route::post('new/update/{id}', [NewsController::class, 'update'])->name('new.update');
    Route::get('new/delete/{id}', [NewsController::class, 'delete'])->name('new.delete');






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
    Route::post('elect_water/update/{id}', [ElectWaterController::class, 'update'])->name('elect_water.update');
    Route::post('elect_water/add', [ElectWaterController::class, 'add'])->name('elect_water.add');
    Route::get('elect_water/delete/{id}', [ElectWaterController::class, 'delete'])->name('elect_water.delete');
});


Route::group(['prefix' => 'user', 'middleware' => ['isUser', 'auth', 'PreventBackHistory']], function () {




    // Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');
    // ข้อมูลของฉัน

    Route::get('profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('profile/update/{id}', [UserController::class, 'update'])->name('user.update');


    Route::get('bills', [UserController::class, 'bills'])->name('user.bills');
});
