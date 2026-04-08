@extends('layouts.app')

@section('content')
<div class="card">
    <h1>Iniciar sesión</h1>
    <p>Accede a tu cuenta para crear resúmenes, presentaciones y recibir sugerencias.</p>

    <form action="#" method="POST">
        <label for="email">Correo electrónico</label>
        <input id="email" name="email" type="email" placeholder="nombre@ejemplo.com" required>

        <label for="password">Contraseña</label>
        <input id="password" name="password" type="password" placeholder="••••••••" required>

        <button class="button" type="submit">Entrar</button>
    </form>

    <p style="margin-top: 18px;">¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate aquí</a>.</p>
</div>
@endsection
