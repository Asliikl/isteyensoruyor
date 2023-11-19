<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(){
        return view('user.register');
    }
    
    public function registerPost(UserRequest $request)
    {
        $newUser=User::create([
            'name'=>$request->get('name'),
            'surname'=>$request->get('surname'),
            'email'=>$request->get('email'),
            'gender'=>$request->get('gender'),
            'password' => bcrypt($request->get('password')) 
        ]);
        return redirect(route('user.registerPost'));
    }
}
