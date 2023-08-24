<?php

use App\Http\Controllers\LaundryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
// Route::get('/users', 'UserController@index')->name('users.index');
// Route::get('/user/search', 'UserController@search')->name('user.search');



Route::get('/', function () {
    return view('layouts.master');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index')->name('user.view');
});

Route::controller(LaundryController::class)->group(function () {
    Route::get('/laundrys', 'index')->name('laundry.view');
    Route::post('/laundrys/upsert', 'upsertData')->name('laundry.upsert');
});

Route::controller(MemberController::class)->group(function () {
    Route::get('/members', 'index')->name('member.view');
});

Route::controller(OrderController::class)->group(function () {
    Route::get('/orders', 'index')->name('order.view');
});

Route::controller(PaketController::class)->group(function () {
    Route::get('/pakets', 'index')->name('paket.view');
});

Route::controller(PaketController::class)->group(function () {
    Route::get('/pakets', 'index')->name('paket.view');
});

Route::controller(ReportController::class)->group(function () {
    Route::get('/reports', 'index')->name('report.view');
});
