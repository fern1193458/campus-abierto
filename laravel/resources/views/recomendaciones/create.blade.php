@extends('layouts.app')

@section('content')
<div class="card">
    <h1>Agregar recomendación</h1>
    <p>Registra una nueva herramienta o plataforma para sugerir según el tipo de contenido.</p>

    <form action="{{ route('recomendaciones.store') }}" method="POST">
        @csrf

        <label for="nombre">Nombre</label>
        <input id="nombre" name="nombre" type="text" required>

        <label for="descripcion">Descripción</label>
        <textarea id="descripcion" name="descripcion" rows="4"></textarea>

        <label for="categoria">Categoría</label>
        <input id="categoria" name="categoria" type="text">

        <label for="url">URL</label>
        <input id="url" name="url" type="url" placeholder="https://ejemplo.com">

        <label for="tarea">Tarea principal</label>
        <input id="tarea" name="tarea" type="text" placeholder="Presentaciones, Video, Documento...">

        <button class="button" type="submit">Guardar recomendación</button>
    </form>
</div>
@endsection
