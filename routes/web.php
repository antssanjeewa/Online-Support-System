<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', 'HomeController@index')->name('home');

 Route::post('tickets', 'TicketController@store')->name('tickets.store');
 Route::get('tickets/feedback/{ticket}', 'TicketController@feedback')->name('tickets.feedback');
 Route::post('tickets/create', 'TicketController@create')->name('tickets.create');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('dashboard', 'TicketController@index')->name('dashboard');

    Route::get('tickets/{ticket}', 'TicketController@show')->name('tickets.show');
    Route::put('tickets/{ticket}', 'TicketController@update')->name('tickets.update');

});
