<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Register Logic
    public function register(Request $request)
    {

    // Check the user role and create a record accordingly
    if ($request->input('role') === 'Dementor') {
        $user = User::create([
            'role'=> $request->input('role'),
            'nama' => $request->input('nama'),
            'nik' => $request->input('nik'),
            'usia' => $request->input('usia'),
            'alamat' => $request->input('alamat'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
    } elseif ($request->input('role') === 'Dementee') {
        $user = User::create([
            'role'=> $request->input('role'),
            'nama' => $request->input('nama'),
            'nik' => $request->input('nik'),
            'usia' => $request->input('usia'),
            'alamat' => $request->input('alamat'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
    } else {
        // Handle invalid role
        return redirect()->route('register')->with('error', 'Invalid role');
    }

        event(new Registered($user));
        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }

    // Login Logic
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect(RouteServiceProvider::HOME);
        }

        return redirect()->back()->with('error', 'Invalid Credentials');
    }

    // Logout Logic
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
