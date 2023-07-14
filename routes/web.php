<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemberController;


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


Route::get('/', 'App\Http\Controllers\MemberController@index');
 
Route::get('/', 'App\Http\Controllers\MemberController@getMembers');
 
Route::post('/save', 'App\Http\Controllers\MemberController@save');

//Route::post('users', [UsersController::class, 'store']);
 
Route::patch('/update/{id}', ['as' => 'member.update', 'uses' => 'App\Http\Controllers\MemberController@update']);
 
Route::delete('/delete/{id}', ['as' => 'member.delete', 'uses' => 'App\Http\Controllers\MemberController@delete']);

//Route for Auth controller;

Route::post('/login', 'App\Http\Controllers\AuthController@login');

Route::post('/register', 'App\Http\Controllers\AuthController@register');

Route::post('/logout', 'App\Http\Controllers\AuthController@logout');

Route::patch('/member/{id}/update-password', 'MemberController@updatePassword')->name('member.updatePassword');

Route::delete('/delete/{id}', [MemberController::class, 'delete'])->name('member.delete');

