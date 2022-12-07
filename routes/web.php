<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AdminLoginController;


Route::get('/', function () {
    return "Hello World";
});

Route::get('/login', function () {
    return "Hello World";
})->name('login');


Route::group(['namespace' => "Backend"], function () {
    Route::any('/admin-login', [AdminLoginController::class, 'index'])->name('admin-login');

});


Route::group(['namespace' => "Backend", "prefix" => 'company-backend', 'middleware' => 'auth:admin'], function () {
    Route::any('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('admin-user', "\App\Http\Controllers\Backend\AdminController");
    Route::any('admin-logout', [AdminLoginController::class, 'logout'])->name('admin-logout');

});
