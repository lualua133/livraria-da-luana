<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function loginForm()
  {
    return view('login');
  }

  public function login(Request $request)
  {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();

      return redirect()->route('livros.index');
    }

    return back()->withErrors([
      'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
    ]);
  }

  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()->route('loginForm');
  }
}
