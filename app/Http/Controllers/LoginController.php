<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function __construct()
    {
        /* return "lol";
         $this->middleware(function ($request, $next) {
             if (Auth::check()) {
                 return "lol";
                 return Redirect::to('/admin/dashboard');
             }else{
                 return"hom";
             }
             return $next($request);
         });*/

    }

    public function login()
    {
        return view('admin.login.index');
    }

    public function loginCheck(Request $request)
    {

         $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

    
            return redirect()->intended('/admin/dashboard');
        }

     else {
    
        return Redirect::to('/login')->with("failed","user name or password is wrong");

         }
   }
}
