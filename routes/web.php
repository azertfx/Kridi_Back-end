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

define('proj', 'kridi');
define('ASSET',url('asset'));

Route::Resource('/','HomePage');
Route::Get('{name}/{id}','InfoKridi@index');
Route::Post('{name}/{id}/addkridi','InfoKridi@store');
Route::Get('{id}','InfoKridi@edit');
Route::Post('{id}/update','InfoKridi@update');
Route::Delete('{id}','InfoKridi@destroy');
Route::Get('{name}/{id}/{total}','PayingPage@index');
Route::Post('{name}/{id}/{total}/paying','PayingPage@store');
Route::Get('{name}/{id}/{price}/{total}','PayingPage@edit');
Route::Post('{name}/{id}/{price}/{total}/update','PayingPage@update');
Route::Delete('{name}/{id}/{price}/{total}','PayingPage@destroy');