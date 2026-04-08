<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Usuario;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    public function index()
    {
        $documentos = Documento::with('usuario')->orderBy('fecha_creacion', 'desc')->get();

        return view('documentos.index', compact('documentos'));
    }

    public function create()
    {
        $usuarios = Usuario::orderBy('username')->get();

        return view('documentos.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'tipo' => 'required|string|max:50',
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
        ]);

        Documento::create($data);

        return redirect()->route('documentos.index')->with('success', 'Documento creado correctamente.');
    }

    public function show(Documento $documento)
    {
        return view('documentos.show', compact('documento'));
    }

    public function edit(Documento $documento)
    {
        $usuarios = Usuario::orderBy('username')->get();

        return view('documentos.edit', compact('documento', 'usuarios'));
    }

    public function update(Request $request, Documento $documento)
    {
        $data = $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'tipo' => 'required|string|max:50',
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
        ]);

        $documento->update($data);

        return redirect()->route('documentos.index')->with('success', 'Documento actualizado correctamente.');
    }

    public function destroy(Documento $documento)
    {
        $documento->delete();

        return redirect()->route('documentos.index')->with('success', 'Documento eliminado correctamente.');
    }
}
