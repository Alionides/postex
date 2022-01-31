<?php

use Illuminate\Support\Facades\Route;

Route::get('', 'SiteController@index')->name('front.home');
Route::get('login', 'SiteController@login')->name('login');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
