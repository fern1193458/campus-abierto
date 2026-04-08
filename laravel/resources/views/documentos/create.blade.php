@extends('layouts.app')

@section('content')
<div class="card">
    <h1>Crear documento</h1>
    <p>Registra un nuevo documento asociado a un usuario del sistema.</p>

    @if($usuarios->isEmpty())
        <div class="card" style="background: #fef3c7; color: #92400e; border: 1px solid #fde68a;">
            No hay usuarios disponibles. Crea al menos un usuario antes de agregar documentos.
        </div>
    @else
        <form action="{{ route('documentos.store') }}" method="POST">
            @csrf

            <label for="usuario_id">Usuario</label>
            <select id="usuario_id" name="usuario_id" required>
                <option value="">Selecciona un usuario</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->username }} ({{ $usuario->perfil }})</option>
                @endforeach
            </select>

            <label for="tipo">Tipo de documento</label>
            <select id="tipo" name="tipo" required>
                <option value="">Selecciona un tipo</option>
                <option value="resumen">Resumen</option>
                <option value="guion">Guion</option>
                <option value="presentacion">Presentación</option>
                <option value="video">Video</option>
            </select>

            <label for="titulo">Título</label>
            <input id="titulo" name="titulo" type="text" required>

            <label for="contenido">Contenido</label>
            <textarea id="contenido" name="contenido" rows="8" required></textarea>

            <button class="button" type="submit">Guardar documento</button>
        </form>
    @endif
</div>
@endsection
