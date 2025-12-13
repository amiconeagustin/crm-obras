<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->bigIncrements('estadoId');
            $table->string('estadoNombre', 50);
            $table->timestamp('estadoTimestamp')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ESTADOS');
    }
};
