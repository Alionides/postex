<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
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

Route::post("logout", [CustomerController::class, "logout"])->name('logout');
Route::get("login", [CustomerController::class, "login"])->name('login');
Route::post("login", [CustomerController::class, "login"])->name('login');
Route::get('/', [SiteController::class, "index"])->name('home');
Route::get('register', [SiteController::class, "register"])->name('register');
Route::get('corporateregister', [SiteController::class, "corporateregister"])->name('corporateregister');



Route::get('shippingsender', [SiteController::class, "shippingsender"])->name('shipping.sender');

Route::group(['middleware' => ['auth:customer']],function(){
    Route::group(['prefix' => 'account'], function () {
        Route::get('/', [SiteController::class, "user"])->name('account.home');        
    });
});



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
