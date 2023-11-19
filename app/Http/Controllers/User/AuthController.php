<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
   public function login()
   {
    return view('user.login');
   }
   public function loginPost(Request $request)
   {
      $checkUser=User::where('email', $request->get('email'))->first();
      if($checkUser &&  \Hash::check($request->get('password'),$checkUser->password)){
         session()->put('user',$checkUser);
         return redirect(route('user.home'));
      }
      else{
         return redirect()->route('user.login')->withErrors('error login');
     }
   }
   public function logout(){
      session()->forget('user');
      return redirect(route('user.login'));
   }
}
