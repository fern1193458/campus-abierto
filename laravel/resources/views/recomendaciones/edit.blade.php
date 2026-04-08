@extends('layouts.app')

@section('content')
<div class="card">
    <h1>Editar recomendación</h1>
    <p>Actualiza los datos de la herramienta sugerida.</p>

    <form action="{{ route('recomendaciones.update', $herramienta) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nombre">Nombre</label>
        <input id="nombre" name="nombre" type="text" value="{{ $herramienta->nombre }}" required>

        <label for="descripcion">Descripción</label>
        <textarea id="descripcion" name="descripcion" rows="4">{{ $herramienta->descripcion }}</textarea>

        <label for="categoria">Categoría</label>
        <input id="categoria" name="categoria" type="text" value="{{ $herramienta->categoria }}">

        <label for="url">URL</label>
        <input id="url" name="url" type="url" value="{{ $herramienta->url }}">

        <label for="tarea">Tarea principal</label>
        <input id="tarea" name="tarea" type="text" value="{{ $herramienta->tarea }}">

        <button class="button" type="submit">Actualizar recomendación</button>
    </form>
</div>
@endsection
