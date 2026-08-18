<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Mostrar el formulario de inicio de sesión
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Intentar iniciar sesión
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Por favor ingrese su correo electrónico.',
            'email.email' => 'El formato del correo no es válido.',
            'password.required' => 'Debe ingresar su contraseña.',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('personas.index'))
                ->with('success', 'Inicio de sesión exitoso. ¡Bienvenido!');
        }

        return back()->with('error', 'Las credenciales no son válidas.');
    }

    /**
     * Cerrar sesión
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Sesión cerrada correctamente.');
    }
}
