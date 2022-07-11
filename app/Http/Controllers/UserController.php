<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuanRequest;
use App\Http\Requests\UpdateQuanRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;

class UserController extends Controller
{
    public function createUsers(StoreQuanRequest $request)
    {
        $user = new User();
        $user->username = $request->username;
        $user->password = hash('md5', $request->password);
        $user->save();
        return redirect('/showUser');
    }
    public function updateUsers(UpdateQuanRequest $request)
    {
        if(Session('role') == 'teacher' || Session('id') == $request->id){
            $user = User::find($request->id);
            $user->username = $request->username;
            if($request->password != ''){
                $user->password = hash('md5', $request->password);
            }
            $user->save();
            return redirect('/profile');
        }
    }
    public function deleteUsers(StoreQuanRequest $request)
    {
        if(Session('role') == 'teacher'){
            $user = User::find($request->id);
            $user->delete();
            return redirect('/showUser');
        }
    }
    public function show(User $user)
    {
        $users = User::all();
        return view('student', compact('users'));
    }
    public function getLogin(StoreQuanRequest $request)
    {
        $user = User::where('username', $request->username)->first();
        if ($user) {
            if (hash('md5', $request->password) === $user->password) {
                session()->put('username', $user->username);
                session()->put('role', $user->role);
                session()->put('id', $user->id);
                session()->put('password', $request->password);
                return redirect('/');
            }
            else {
                return redirect('/login');
            }
        }
    }
}