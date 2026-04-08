<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';
    public $timestamps = false;

    protected $fillable = [
        'username',
        'password',
        'email',
        'perfil',
        'fecha_creacion',
    ];

    public function documentos()
    {
        return $this->hasMany(Documento::class, 'usuario_id');
    }

    public function historialRecomendaciones()
    {
        return $this->hasMany(HistorialRecomendacion::class, 'usuario_id');
    }
}
