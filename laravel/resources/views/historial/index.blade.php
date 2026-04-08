@extends('layouts.app')

@section('content')
<div class="card">
    <h1>Historial de recomendaciones</h1>
    <p>Revisa las sugerencias previas y el uso de herramientas para personalizar futuras recomendaciones.</p>

    <table style="width:100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr style="background: #eff6ff; text-align: left;">
                <th style="padding: 14px;">Fecha</th>
                <th style="padding: 14px;">Usuario</th>
                <th style="padding: 14px;">Herramienta</th>
                <th style="padding: 14px;">Tipo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registros as $item)
                <tr style="border-top: 1px solid #e5e7eb;">
                    <td style="padding: 14px;">{{ $item['fecha'] }}</td>
                    <td style="padding: 14px;">{{ $item['usuario'] }}</td>
                    <td style="padding: 14px;">{{ $item['herramienta'] }}</td>
                    <td style="padding: 14px;">{{ ucfirst($item['tipo']) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
