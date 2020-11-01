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

Route::get('/', 'TripController@index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/trip/user', 'UserReservationController@index');
Route::resource('trip', 'TripController');

Route::get('reservation/create/{trip}', 'ReservationController@create');
Route::post('reservation/store/{trip}', 'ReservationController@store')->name('reservation.store');
Route::delete('reservation/{reservation}', 'ReservationController@destroy')->name('reservation.destroy');

Route::get('notification/mark-as-read', 'NotificationController@markAsRead');

