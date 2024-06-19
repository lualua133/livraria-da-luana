<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
  public function create()
  {
    return view('usuario.create');
  }

  public function register(Request $request) {
    $validated = $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users,email',
      'password' => 'required|string|min:8|confirmed',
    ]);

    $validated['password'] = Hash::make($validated['password']);

    User::create($validated);

    return redirect()->route('login');
  }
}
