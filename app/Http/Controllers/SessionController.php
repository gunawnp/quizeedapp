<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function index()
    {
        return view('session/login');
    }

    function login(Request $request)
    {
        Session::flash('email', $request->email);
        // validasi
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email Wajib Diisi!',
            'password.required' => 'Password Wajib Diisi!'
        ]);

        // otentikasi
        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            // kalau sukses
            return redirect('material')->with('success', 'Berhasil Login!');
        } else {
            // kalau gagal
            return redirect('login')->withErrors('Username dan password yang dimasukkan tidak valid!');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('login')->with('success', 'Berhasil logout!');
    }

    function register()
    {
        return view('session/register');
    }

    function create(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);

        // validasi
        $request->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required',
            'password' => 'required|min:6'
        ], [
            'email.required' => 'Email Wajib Diisi!',
            'email.email' => 'Silahkan masukkan email yang valid!',
            'email.unique' => 'Email sudah pernah digunakan, silahkan gunakan email lain!',
            'name.required' => 'Nama Wajib Diisi!',
            'password.required' => 'Password Wajib Diisi!',
            'password.min' => 'Minimum 6 Karakter Password!'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roleId' => $request->roleId
        ];

        User::create($data);

        // otentikasi
        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            // kalau sukses
            return redirect('material')->with('success', Auth::user()->name . ' Berhasil Login!');
        } else {
            // kalau gagal
            return redirect('login')->withErrors('Username dan password yang dimasukkan tidak valid!');
        }
    }
}
