@extends('layouts.app')

@section('content')
<div class="card">
    <h1>Registro</h1>
    <p>Crea tu perfil de usuario para comenzar a generar contenido y recibir recomendaciones.</p>

    <form action="#" method="POST">
        <label for="username">Nombre de usuario</label>
        <input id="username" name="username" type="text" placeholder="usuario123" required>

        <label for="email">Correo electrónico</label>
        <input id="email" name="email" type="email" placeholder="nombre@ejemplo.com" required>

        <label for="password">Contraseña</label>
        <input id="password" name="password" type="password" placeholder="••••••••" required>

        <label for="perfil">Perfil</label>
        <select id="perfil" name="perfil" required>
            <option value="">Selecciona un perfil</option>
            <option value="Estudiante">Estudiante</option>
            <option value="Docente">Docente</option>
            <option value="Trabajador">Trabajador</option>
        </select>

        <button class="button" type="submit">Registrar</button>
    </form>

    <p style="margin-top: 18px;">¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión</a>.</p>
</div>
@endsection
