<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', 'ShowController@dashboard');
Route::get('/data-customer', 'ShowController@customer');
Route::post('/data-customer-store', 'ShowController@store_customer');
Route::get('/export-excel', 'ShowController@export_excel');
Route::post('/import-excel', 'ShowController@import_excel');