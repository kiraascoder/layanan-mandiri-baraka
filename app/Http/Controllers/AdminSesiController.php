<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class AdminSesiController extends Controller
{

    public function index()
    {
        return view('admin.login');
    }


    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Silahkan Masukkan Email Anda',
            'email.email' => 'Format email yang Anda masukkan tidak valid',
            'password.required' => 'Silahkan Masukkan Password Anda',
            'password.min' => 'Password minimal terdiri dari 6 karakter',
        ]);


        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];


        if (Auth::attempt($infologin, $request->has('remember'))) {
            if (Auth::user()->is_admin == 1) {
                return redirect('/admin/dashboard');
            }
        } else {
            return redirect('/admin/login')->withErrors(['login' => 'Login Gagal, Email atau Password tidak sesuai!'])->withInput();
        }
    }
    public function logout(Request $request)
    {
        Auth::guard('users')->logout();
        return redirect('/admin/login')->with('success', 'Logout berhasil!');
    }
}
