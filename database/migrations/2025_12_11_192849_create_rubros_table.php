<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta las migraciones.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('rubros', function (Blueprint $table) {
            // ID autoincremental con nombre personalizado
            $table->id('rubroId');

            // Nombre del rubro (ej: Albañilería, Pintura, etc.)
            $table->string('rubroNombre', 255);

            // Timestamp propio del rubro (por defecto fecha y hora actual)
            $table->timestamp('rubroTimestamp')->useCurrent();
        });
    }

    /**
     * Revierte las migraciones.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('rubros');
    }
};
