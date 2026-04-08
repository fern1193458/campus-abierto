<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialRecomendacion extends Model
{
    use HasFactory;

    protected $table = 'historial_recomendaciones';
    public $timestamps = false;

    protected $fillable = [
        'usuario_id',
        'herramienta_id',
        'fecha_consulta',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function herramienta()
    {
        return $this->belongsTo(Herramienta::class, 'herramienta_id');
    }
}
