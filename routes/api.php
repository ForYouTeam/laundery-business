<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\LaundryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1/users')->controller(UserController::class)->group(function () {
    Route::get('/', 'getAllData');
    Route::get('/{id}', 'getDataById');
    Route::post('/', 'upsertData');
});

Route::prefix('v1/laundrys')->controller(LaundryController::class)->group(function () {
    Route::get('/', 'getAllData');
    Route::get('/{id}', 'getDataById');
    Route::post('/', 'upsertData');
});
