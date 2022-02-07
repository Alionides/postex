<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CorporateController;
use App\Http\Controllers\IndividualController;
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
Route::get('/', [SiteController::class, "index"])->name('home');
Route::group(['prefix' => 'login'], function () {
    Route::get("corporate", [CustomerController::class, "login_corporate"])->name('login.corporate');
    Route::get("individual", [CustomerController::class, "login_individual"])->name('login.individual');
    Route::post("corporate", [CustomerController::class, "login_corporate"])->name('login.corporate');
    Route::post("individual", [CustomerController::class, "login_individual"])->name('login.individual');
    Route::post("forget", [CustomerController::class, "forget_password"])->name('login.forget');
});
Route::group(['prefix' => 'register'], function () {
    Route::get('individual', [CustomerController::class, "register_individual"])->name('register.individual');
    Route::get('corporate', [CustomerController::class, "register_corporate"])->name('register.corporate');
    Route::post('corporate', [CustomerController::class, "register_corporate"])->name('register.corporate');
});
Route::get('shippingsender', [SiteController::class, "shippingsender"])->name('shipping.sender');
Route::group(['middleware' => ['auth:customer']],function(){
    Route::group(['prefix' => 'account'], function () {
        Route::post("logout", [CustomerController::class, "logout"])->name('logout');
        Route::get('individual', [IndividualController::class, "index"])->name('account.individual');
        Route::get('corporate', [CorporateController::class, "index"])->name('account.corporate');
    });
});



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
