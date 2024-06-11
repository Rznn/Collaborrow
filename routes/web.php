<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminUnitController;
use App\Http\Controllers\ClientBookingController;
use App\Http\Controllers\ClientItemController;
use App\Http\Middleware\RedirectIfAuthenticated;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing');
});

Route::group(['middleware' => 'only_guest'], function () {
    // login
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
    // register
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
});

Route::group(['middleware' => 'auth'], function () {
    // logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::group(['middleware' => ['only_admin', 'can:manage-crud-admin']], function () {
        // dashboard admin
        Route::get('/admin_dashboard', [AdminController::class, 'index']);

        // categories -> crud hanya admin
        Route::get('/categories', [CategoryController::class, 'index']);
        Route::get('/category_add', [CategoryController::class, 'add']);
        Route::post('/category_add', [CategoryController::class, 'store']);
        Route::get('/category_edit/{slug}', [CategoryController::class, 'edit']);
        Route::put('/category_edit/{slug}', [CategoryController::class, 'update']);
        Route::get('/category_delete/{slug}', [CategoryController::class, 'delete']);
        Route::get('/category_destroy/{slug}', [CategoryController::class, 'destroy']);
        Route::get('/category_deleted_list', [CategoryController::class, 'deleted_categories']);
        Route::get('/category_restore/{slug}', [CategoryController::class, 'restore']);

        // units -> crud hanya admin
        Route::get('/units', [UnitController::class, 'index']);
        Route::get('/unit_add', [UnitController::class, 'add']);
        Route::post('/unit_add', [UnitController::class, 'store']);
        Route::get('/unit_edit/{slug}', [UnitController::class, 'edit']);
        Route::put('/unit_edit/{slug}', [UnitController::class, 'update']);
        Route::get('/unit_delete/{slug}', [UnitController::class, 'delete']);
        Route::get('/unit_destroy/{slug}', [UnitController::class, 'destroy']);
        Route::get('/unit_deleted_list', [UnitController::class, 'deleted_units']);
        Route::get('/unit_restore/{slug}', [UnitController::class, 'restore']);

        // user list -> rud hanya admin
        Route::get('/users', [UserController::class, 'index']);
        Route::get('/user_edit/{slug}', [UserController::class, 'edit']);
        Route::put('/user_edit/{slug}', [UserController::class, 'updaterole']);
        Route::get('/user_ban/{slug}', [UserController::class, 'ban']);
        Route::get('/user_destroy/{slug}', [UserController::class, 'destroy']);
        Route::get('/user_banned_list', [UserController::class, 'banneduser']);
        Route::get('/user_restore/{slug}', [UserController::class, 'restore']);
    });

    Route::group(['middleware' => ['not_user', 'can:manage-crud-admin-adminunit']], function () {
        // items -> crud admin dan admin unit
        Route::get('/items', [ItemController::class, 'index'])->name('items');
        Route::get('/item_add', [ItemController::class, 'add']);
        Route::post('/item_add', [ItemController::class, 'store']);
        Route::get('/item_edit/{slug}', [ItemController::class, 'edit']);
        Route::put('/item_edit/{slug}', [ItemController::class, 'update']);
        Route::get('/item_delete/{slug}', [ItemController::class, 'delete']);
        Route::get('/item_destroy/{slug}', [ItemController::class, 'destroy']);
        Route::get('/item_deleted_list', [ItemController::class, 'deleteditems']);
        Route::get('/item_restore/{slug}', [ItemController::class, 'restore']);

        // bookings
        Route::get('/bookings', [BookingController::class, 'index'])->name('bookings');
        Route::get('/bookings/{id}/approve', [BookingController::class, 'approvebookings'])->name('approve_bookings');
        Route::get('/bookings/{id}/reject', [BookingController::class, 'rejectbookings'])->name('reject_bookings');
        Route::get('/bookings/{id}/confirm', [BookingController::class, 'confirmbookings'])->name('confirm_bookings');
        Route::get('/bookings/{id}/cancel', [BookingController::class, 'cancelbyadmin'])->name('cancel_bookings_byadmin');
        Route::get('/bookings/{id}/ongoing', [BookingController::class, 'ongoingbyadmin'])->name('ongoing_bookings_byadmin');
    });

    Route::group(['middleware' => ['only_client', 'can:manage-crud-client']], function () {
        //dashboard client
        Route::get('/dashboard', [ClientController::class, 'index']);

        //item list
        Route::get('/item_list', [ClientItemController::class, 'index'])->name('item_list');

        // booking item
        Route::get('/book_item/{slug}', [ClientItemController::class, 'book']);
        Route::put('/book_item/{slug}', [ClientItemController::class, 'store']);

        //bookings
        Route::get('/bookings_client', [ClientBookingController::class, 'index'])->name('bookings_client');
        Route::get('/print.booking_show/{id}', [ClientBookingController::class, 'show']);
        Route::get('/print.booking_print/{id}', [ClientBookingController::class, 'print']);
        //cancel booking
        Route::get('/booking_client/{id}/cancel', [BookingController::class, 'cancelbookings'])->name('cancel_bookings');

    });

    Route::group(['middleware' => ['only_admin_unit', 'can:manage-crud-adminunit']], function () {
        // dashboard admin unit
        Route::get('/admin_unit_dashboard', [AdminUnitController::class, 'index']);
    });

    // profile
    Route::get('/profile', [ProfileController::class, 'index'])->middleware('can:manage-crud-client-adminunit');
    Route::get('/profile_edit/{slug}', [ProfileController::class, 'edit'])->middleware('can:manage-crud-client-adminunit');
    Route::put('/profile_edit/{slug}', [ProfileController::class, 'update'])->middleware('can:manage-crud-client-adminunit');
});
