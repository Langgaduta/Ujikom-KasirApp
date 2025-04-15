<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/login/admin', function () {
    return view('pages.admin.login.index');
});
Route::get('/admin/dashboard', function () {
    return view('pages.admin.dashboard.index');
});
Route::get('/admin/produk', function () {
    return view('pages.admin.produk.index');
});
