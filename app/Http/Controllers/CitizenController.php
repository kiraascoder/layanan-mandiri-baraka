<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Citizen;

class CitizenController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }
    public function loginCitizen(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|exists:citizens,nik',
            'password' => 'required|min:6',
        ], [
            'nik.required' => 'Silahkan masukkan NIK Anda.',
            'nik.exists' => 'NIK tidak ditemukan.',
            'password.required' => 'Silahkan masukkan password Anda.',
            'password.min' => 'Password minimal terdiri dari 6 karakter.',
        ]);

        $credentials = $request->only('nik', 'password');


        if (Auth::guard('citizen')->attempt($credentials, $request->has('remember'))) {
            return redirect('/profil')->with('success', 'Login berhasil!');
        }

        return redirect('login')
            ->withErrors(['login' => 'Login gagal. NIK atau password tidak sesuai!'])
            ->withInput();
    }

    public function profil()
    {
        $citizens = Citizen::all();
        return view('citizens.profil', compact('citizens'));
    }
    public function viewSaran()
    {
        return view('citizens.beri-saran');
    }
    public function viewTani()
    {
        return view('citizens.informasi-tani');
    }


    public function logout(Request $request)
    {
        Auth::guard('citizen')->logout();
        return redirect('/login')->with('success', 'Logout berhasil!');
    }
}
