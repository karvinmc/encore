<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
  public function login(Request $request)
  {
    $credentials = $request->validate([
      'email' => 'required|email',
      'password' => 'required',
    ]);

    if (Auth::attempt($credentials, $request->remember)) {
      $request->session()->regenerate();
      return redirect()->intended('/');
    }

    return back()->withErrors([
      'email' => 'Email or password is incorrect.',
    ]);
  }

  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login')->with('success', 'You have been logged out successfully.');
  }

  public function register(Request $request)
  {
    $data = $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|email|max:255|unique:users',
      'password' => 'required|string|min:8|confirmed',
    ]);

    $data['password'] = Hash::make($data['password']);
    $data['role'] = 'customer';
    User::create($data);

    return redirect('/login')->with('success', 'Registration successful. Please sign in.');
  }
}
