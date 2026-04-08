@extends('layouts.app')

@section('content')
<div class="card">
    <h1>Detalle de recomendación</h1>
    <p>Información completa de la herramienta recomendada.</p>

    <div class="card" style="background: #f3f4f6; padding: 18px; margin-bottom: 18px;">
        <h2>{{ $herramienta->nombre }}</h2>
        <p><strong>Categoría:</strong> {{ $herramienta->categoria }}</p>
        <p><strong>Tarea:</strong> {{ $herramienta->tarea }}</p>
        <p><strong>URL:</strong> <a href="{{ $herramienta->url }}" target="_blank">{{ $herramienta->url }}</a></p>
        <p style="margin-top: 16px;"><strong>Descripción:</strong></p>
        <div style="background: #ffffff; padding: 16px; border-radius: 12px;">{{ $herramienta->descripcion }}</div>
    </div>

    <a class="button secondary" href="{{ route('recomendaciones.edit', $herramienta) }}">Editar</a>
    <a class="button" href="{{ route('recomendaciones.index') }}">Volver</a>
</div>
@endsection
