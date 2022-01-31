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
//Route::post('login', [ 'as' => 'login', 'uses' => [CustomerController::class, "login"]]);

Route::group(['middleware' => ['auth:customer']],function(){
    Route::get('index',[SiteController::class, "index"]);
});
//Route::get('index',[SiteController::class, "index"]);

//Route::get('index',[SiteController::class, "index"]);


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
