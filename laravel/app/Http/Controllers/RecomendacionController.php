<?php

namespace App\Http\Controllers;

use App\Models\Herramienta;
use Illuminate\Http\Request;

class RecomendacionController extends Controller
{
    public function index()
    {
        $herramientas = Herramienta::orderBy('nombre')->get();

        return view('recomendaciones.index', compact('herramientas'));
    }

    public function create()
    {
        return view('recomendaciones.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'categoria' => 'nullable|string|max:50',
            'url' => 'nullable|url|max:255',
            'tarea' => 'nullable|string|max:100',
        ]);

        Herramienta::create($data);

        return redirect()->route('recomendaciones.index')->with('success', 'Herramienta agregada correctamente.');
    }

    public function show(Herramienta $recomendacion)
    {
        return view('recomendaciones.show', ['herramienta' => $recomendacion]);
    }

    public function edit(Herramienta $recomendacion)
    {
        return view('recomendaciones.edit', ['herramienta' => $recomendacion]);
    }

    public function update(Request $request, Herramienta $recomendacion)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'categoria' => 'nullable|string|max:50',
            'url' => 'nullable|url|max:255',
            'tarea' => 'nullable|string|max:100',
        ]);

        $recomendacion->update($data);

        return redirect()->route('recomendaciones.index')->with('success', 'Herramienta actualizada correctamente.');
    }

    public function destroy(Herramienta $recomendacion)
    {
        $recomendacion->delete();

        return redirect()->route('recomendaciones.index')->with('success', 'Herramienta eliminada correctamente.');
    }
}
