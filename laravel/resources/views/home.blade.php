@extends('layouts.app')

@section('content')
<div class="card">
    <h1>Bienvenido a Campus AI</h1>
    <p>Gestiona tus perfiles, crea contenido inteligente y recibe recomendaciones útiles para tu trabajo académico.</p>

    <div class="grid" style="margin-top: 24px;">
        <div class="card" style="padding: 20px;">
            <h2>Crear contenido</h2>
            <p>Genera resúmenes, guiones o presentaciones a partir de texto ingresado.</p>
            <a class="button" href="{{ route('documentos.create') }}">Empezar</a>
        </div>
        <div class="card" style="padding: 20px;">
            <h2>Recomendaciones</h2>
            <p>Obtén herramientas sugeridas según el tipo de contenido que necesitas crear.</p>
            <a class="button" href="{{ route('recomendaciones.index') }}">Ver herramientas</a>
        </div>
        <div class="card" style="padding: 20px;">
            <h2>Historial</h2>
            <p>Consulta las recomendaciones anteriores para mejorar tu flujo de trabajo.</p>
            <a class="button" href="{{ route('historial') }}">Ver historial</a>
        </div>
    </div>

    <div class="grid" style="margin-top: 24px;">
        <div class="card">
            <h3>Documentos guardados</h3>
            <p>{{ $estadisticas['documentos'] }} documentos creados</p>
        </div>
        <div class="card">
            <h3>Herramientas disponibles</h3>
            <p>{{ $estadisticas['herramientas'] }} aplicaciones apoyando tu trabajo</p>
        </div>
        <div class="card">
            <h3>Recomendaciones generadas</h3>
            <p>{{ $estadisticas['recomendaciones'] }} registros en el historial</p>
        </div>
    </div>
</div>
@endsection
