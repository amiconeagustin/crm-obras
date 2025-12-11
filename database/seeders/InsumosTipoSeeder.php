<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsumosTipoSeeder extends Seeder
{
    /**
     * Ejecutar el seeder para la tabla INSUMOS_TIPO.
     */
    public function run()
    {
        DB::table('INSUMOS_TIPO')->insert([
            [
                'tipoNombre' => 'Materiales',
            ],
            [
                'tipoNombre' => 'Mano de Obra',
            ],
            [
                'tipoNombre' => 'Equipos',
            ],
        ]);
    }
}
