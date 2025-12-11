<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('INSUMOS', function (Blueprint $table) {
            // Nueva descripción del insumo
            $table->text('insumoDescripcion')->nullable()->after('insumoNombre');

            // Rendimiento numérico del insumo
            $table->decimal('insumoRendimientoValor', 10, 4)->nullable()->after('insumoDescripcion');

            // Unidad de aplicación del rendimiento (FK a UNIDADES_APLICACION)
            $table->unsignedBigInteger('insumoRendimientoUnAplicacionId')->nullable()->after('insumoRendimientoValor');

            // Estado del insumo (activo/inactivo)
            $table->unsignedBigInteger('insumoEstadoId')->default(1)->after('insumoRendimientoUnAplicacionId');

            // Si existen las tablas FK, se pueden activar:
            // $table->foreign('insumoRendimientoUnAplicacionId')->references('unidadApId')->on('UNIDADES_APLICACION');
            // $table->foreign('insumoEstadoId')->references('estadoId')->on('INSUMO_ESTADOS');
        });
    }

    public function down()
    {
        Schema::table('INSUMOS', function (Blueprint $table) {
            $table->dropColumn('insumoDescripcion');
            $table->dropColumn('insumoRendimientoValor');
            $table->dropColumn('insumoRendimientoUnAplicacionId');
            $table->dropColumn('insumoEstadoId');
        });
    }
};
