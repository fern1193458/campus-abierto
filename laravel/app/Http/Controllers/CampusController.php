<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Herramienta;
use App\Models\HistorialRecomendacion;
use Illuminate\Http\Request;

class CampusController extends Controller
{
    public function home()
    {
        $estadisticas = [
            'documentos' => Documento::count(),
            'herramientas' => Herramienta::count(),
            'recomendaciones' => HistorialRecomendacion::count(),
        ];

        return view('home', compact('estadisticas'));
    }

    public function crearContenido()
    {
        return view('documentos.crear');
    }

    public function guardarContenido(Request $request)
    {
        $data = $request->validate([
            'tipo' => 'required|string',
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
        ]);

        $summary = $this->generarResumen($data['contenido']);
        $recomendaciones = $this->obtenerRecomendaciones($data['tipo']);

        return view('documentos.resultados', compact('data', 'summary', 'recomendaciones'));
    }

    public function recomendaciones()
    {
        $herramientas = [
            ['nombre' => 'Canva', 'categoria' => 'Presentaciones', 'descripcion' => 'Diseño rápido de diapositivas y plantillas.'],
            ['nombre' => 'CapCut', 'categoria' => 'Video', 'descripcion' => 'Edición sencilla de clips y presentaciones animadas.'],
            ['nombre' => 'Google Slides', 'categoria' => 'Presentaciones', 'descripcion' => 'Presentaciones colaborativas en la nube.'],
        ];

        return view('recomendaciones.index', compact('herramientas'));
    }

    public function historial()
    {
        $registros = [
            ['fecha' => '2026-04-07', 'usuario' => 'mariana', 'herramienta' => 'Canva', 'tipo' => 'presentación'],
            ['fecha' => '2026-04-06', 'usuario' => 'andres', 'herramienta' => 'CapCut', 'tipo' => 'video'],
            ['fecha' => '2026-04-05', 'usuario' => 'laura', 'herramienta' => 'Google Slides', 'tipo' => 'presentación'],
        ];

        return view('historial.index', compact('registros'));
    }

    private function generarResumen(string $texto): string
    {
        $partes = explode('. ', trim($texto));
        $fragmento = implode('. ', array_slice($partes, 0, 2));

        return $fragmento ? $fragmento . '.' : 'Resumen no disponible. Proporciona más contenido.';
    }

    private function obtenerRecomendaciones(string $tipo): array
    {
        if (str_contains(strtolower($tipo), 'presentaci')) {
            return [
                ['nombre' => 'Canva', 'razon' => 'Ideal para presentaciones rápidas con plantillas.'],
                ['nombre' => 'Google Slides', 'razon' => 'Perfecto para colaboración y visualización online.'],
            ];
        }

        if (str_contains(strtolower($tipo), 'video')) {
            return [
                ['nombre' => 'CapCut', 'razon' => 'Muy buena para editar videos cortos y material multimedia.'],
            ];
        }

        return [
            ['nombre' => 'Canva', 'razon' => 'Buena opción para recursos visuales y esquemas.'],
        ];
    }
}
