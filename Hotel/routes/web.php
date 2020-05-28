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

Auth::routes(['verify' => true]);
// Route::get('/test', function(){return "test";})->middleware('\App\Http\Middleware\CheckQueryParam');
Route::get('/test', function(){

    // $secret = encrypt('black-saber');
    // var_dump($secret);
    // var_dump(decrypt($secret));

    $hash = Hash::make('black-saber');
    var_dump($hash);
    var_dump(Hash::check('black-saber',$hash));
    var_dump(Hash::needsRehash($hash));
    $oldHash = Hash::make('black-saber', ['rounds' => 5]);
    var_dump(Hash::needsRehash($oldHash));
    var_dump($oldHash);
    var_dump(Hash::make('blak-saber'));


})->middleware('verified');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/rooms/{roomType?}', 'ShowRoomsController');

Route::resource('/bookings', 'BookingController');

Route::resource('/room_types', 'RoomTypeController');


