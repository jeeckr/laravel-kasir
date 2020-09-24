<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login_admin()
    {
        return view('auth.login_admin');
    }

    public function store_admin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:8'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (auth()->guard('admin')->attempt($credentials)) {
            return redirect()->route('dashboard_admin');
        }
        return redirect()->route('homepage');
    }

    public function login_employee()
    {
        return view('auth.login_pegawai');
    }

    public function store_employee(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:8'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (auth()->guard('employee')->attempt($credentials)) {
            return redirect()->route('dashboard_employee');
        }
        return redirect()->route('homepage');
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        auth()->guard('employee')->logout();
        auth()->logout();

        return redirect()->route('homepage');
    }
}
