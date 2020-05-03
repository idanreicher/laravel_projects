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

Route::get('/about', function(){
    return view('about');
})->middleware('ipcheck');

Route::middleware(['ipcheck'])->group(function ()
{
    Route::get('members', function () {
        return view('members');
    });

    Route::get('contacts', function () {
        return view('contacts');
    });
});

Route::middleware(['auth', "checkUser:idanreicher@gmail.com"]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
