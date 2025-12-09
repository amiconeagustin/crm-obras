<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Crear tabla insumos_tipo
     */
    public function up(): void
    {
        Schema::create('insumos_tipo', function (Blueprint $table) {
            // PK con el nombre que definiste en el diagrama
            $table->id('tipoId');

            // Nombre del tipo de insumo (Material, Mano de Obra, Equipo, etc.)
            $table->string('tipoNombre', 100);

            // created_at y updated_at
            $table->timestamps();
        });
    }

    /**
     * Revertir cambios
     */
    public function down(): void
    {
        Schema::dropIfExists('insumos_tipo');
    }
};
