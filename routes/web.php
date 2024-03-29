<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\statusSelectController;
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



Route::get('/', [statusSelectController::class, 'index']);
Route::post('/check_status', [statusSelectController::class, 'check_status'])->name('check_status');




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


    //cars

    Route::get('cars', [CarController::class, 'index'])->name('cars.all');
    Route::post('cars/add', [CarController::class, 'store'])->name('cars.store');
    Route::get('cars/edit/{id}', [CarController::class, 'edit'])->name('cars.edit');
    Route::post('cars/update/{id}', [CarController::class, 'update'])->name('cars.update');
    Route::get('cars/view/{id}', [CarController::class, 'view'])->name('cars.view');
    Route::post('cars/checkCar', [CarController::class, 'StoreCheckCar'])->name('cars.StoreCheckCar');

    Route::get('cars/delete/{id}', [CarController::class, 'delete'])->name('cars.delete');







    Route::get('location', [AdminController::class, 'location'])->name('admin.location');
    Route::get('contact', [AdminController::class, 'contact'])->name('admin.contact');
    Route::get('new', [AdminController::class, 'new'])->name('admin.new');
    Route::get('slide', [AdminController::class, 'slide'])->name('admin.slide');

    //ประเภทห้อง
    Route::get('all/room_type', [RoomTypeController::class, 'room_type'])->name('admin.room_type');
    Route::post('room_type/add', [RoomTypeController::class, 'addRoom_type'])->name('room_type.add');
    Route::get('room_type/edit/{id}', [RoomTypeController::class, 'editRoom_type'])->name('room_type.edit');
    Route::post('room_type/update/{id}', [RoomTypeController::class, 'updateRoom_type'])->name('room_type.update');
    Route::get('room_type/delete/{id}', [RoomTypeController::class, 'deleteRoom_type'])->name('room_type.delete');


    //รายการหอพัก
    Route::get('all/room', [RoomController::class, 'index'])->name('admin.room');




    Route::get('settings', [AdminController::class, 'settings'])->name('admin.settings');
});


Route::group(['prefix' => 'user', 'middleware' => ['isUser', 'auth', 'PreventBackHistory']], function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('settings', [UserController::class, 'settings'])->name('user.settings');
});
