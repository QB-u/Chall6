<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;


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
    return view('index');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/Profile', function () {
    return view('profile');
});
Route::get('/Student', function () {
    return view('student');
});
Route::get('/add_user', function () {
    return view('add_user');
});
Route::get('/add_web', function () {
    return view('add_web');
});
Route::get('/showWeb',[Controllers\WebController::class, 'showWeb']);
Route::post('/auth/login',[Controllers\UserController::class, 'getLogin']);
Route::get('/auth/update/{id}',[Controllers\UserController::class, 'updateUsers']);
Route::post('/auth/create',[Controllers\UserController::class, 'createUsers']);
Route::get('/auth/delete/{id}',[Controllers\UserController::class, 'deleteUsers']);
Route::get('/delete_web/{id}',[Controllers\WebController::class, 'deleteWeb']);
Route::get('/showUser',[Controllers\UserController::class, 'show']);
Route::get('/logout', function () {
    Session::flush();
    return redirect('/login');
});