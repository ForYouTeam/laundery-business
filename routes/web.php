<?php

use App\Http\Controllers\LaundryController;
use App\Http\Controllers\UserController;
use App\Models\Laundry;
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

Route::get('/', function () {
    return view('layouts.master');
});

Route::prefix('user/')->group(function () {
    return view('Admin.user.index');
});

Route::prefix('/laundry')->controller(LaundryController::class)->group(function () {
    Route::get('/', 'index');
});

// Route::get('/web/domisili', function () {
//     return view('web.layanan.domisili');
// });
