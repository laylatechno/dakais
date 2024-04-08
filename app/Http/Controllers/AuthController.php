<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('back.auth');
    }

    public function authenticate(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ],[
            'email.required'=>'Email Wajib diisi',
            'password.required'=>'Password Wajib diisi'
        ]);

       $credentials = $request->only('email','password');

       if (Auth::attempt($credentials)){
        $request->session()->regenerate();
        return redirect('/dashboard');
       }

       return back()->withErrors([
        'loginError' => 'Email atau password salah'
       ]);
    }

    
    public function logout(){
        Auth::logout();
        return redirect('/'); 
    }
}
