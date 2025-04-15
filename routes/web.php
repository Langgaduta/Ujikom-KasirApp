<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;


//admin

use App\Http\Controllers\Admin\AdminAuthController;

use App\Http\Controllers\Admin\ProdukController;

use App\Http\Controllers\Admin\PenjualanController;

use App\Http\Controllers\Admin\UserController;


//user

use App\Http\Controllers\User\UserAuthController;

use App\Http\Controllers\User\ProdukController as ProdukUserController;

use App\Http\Controllers\User\PenjualanController as PenjualanUserController;

use App\Http\Controllers\User\MemberController;


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

use App\Exports\PenjualanExport;

use App\Exports\PenjualanExportAdmin;

use Maatwebsite\Excel\Facades\Excel;





Route::prefix('admin')->group(function () {

    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login.index');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');


    Route::middleware('admin')->group(function () {

        Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard.index');


        //produk

        Route::get('/produk', [ProdukController::class, 'index'])->name('admin.produk.index');

        Route::get('/produk/create', [ProdukController::class, 'create'])->name('admin.produk.create');

        Route::post('/produk', [ProdukController::class, 'store'])->name('admin.produk.store');

        Route::get('/produk/{produk}/edit', [ProdukController::class, 'edit'])->name('admin.produk.edit');

        Route::get('/produk/{produk}/stok', [ProdukController::class, 'editStok'])->name('admin.produk.editStok');

        Route::put('/produk/{produk}', [ProdukController::class, 'update'])->name('admin.produk.update');

        Route::put('/produk/{produk}/stok', [ProdukController::class, 'updateStok'])->name('admin.produk.updateStok');

        Route::delete('/produk/{produk}', [ProdukController::class, 'destroy'])->name('admin.produk.destroy');



        //penjualan

        Route::get('/penjualan', [PenjualanController::class, 'index'])->name('admin.penjualan.index');

        Route::get('/penjualan/create', [PenjualanController::class, 'create'])->name('admin.penjualan.create');



        //user

        Route::get('/user', [UserController::class, 'index'])->name('admin.user.index');

        Route::get('/user/create', [UserController::class, 'create'])->name('admin.user.create');

        Route::post('/user', [UserController::class, 'store'])->name('admin.user.store');

        Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('admin.user.edit');

        Route::put('/user/{user}', [UserController::class, 'update'])->name('admin.user.update');

        Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('admin.user.destroy');

    });

});


//user

Route::prefix('user')->group(function () {

    Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('user.login.index');

    Route::post('/login', [UserAuthController::class, 'login']);

    Route::get('/logout', [UserAuthController::class, 'logout'])->name('user.logout');


    Route::middleware('user')->group(function () {

        Route::get('/dashboard', [UserAuthController::class, 'dashboard'])->name('user.dashboard.index');


        //produk

        Route::get('/produk', [ProdukUserController::class, 'index'])->name('user.produk.index');


        //Member

        Route::get('/member', [MemberController::class, 'index'])->name('user.member.index');

        Route::get('/member/create', [MemberController::class, 'create'])->name('user.member.create');

        Route::post('/member/store', [MemberController::class, 'store'])->name('user.member.store');


        //penjualan

        Route::get('/penjualan', [PenjualanUserController::class, 'index'])->name('user.penjualan.index');

        Route::get('/penjualan/pilihProduk', [PenjualanUserController::class, 'pilihProduk'])->name('user.penjualan.pilihProduk');

        Route::post('/penjualan/simpanNonMember', [PenjualanUserController::class, 'simpanNonMember'])->name('user.penjualan.simpanNonMember');

        Route::post('/penjualan/simpanMember', [PenjualanUserController::class, 'simpanMember'])->name('user.penjualan.simpanMember');

        Route::get('/penjualan/konfirmasiProduk', [PenjualanUserController::class, 'konfirmasiProduk'])->name('user.penjualan.konfirmasiProduk');

        Route::get('/penjualan/dataMember', [PenjualanUserController::class, 'dataMember'])->name('user.penjualan.dataMember');

        Route::post('/penjualan/dataMember', [PenjualanUserController::class, 'storeDataMember'])->name('user.penjualan.storeDataMember');

        Route::get('/penjualan/detailPrint/{penjualanId}', [PenjualanUserController::class, 'detailPrint'])->name('user.penjualan.detailPrint');

    });

});
