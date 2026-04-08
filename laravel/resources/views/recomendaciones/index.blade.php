@extends('layouts.app')

@section('content')
<div class="card">
    <h1>Recomendaciones</h1>
    <p>Catálogo de herramientas para sugerir según la tarea y el tipo de contenido.</p>

    <a class="button" href="{{ route('recomendaciones.create') }}" style="margin-bottom: 20px;">Nueva recomendación</a>

    @if(session('success'))
        <div class="card" style="background: #ecfdf5; color: #065f46; border: 1px solid #a7f3d0;">
            {{ session('success') }}
        </div>
    @endif

    <div style="overflow-x:auto;">
        <table style="width:100%; border-collapse: collapse; margin-top: 16px;">
            <thead>
                <tr style="background: #eff6ff; text-align: left;">
                    <th style="padding: 14px;">Nombre</th>
                    <th style="padding: 14px;">Categoría</th>
                    <th style="padding: 14px;">Tarea</th>
                    <th style="padding: 14px;">URL</th>
                    <th style="padding: 14px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($herramientas as $herramienta)
                    <tr style="border-top: 1px solid #e5e7eb;">
                        <td style="padding: 14px;">{{ $herramienta->nombre }}</td>
                        <td style="padding: 14px;">{{ $herramienta->categoria }}</td>
                        <td style="padding: 14px;">{{ $herramienta->tarea }}</td>
                        <td style="padding: 14px;"><a href="{{ $herramienta->url }}" target="_blank">{{ $herramienta->url }}</a></td>
                        <td style="padding: 14px;">
                            <a class="button secondary" href="{{ route('recomendaciones.show', $herramienta) }}">Ver</a>
                            <a class="button secondary" href="{{ route('recomendaciones.edit', $herramienta) }}">Editar</a>
                            <form action="{{ route('recomendaciones.destroy', $herramienta) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="button secondary" type="submit" style="margin-left: 8px;">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="padding: 14px;">No hay recomendaciones guardadas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
