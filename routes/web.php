<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CorporateController;
use App\Http\Controllers\IndividualController;
use App\Http\Controllers\Voyager\AcceptanceController;
use App\Http\Controllers\Voyager\ReadyController;
use App\Http\Controllers\Admin\AcceptancesController;
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
Route::get('forgetpassword/{token}', [CustomerController::class, "forgetpassword"])->name('forgetpassword');
Route::post('forgetpassword', [CustomerController::class, "forgetpassword"])->name('forgetpassword');
Route::get('campaigns', [SiteController::class, "campaigns"])->name('home.campaigns');
Route::get('onlineservices', [SiteController::class, "onlineservices"])->name('home.onlineservices');
Route::get('tariffs', [SiteController::class, "tariffs"])->name('home.tariffs');
Route::get('branches', [SiteController::class, "branches"])->name('home.branches');
Route::get('internaldelivery', [SiteController::class, "internaldelivery"])->name('home.internaldelivery');
Route::get('getfromdoor', [SiteController::class, "getfromdoor"])->name('home.getfromdoor');
Route::get('deliveryoffices', [SiteController::class, "deliveryoffices"])->name('home.deliveryoffices');
Route::get('aboutus', [SiteController::class, "aboutus"])->name('home.aboutus');



Route::get('leykoz', [SiteController::class, "leykoz"])->name('home.leykoz');
Route::get('uafa', [SiteController::class, "uafa"])->name('home.uafa');
Route::get('yardimeli', [SiteController::class, "yardimeli"])->name('home.yardimeli');
Route::get('postkart', [SiteController::class, "postkart"])->name('home.postkart');
Route::get('explus', [SiteController::class, "explus"])->name('home.explus');
Route::get('edukart', [SiteController::class, "edukart"])->name('home.edukart');
Route::get('covid', [SiteController::class, "covid"])->name('home.covid');
Route::get('contactless', [SiteController::class, "contactless"])->name('home.contactless');
Route::get('multiform', [SiteController::class, "multiform"])->name('home.multiform');
Route::get('shorttime', [SiteController::class, "shorttime"])->name('home.shorttime');
Route::get('postexapp', [SiteController::class, "postexapp"])->name('home.postexapp');
Route::get('calculator', [SiteController::class, "calculator"])->name('home.calculator');
Route::get('ecommerce', [SiteController::class, "ecommerce"])->name('home.ecommerce');


Route::get('tracking/{id}', [SiteController::class, "check_tracking"])->name('home.tracking');
Route::post('tracking', [SiteController::class, "check_tracking"])->name('home.tracking');
Route::post('trackingpost', [SiteController::class, "trackingpost"])->name('home.trackingpost');



Route::get('advice-and-complaint',  [SiteController::class, "advice_complaint"])->name('home.advice_complaint');
Route::post('advice-and-complaint', [SiteController::class, "advice_complaint"])->name('home.advice_complaint');



Route::get('forgetpassword', [SiteController::class, "forgetpassword"])->name('forgetpassword');
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
        Route::post('corporate', [CorporateController::class, 'getjsonacceptance']);
        Route::get('corporate/wherecargo', [CorporateController::class, 'wherecargo'])->name('account.corporate.wherecargo');
        Route::post('corporate/wherecargo', [CorporateController::class, 'wherecargo'])->name('account.corporate.wherecargo');
    });
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('acceptances/print', [AcceptancesController::class, "index"])->name('acceptances.print');
    Route::get('readies/print', [ReadyController::class, "readyprint"])->name('ready.print');
    Voyager::routes();
    Route::get('teslim', ['uses' => 'Voyager\AcceptanceController@teslim','as' => 'teslim']);
    
});
