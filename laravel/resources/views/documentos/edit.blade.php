@extends('layouts.app')

@section('content')
<div class="card">
    <h1>Editar documento</h1>
    <p>Actualiza los datos del documento seleccionado.</p>

    <form action="{{ route('documentos.update', $documento) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="usuario_id">Usuario</label>
        <select id="usuario_id" name="usuario_id" required>
            <option value="">Selecciona un usuario</option>
            @foreach($usuarios as $usuario)
                <option value="{{ $usuario->id }}" {{ $usuario->id === $documento->usuario_id ? 'selected' : '' }}>
                    {{ $usuario->username }} ({{ $usuario->perfil }})
                </option>
            @endforeach
        </select>

        <label for="tipo">Tipo de documento</label>
        <select id="tipo" name="tipo" required>
            <option value="">Selecciona un tipo</option>
            <option value="resumen" {{ $documento->tipo === 'resumen' ? 'selected' : '' }}>Resumen</option>
            <option value="guion" {{ $documento->tipo === 'guion' ? 'selected' : '' }}>Guion</option>
            <option value="presentacion" {{ $documento->tipo === 'presentacion' ? 'selected' : '' }}>Presentación</option>
            <option value="video" {{ $documento->tipo === 'video' ? 'selected' : '' }}>Video</option>
        </select>

        <label for="titulo">Título</label>
        <input id="titulo" name="titulo" type="text" value="{{ $documento->titulo }}" required>

        <label for="contenido">Contenido</label>
        <textarea id="contenido" name="contenido" rows="8" required>{{ $documento->contenido }}</textarea>

        <button class="button" type="submit">Actualizar documento</button>
    </form>
</div>
@endsection
