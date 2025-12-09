<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Crear tabla insumos (catálogo)
     */
    public function up(): void
    {
        Schema::create('insumos', function (Blueprint $table) {
            // PK con nombre del diagrama
            $table->id('insumoId');

            // Tipo de insumo (FK a insumos_tipo)
            $table->unsignedBigInteger('insumoTipoId');

            // Unidad de aplicación (FK a unidades_aplicacion)
            $table->unsignedBigInteger('insumoUnAplicacionId');

            // Nombre del insumo
            $table->string('insumoNombre', 150);

            // Unidad comercial (ej: "bolsa 50kg", "bolsón", "hora hombre")
            $table->string('insumoUnComercial', 100)->nullable();

            // Factor de conversión a la unidad estándar (ej: 0.088 m3 por bolsa)
            $table->decimal('insumoUnStandar', 12, 4)->nullable();

            // Precio por unidad comercial
            $table->decimal('insumoPrecioUnComercial', 15, 4)->nullable();

            // Fuente del precio (lista, proveedor, etc.)
            $table->string('insumoFuente', 150)->nullable();

            // created_at y updated_at
            $table->timestamps();

            // 🔗 Claves foráneas
            $table
                ->foreign('insumoTipoId')
                ->references('tipoId')
                ->on('insumos_tipo');

            $table
                ->foreign('insumoUnAplicacionId')
                ->references('unidadApId')
                ->on('unidades_aplicacion');
        });
    }

    /**
     * Revertir cambios
     */
    public function down(): void
    {
        Schema::table('insumos', function (Blueprint $table) {
            // Primero se eliminan las FKs para evitar errores al dropear la tabla
            $table->dropForeign(['insumoTipoId']);
            $table->dropForeign(['insumoUnAplicacionId']);
        });

        Schema::dropIfExists('insumos');
    }
};
