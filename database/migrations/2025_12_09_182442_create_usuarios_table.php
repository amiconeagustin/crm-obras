<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('usuarioId');

            // Datos básicos
            $table->string('usuarioApodo', 100)->nullable();
            $table->string('usuarioNombre', 100);
            $table->string('usuarioApellido', 100);
            $table->string('usuarioCorreo', 150)->unique();
            $table->string('usuarioClave', 255); // hash de contraseña
            $table->string('usuarioTel', 30)->nullable();
            $table->string('usuarioCel', 30)->nullable();

            // Relaciones
            $table->unsignedBigInteger('usuarioTipoId');
            $table->unsignedBigInteger('usuarioRolId');
            $table->unsignedBigInteger('usuarioEstadoId');

            // Fechas
            $table->date('usuarioFechaAlta')->nullable();
            $table->date('usuarioFechaNacimiento')->nullable();

            // FK
            $table->foreign('usuarioTipoId')->references('tipoId')->on('usuarios_tipo');
            $table->foreign('usuarioRolId')->references('rolId')->on('rol');
            $table->foreign('usuarioEstadoId')->references('estadoId')->on('usuario_estado');

            $table->timestamps(); // usuarioTimestamp
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
