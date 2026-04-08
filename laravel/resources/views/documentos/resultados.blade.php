@extends('layouts.app')

@section('content')
<div class="card">
    <h1>Resultados</h1>
    <p>Contenido generado a partir de tu entrada. Revisa el resumen y las recomendaciones sugeridas.</p>

    <div style="margin-top: 22px;">
        <h2>{{ ucfirst($data['tipo']) }}: {{ $data['titulo'] }}</h2>
        <p><strong>Texto original:</strong></p>
        <div class="card" style="background: #f3f4f6; padding: 18px;">{{ $data['contenido'] }}</div>

        <h3 style="margin-top: 18px;">Síntesis automática</h3>
        <div class="card" style="background: #eef2ff; padding: 18px;">{{ $summary }}</div>

        <h3 style="margin-top: 18px;">Recomendaciones de herramientas</h3>
        <div class="grid">
            @foreach($recomendaciones as $item)
                <div class="card" style="padding: 18px;">
                    <h4>{{ $item['nombre'] }}</h4>
                    <p>{{ $item['razon'] }}</p>
                </div>
            @endforeach
        </div>

        <a class="button" href="{{ route('recomendaciones') }}" style="margin-top: 20px; display: inline-block;">Ver todas las herramientas</a>
    </div>
</div>
@endsection
