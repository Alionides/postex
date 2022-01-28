<?php

use Illuminate\Support\Facades\Route;

Route::get('', 'SiteController@index');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
