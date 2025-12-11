<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosSeeder extends Seeder
{
    public function run()
    {
        DB::table('ESTADOS')->insert([
            [
                'estadoId' => 1,
                'estadoNombre' => 'Activo',
            ],
            [
                'estadoId' => 2,
                'estadoNombre' => 'Inactivo',
            ],
            [
                'estadoId' => 3,
                'estadoNombre' => 'Archivado',
            ],
            [
                'estadoId' => 4,
                'estadoNombre' => 'Eliminado',
            ]
        ]);
    }
}
