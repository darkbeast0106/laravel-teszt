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
    return view('elso');
});
Route::get('/elso', function () {
    return view('elso');
})->name('elso');
Route::get('/masodik', function () {
    return view('masodik');
})->name('masodik');
Route::get('/harmadik', function () {
    return view('harmadik');
})->name('harmadik');
