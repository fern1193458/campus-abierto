<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('historial_recomendaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('usuarios')->cascadeOnDelete();
            $table->foreignId('herramienta_id')->constrained('herramientas')->cascadeOnDelete();
            $table->timestamp('fecha_consulta')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('historial_recomendaciones');
    }
};
