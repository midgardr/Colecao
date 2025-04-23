<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function formLogin()
    {
        return view('formLogin');
    }

    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return 'Logou';
        }
        return redirect()->back()->with(['mensagem' => 'E-mail ou senha inválidos!']);
    }
}
