<?php

namespace App\Http\Controllers;

use App\Models\HistorialRecomendacion;
use App\Models\Herramienta;
use App\Models\Usuario;
use Illuminate\Http\Request;

class HistorialRecomendacionController extends Controller
{
    public function index()
    {
        $registros = HistorialRecomendacion::with(['usuario', 'herramienta'])
            ->orderBy('fecha_consulta', 'desc')
            ->get();

        return view('historial.index', compact('registros'));
    }

    public function create()
    {
        $usuarios = Usuario::orderBy('username')->get();
        $herramientas = Herramienta::orderBy('nombre')->get();

        return view('historial.create', compact('usuarios', 'herramientas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'herramienta_id' => 'required|exists:herramientas,id',
            'fecha_consulta' => 'nullable|date',
        ]);

        if (empty($data['fecha_consulta'])) {
            unset($data['fecha_consulta']);
        }

        HistorialRecomendacion::create($data);

        return redirect()->route('historial.index')->with('success', 'Registro creado correctamente.');
    }

    public function show(HistorialRecomendacion $historial)
    {
        return view('historial.show', compact('historial'));
    }

    public function edit(HistorialRecomendacion $historial)
    {
        $usuarios = Usuario::orderBy('username')->get();
        $herramientas = Herramienta::orderBy('nombre')->get();

        return view('historial.edit', compact('historial', 'usuarios', 'herramientas'));
    }

    public function update(Request $request, HistorialRecomendacion $historial)
    {
        $data = $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'herramienta_id' => 'required|exists:herramientas,id',
            'fecha_consulta' => 'nullable|date',
        ]);

        $historial->update($data);

        return redirect()->route('historial.index')->with('success', 'Registro actualizado correctamente.');
    }

    public function destroy(HistorialRecomendacion $historial)
    {
        $historial->delete();

        return redirect()->route('historial.index')->with('success', 'Registro eliminado correctamente.');
    }
}
