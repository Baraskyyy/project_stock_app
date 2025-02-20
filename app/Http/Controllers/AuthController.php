<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   public function index()
   {
        return view('auth.login');
   }

   public function login(Request $request)
   {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6'
        ], [
            // Ini bahasa indonesia
            'email.required' => 'Form Wajib diisi!!!',
            'email.email' => 'Silahkan isi dengan format @gmail.com',
            'email.exists' => 'Maaf email belum terdaftar',



            'password.required' => 'Password wajib diisi!!!',
            'password.min' => 'password minimal 6 karakter'
        ]);

        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infoLogin)) {
            $request->session()->regenerate();
            return Redirect('/dashboard');
        } else {
            return redirect()->route('login')->with('failed','email atau password salah');
        }
}

    public function logout(){
        Auth::logout();
        return redirect('/');
    }



}
