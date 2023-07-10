<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginPost(Request $request)
    {
        $credetials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        //checking login valid
        if (Auth::attempt($credetials)) {
            //admin
            if (Auth::user()->role_id == 1) {
                return redirect('/admin_dashboard');
            }
            //admin unit
            if (Auth::user()->role_id == 2) {
                return redirect('/admin_unit_dashboard');
            }
            //user
            if (Auth::user()->role_id == 3) {
                return redirect('/dashboard');
            }
        }
        //error
        return back()->with('error', 'Error Email or Password');
    }

    public function register()
    {
        return view('register');
    }

    public function registerPost(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'no_telp' => 'required',
            'address' => 'required',
            ])->validate();

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_telp' => $request->no_telp,
            'address' => $request->address,
        ]);

        return redirect('/login')->with('success', 'Register successfully');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
