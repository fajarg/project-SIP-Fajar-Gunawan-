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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
});
Route::get('user', 'UserController@data');
Route::get('user/add', 'UserController@add');
Route::post('user', 'UserController@addProcess');
Route::get('user/edit/{id}', 'UserController@edit');
Route::patch('user/{id}', 'UserController@editProcess');
Route::delete('user/{id}', 'UserController@delete');