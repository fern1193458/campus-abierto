@extends('layouts.app')

@section('content')
<div class="card">
    <h1>Crear contenido</h1>
    <p>Genera un resumen o presentación a partir de tu texto y obtén recomendaciones a medida.</p>

    <form action="{{ route('crear.guardar') }}" method="POST">
        @csrf
        <label for="tipo">Tipo de contenido</label>
        <select id="tipo" name="tipo" required>
            <option value="">Selecciona un tipo</option>
            <option value="resumen">Resumen</option>
            <option value="guion">Guion</option>
            <option value="presentacion">Presentación</option>
            <option value="video">Video</option>
        </select>

        <label for="titulo">Título</label>
        <input id="titulo" name="titulo" type="text" placeholder="Título del contenido" required>

        <label for="contenido">Texto o ideas</label>
        <textarea id="contenido" name="contenido" rows="8" placeholder="Escribe aquí el contenido a procesar" required></textarea>

        <button class="button" type="submit">Generar y guardar</button>
    </form>
</div>
@endsection
