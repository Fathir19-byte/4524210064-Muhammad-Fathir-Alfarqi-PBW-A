<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Fallback POST handler for /admin/login in case browser submits form natively
Route::post('/admin/login', function (Request $request) {
    $email = $request->input('email') ?? $request->input('data.email');
    $password = $request->input('password') ?? $request->input('data.password');

    if ($email && $password) {
        if (Auth::attempt(['email' => $email, 'password' => $password], $request->boolean('remember') || $request->boolean('data.remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }
    }

    return redirect('/admin/login')->withErrors([
        'data.email' => 'Invalid credentials or JavaScript was blocked. Please refresh the page.',
    ]);
});
