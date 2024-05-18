<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAreaController extends Controller
{
    public function login() {
        return view('front.auth'); // Asumsikan Anda memiliki view untuk login area depan
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::guard('siswa')->attempt($credentials)) {
            // Authentication successful, retrieve the authenticated student
            $student = Auth::guard('siswa')->user();
    
            // Store the student's data in the session
            $request->session()->put('loggedInSiswa', $student);
    
            return redirect()->route('area.index');
        } else {
            // Authentication failed, redirect back with error message
            return back()->withErrors([
                'loginError' => 'Email atau password salah',
            ]);
        }
    }

public function logout()
{
    Auth::guard('siswa')->logout();

    return redirect()->route('area.login');
}
}
