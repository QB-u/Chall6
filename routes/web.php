<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Models\Web;
use App\Http\Requests\StoreQuanRequest;
use App\Http\Requests\UpdateQuanRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Concerns\ValidatesAttributes;
use App\Models\User;


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
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/add_user', function () {
    return view('add_user');
});
Route::get('/add_web', function () {
    return view('add_web');
});
Route::get('/edit_web/{id}', function ($id) {
    $web = Web::find($id);
    return view('edit_web', compact('web'));
});
Route::get('/edit_user/{id}', function ($id) {
    $user = User::find($id);
    return view('edit_user', compact('user'));
});
Route::get('/showWeb',[Controllers\WebController::class, 'showWeb']);
Route::post('/auth/login',[Controllers\UserController::class, 'getLogin']);
Route::post('edit_web',[Controllers\WebController::class,'edit']);
Route::post('auth/web',[Controllers\WebController::class, 'addWeb']);
Route::post('edit/{id}',[Controllers\WebController::class, 'edit']);
Route::post('/auth/update',[Controllers\UserController::class, 'updateUsers']);
Route::post('/auth/create',[Controllers\UserController::class, 'createUsers']);
Route::get('/auth/delete/{id}',[Controllers\UserController::class, 'deleteUsers']);
Route::get('/delete_web/{id}',[Controllers\WebController::class, 'deleteWeb']);
Route::get('/showUser',[Controllers\UserController::class, 'show']);
Route::get('/logout', function () {
    Session::flush();
    return redirect('/login');
});