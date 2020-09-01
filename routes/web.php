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

Route::view('/contact', 'contact');
Route::view('/about', 'about');
Route::view('/test', 'my_test_view');

// Tells the route to go to the user's controller and run the list function
Route::get('/users', 'UsersController@list');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


