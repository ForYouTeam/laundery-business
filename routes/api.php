<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\LaundryController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ReportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('v1/dashboard', [DashboardController::class, 'index']);


Route::prefix('v1/users')->controller(UserController::class)->group(function () {
    Route::get('/', 'getAllData');
    Route::get('/{id}', 'getDataById');
    Route::post('/', 'upsertData');
    Route::delete('/{id}', 'deleteData');
});

Route::prefix('v1/laundrys')->controller(LaundryController::class)->group(function () {
    Route::get('/', 'getAllData');
    Route::get('/{id}', 'getDataById');
    Route::post('/', 'upsertData');
    Route::delete('/{id}', 'deleteData');
});

Route::prefix('v1/pakets')->controller(PaketController::class)->group(function () {
    Route::get('/', 'getAllData');
    Route::get('/{id}', 'getDataById');
    Route::post('/', 'upsertData');
    Route::delete('/{id}', 'deleteData');
});

Route::prefix('v1/orders')->controller(OrderController::class)->group(function () {
    Route::get('/', 'getAllData');
    Route::get('/{id}', 'getDataById');
    Route::post('/', 'upsertData');
    Route::delete('/{id}', 'deleteData');
});

Route::prefix('v1/members')->controller(MemberController::class)->group(function () {
    Route::get('/', 'getAllData');
    Route::get('/{id}', 'getDataById');
    Route::post('/', 'upsertData');
    Route::delete('/{id}', 'deleteData');
});

Route::prefix('v1/reports')->controller(ReportController::class)->group(function () {
    Route::get('/', 'getAllData');
    Route::get('/{id}', 'getDataById');
    Route::post('/', 'upsertData');
    Route::delete('/{id}', 'deleteData');
});
