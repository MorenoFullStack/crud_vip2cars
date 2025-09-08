<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($request->email == 'luis@gmail.com' && $request->password == '123') {
            $user = (object) [
                'id' => 1,
                'name' => 'Luis Moreno',
                'email' => 'luis@gmail.com'
            ];

            Session::put('user', $user);
            return redirect()->route('vehiculos.index');
        }

        return redirect()->route('login')->withErrors('Credenciales incorrectas');
    }

    public function logout()
    {
        Session::forget('user');
        return redirect()->route('login');
    }
}