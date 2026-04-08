<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $usuario = Usuario::where('email', $data['email'])->first();

        if (! $usuario || ! Hash::check($data['password'], $usuario->password)) {
            return back()->withErrors(['email' => 'Credenciales incorrectas.'])->withInput();
        }

        session([
            'usuario_id' => $usuario->id,
            'usuario_nombre' => $usuario->username,
            'usuario_perfil' => $usuario->perfil,
        ]);

        return redirect()->route('home')->with('success', 'Bienvenido ' . $usuario->username);
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string|max:50|unique:usuarios,username',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|string|min:6',
            'perfil' => 'required|string|in:Estudiante,Docente,Trabajador',
        ]);

        $data['password'] = Hash::make($data['password']);
        $usuario = Usuario::create($data);

        session([
            'usuario_id' => $usuario->id,
            'usuario_nombre' => $usuario->username,
            'usuario_perfil' => $usuario->perfil,
        ]);

        return redirect()->route('home')->with('success', 'Registro exitoso. Bienvenido ' . $usuario->username);
    }

    public function logout()
    {
        session()->flush();

        return redirect()->route('login')->with('success', 'Sesión cerrada correctamente.');
    }
}
