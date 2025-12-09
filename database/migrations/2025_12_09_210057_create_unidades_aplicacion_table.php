<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Crear tabla unidades_aplicacion
     */
    public function up(): void
    {
        Schema::create('unidades_aplicacion', function (Blueprint $table) {
            // PK con nombre del diagrama
            $table->id('unidadApId');

            // Nombre visible de la unidad (Metros, Metros lineales, Unidad, etc.)
            $table->string('unidadApNombre', 100);

            // Código corto de la unidad (m, ml, m2, u, etc.)
            $table->string('unidadApCodigo', 20)->nullable();

            // created_at y updated_at
            $table->timestamps();
        });
    }

    /**
     * Revertir cambios
     */
    public function down(): void
    {
        Schema::dropIfExists('unidades_aplicacion');
    }
};
