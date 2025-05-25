<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GymController;
use App\Http\Controllers\AdminController;

Route::get('/', [GymController::class, 'index'])->name('home');
Route::get('/register', [GymController::class, 'register'])->name('register');
Route::get('/login', [GymController::class, 'login'])->name('login');
Route::POST('/loginProses', [GymController::class, 'loginProses'])->name('loginProses');
Route::POST('/storePelanggan', [GymController::class, 'storePelanggan'])->name('storePelanggan');
Route::GET('/logout', [GymController::class, 'logout'])->name('logout');

Route::get('/membership/{id}', [GymController::class, 'membership'])->name('membership');
Route::post('/membership/processPemula/{id}', [GymController::class, 'processPemula'])->name('processPemula');
Route::post('/membership/processMenengah/{id}', [GymController::class, 'processMenengah'])->name('processMenengah');
Route::post('/membership/processCalonAtlet/{id}', [GymController::class, 'processCalonAtlet'])->name('processCalonAtlet');
Route::get('/pemula/{id}', [GymController::class, 'pemula'])->name('pemula');
Route::get('/menengah/{id}', [GymController::class, 'menengah'])->name('menengah');
Route::get('/calon_atlet/{id}', [GymController::class, 'calonAtlet'])->name('calonAtlet');

Route::get('/artikel/1', [GymController::class, 'artikel1'])->name('artikel1');
Route::get('/artikel/2', [GymController::class, 'artikel2'])->name('artikel2');
Route::get('/artikel/3', [GymController::class, 'artikel3'])->name('artikel3');


Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin');

    Route::GET('/admin/user_management', [AdminController::class, 'user'])->name('userManagement');
    Route::GET('/admin/user_management/addModalUser', [AdminController::class, 'addModalUser'])->name('addModalUser');
    Route::POST('/admin/user_management/addUser', [AdminController::class, 'addUser'])->name('addUser');
    Route::get('/admin/user_management/showUser/{id}', [AdminController::class, 'showUser'])->name('showUser');
    Route::PUT('/admin/user_management/updateDataUSer/{id}', [AdminController::class, 'userUpdate'])->name('updateDataUSer');
    Route::DELETE('/admin/user_management/deleteUSer/{id}', [AdminController::class, 'userDestroy'])->name('destroyDataUser');

    Route::GET('/admin/admin_management', [AdminController::class, 'admin'])->name('adminManagement');
    Route::GET('/admin/admin_management/addModalAdmin', [AdminController::class, 'addModalAdmin'])->name('addModalAdmin');
    Route::POST('/admin/admin_management/addAdmin', [AdminController::class, 'addAdmin'])->name('addAdmin');
    Route::get('/admin/admin_management/showAdmin/{id}', [AdminController::class, 'showAdmin'])->name('showAdmin');
    Route::PUT('/admin/admin_management/updateAdmin/{id}', [AdminController::class, 'updateAdmin'])->name('updateAdmin');
    Route::DELETE('/admin/user_management/deleteAdmin/{id}', [AdminController::class, 'adminDestroy'])->name('destroyDataAdmin');

    Route::GET('/admin/payment_details', [AdminController::class, 'payment'])->name('payment_details');
    Route::GET('/admin/payment_details/showPayment/{id}', [AdminController::class, 'showPayment'])->name('showPayment');
});