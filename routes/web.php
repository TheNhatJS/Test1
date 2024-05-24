<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

$prefixHome = config('admin.url.prefix_home');

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => $prefixHome], function() {
    
    $prefix = 'home';
    
    Route::group(['prefix' => ''], function() use($prefix){
        Route::get('/', [HomeController::class, 'index'])->name($prefix);
        Route::get('booking-room', [HomeController::class, 'bookingRoom'])->name('home/booking-room');

    });

    // ================================ ADMIN ======================================

    $prefixAdmin = 'admin';
    Route::group(['prefix' => 'admin'], function() use($prefixAdmin){
        Route::get('/', [AdminController::class, 'index'])->name($prefixAdmin);

        Route::get('list-booking-room', [AdminController::class, 'listBookingRom'])->name('home/admin/listbookingroom');

        Route::get('list-user', [AdminController::class, 'listUser'])->name('home/admin/listUser');

        Route::get('list-bill', [AdminController::class, 'listBill'])->name('home/admin/listBill');

        Route::get('list-booking-history', [AdminController::class, 'listBookingHistory'])->name('home/admin/listBookingHistory');
        Route::get('delete-booking-history', [AdminController::class, 'deleteBookingHistory'])->name('home/admin/deleteBookingHistory');



        Route::get('add-room', [AdminController::class, 'addRoom'])->name('home/admin/addRoom');

        Route::get('update-room', [AdminController::class, 'updateRoom'])->name('home/admin/updateRoom');
        
        Route::get('delete-room', [AdminController::class, 'deleteRoom'])->name('home/admin/deleteRoom');
        
        Route::get('delete-bill', [AdminController::class, 'deleteBill'])->name('home/admin/deleteBill');

        Route::get('delete-user', [AdminController::class, 'deleteUser'])->name('home/admin/deleteUser');

        Route::get('thongke', [AdminController::class, 'thongke'])->name('home/admin/thongke');

        // --------------------------------------------------------------------------

        Route::post('post-add-room', [AdminController::class, 'postAddRoom'])->name('home/admin/postAddRoom');
        Route::post('post-add-booking', [AdminController::class, 'postBookingRoom'])->name('home/admin/postBookingRoom');
        Route::post('post-update-room', [AdminController::class, 'postUpdateRoom'])->name('home/admin/postUpdateRoom');

        Route::get('update-status0-room', [AdminController::class, 'updateStatus0Room'])->name('home/admin/updateStatus0Room');
        Route::get('update-status1-room', [AdminController::class, 'updateStatus1Room'])->name('home/admin/updateStatus1Room');

    });


    // ================================ GUEST ======================================


    Route::group(['prefix' => 'guest'], function(){
        Route::get('/', [GuestController::class, 'index'])->name('guest');
        Route::get('list-booking-room', [GuestController::class, 'listBookingRom'])->name('home/guest/listbookingroom');
        Route::get('delete-booking-room', [GuestController::class, 'deleteBookingRom'])->name('home/guest/deleteBookingRoom');
        Route::get('update-booking-room', [GuestController::class, 'updateBookingRom'])->name('home/guest/updateBookingRom');

        Route::post('post-update-booking', [GuestController::class, 'postUpdateBooking'])->name('home/guest/postUpdateBooking');

        Route::post('post-update-user', [GuestController::class, 'postUpdateUser'])->name('home/guest/postUpdateUser');




    });

    // ================================ LOGIN - REGISTER ======================================



    Route::get('login', [AdminController::class, 'login'])->name('home/loginn');
    
    Route::post('post-login', [AdminController::class, 'postlogin'])->name('home/post-login');
    Route::get('get-logout', [AdminController::class, 'getLogout'])->name('home/get-logout');


    Route::get('register', [AdminController::class, 'register'])->name('home/register');
    Route::post('post-register', [AdminController::class, 'postRegister'])->name('home/post-register');

    
    
});

