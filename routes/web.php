<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*
Route::get('/', function () {
    return view('home');
});
Auth::routes();
**/

Route::get('apidocs', function(){
    // aglio -i docs/api/blueprint/apidocs.apib --theme-variables Flatly --theme-template triple -o resources/views/apidocs.blade.php
    return view('apidocs');
});

Route::get('{uri?}', function () {
    return view('app');
})->where('uri', '(.*)');
