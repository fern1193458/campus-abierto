<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Herramienta extends Model
{
    use HasFactory;

    protected $table = 'herramientas';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'categoria',
        'url',
        'tarea',
    ];

    public function historialRecomendaciones()
    {
        return $this->hasMany(HistorialRecomendacion::class, 'herramienta_id');
    }
}
