<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('herramientas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->text('descripcion')->nullable();
            $table->string('categoria', 50)->nullable();
            $table->string('url', 255)->nullable();
            $table->string('tarea', 100)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('herramientas');
    }
};
