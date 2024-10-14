<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\MerchantBankController;
use App\Http\Controllers\MerchantTransactionController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\IpController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/login', function() {
    return view("auth.login");
})->name('auth.login');

Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [DashboardController::class, 'index'])->name('home');
 //Reset password
Route::get('/forgotpassword', [ForgotPasswordController::class, 'forgot']);
Route::post('/reset-password', [ForgotPasswordController::class, 'forgot_password']);
Route::get('reset/{token}', [ForgotPasswordController::class, 'reset']);
Route::post('reset/{token}', [ForgotPasswordController::class, 'post_reset'])->name('submitResetPassword');

Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'Admin', 'prefix' => 'admin'], function() {
        Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
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

    Route::group(['middleware' => 'Merchant', 'prefix' => 'merchant'], function() {
        Route::get('/dashboard', 'App\Http\Controllers\Merchant\DashboardController@index')->name('dashboard');
        Route::get('/transaction', 'App\Http\Controllers\Merchant\TransactionController@index')->name('transaction');
        Route::get('/balance', 'App\Http\Controllers\Merchant\BalanceController@index')->name('balance');
        Route::get('/profile', function() {
            return view("pages.admin.profile");
        })->name('profile');
        Route::get('/change_password', function() {
            return view("pages.merchant.change_password");
        });
        Route::get('/profile_change_password', function() {
            return view("pages.admin.change_password");
        })->name('profile.change_password');
        Route::resource('/bank', MerchantBankController::class);
        Route::resource('/transaction', MerchantTransactionController::class);

    });
});
