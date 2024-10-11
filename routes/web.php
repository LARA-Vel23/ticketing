<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\IpController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Route;

/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('auth.passwords');
Route::post('/forgot-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('auth.submitForgetPassword');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('auth.showResetPassword');
Route::post('/reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('auth.submitResetPassword');

Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'Admin', 'prefix' => 'admin'], function() {
        Route::resource('/admin', UserController::class);
        Route::resource('/merchant', MerchantController::class);
        Route::resource('/role', RoleController::class);
        Route::resource('/permission', PermissionController::class);
        Route::resource('/ip', IpController::class);
        Route::resource('/currency', CurrencyController::class);
        Route::resource('/transaction', TransactionController::class);
        Route::resource('/bank', BankController::class);
        Route::resource('/country', CountryController::class);

        Route::get('/profile', function() {
            return view("pages.admin.profile");
        })->name('admin.profile');
        Route::get('/profile_change_password', function() {
            return view("pages.admin.change_password");
        })->name('admin.profile.change_password');
    });

    Route::group(['middleware' => 'Merchant'], function() {
        Route::get('/dashboard', 'App\Http\Controllers\Merchant\DashboardController@index')->name('dashboard');
        Route::get('/profile', function() {
            return view("pages.admin.profile");
        })->name('profile');
        Route::get('/profile_change_password', function() {
            return view("pages.admin.change_password");
        })->name('profile.change_password');
    });
});
