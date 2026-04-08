@extends('layouts.app')

@section('content')
<div class="card">
    <h1>Documentos</h1>
    <p>Lista de documentos guardados en el sistema con opciones para ver, editar o eliminar.</p>

    <a class="button" href="{{ route('documentos.create') }}" style="margin-bottom: 20px;">Nuevo documento</a>

    @if(session('success'))
        <div class="card" style="background: #ecfdf5; color: #065f46; border: 1px solid #a7f3d0;">
            {{ session('success') }}
        </div>
    @endif

    <div style="overflow-x:auto;">
        <table style="width:100%; border-collapse: collapse; margin-top: 16px;">
            <thead>
                <tr style="background: #eff6ff; text-align: left;">
                    <th style="padding: 14px;">Título</th>
                    <th style="padding: 14px;">Tipo</th>
                    <th style="padding: 14px;">Usuario</th>
                    <th style="padding: 14px;">Fecha</th>
                    <th style="padding: 14px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($documentos as $documento)
                    <tr style="border-top: 1px solid #e5e7eb;">
                        <td style="padding: 14px;">{{ $documento->titulo }}</td>
                        <td style="padding: 14px;">{{ ucfirst($documento->tipo) }}</td>
                        <td style="padding: 14px;">{{ $documento->usuario?->username ?? 'Sin usuario' }}</td>
                        <td style="padding: 14px;">{{ $documento->fecha_creacion }}</td>
                        <td style="padding: 14px;">
                            <a class="button secondary" href="{{ route('documentos.show', $documento) }}">Ver</a>
                            <a class="button secondary" href="{{ route('documentos.edit', $documento) }}">Editar</a>
                            <form action="{{ route('documentos.destroy', $documento) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="button secondary" type="submit" style="margin-left: 8px;">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="padding: 14px;">No hay documentos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
