<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class LoginController extends Controller
{
    // Mostrar el formulario de inicio de sesión
    public function create(): View
    {
        return view('auth.login');
    }

    // Validar las credenciales e iniciar sesión
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (!Auth::attempt(
            $credentials,
            $request->boolean('remember')
        )) {
            return back()
                ->withErrors([
                    'email' => 'El correo o la contraseña son incorrectos.',
                ])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        $user = Auth::user();

        // Consultar el rol existente, sin modificar la base de datos
        $rol = DB::table('roles')
            ->where('id', $user->role_id)
            ->value('nombre');

        if (!$rol) {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return back()->withErrors([
                'email' => 'El usuario no tiene un rol válido asignado.',
            ]);
        }

        return redirect()->intended(route('dashboard'));
    }

    // Cerrar sesión
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}