@extends('layouts.app')

@section('content')
<div class="card">
    <h1>Documento</h1>
    <p>Detalle completo del documento.</p>

    <div class="card" style="background: #f3f4f6; padding: 18px; margin-bottom: 18px;">
        <h2>{{ $documento->titulo }}</h2>
        <p><strong>Tipo:</strong> {{ ucfirst($documento->tipo) }}</p>
        <p><strong>Usuario:</strong> {{ $documento->usuario?->username ?? 'Sin usuario' }}</p>
        <p><strong>Fecha:</strong> {{ $documento->fecha_creacion }}</p>
        <p style="margin-top: 16px;"><strong>Contenido:</strong></p>
        <div style="background: #ffffff; padding: 16px; border-radius: 12px;">{{ $documento->contenido }}</div>
    </div>

    <a class="button secondary" href="{{ route('documentos.edit', $documento) }}">Editar</a>
    <a class="button" href="{{ route('documentos.index') }}">Volver</a>
</div>
@endsection
