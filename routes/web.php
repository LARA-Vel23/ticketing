<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\IpController;
use App\Http\Controllers\UserController;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth'], function(){
    Route::resource('/admin', UserController::class);
    Route::resource('/merchant', MerchantController::class);

    Route::resource('/permission', PermissionController::class);
    Route::resource('/role', RoleController::class);
    Route::resource('/bank', BankController::class);
    Route::resource('/transaction', TransactionController::class);
    Route::resource('/ip', IpController::class);
    Route::get('/profile', function() {
        return view("pages.admin.profile");
    })->name('profile');
    Route::get('/profile_change_password', function() {
        return view("pages.admin.change_password");
    })->name('profile.change_password');
});
