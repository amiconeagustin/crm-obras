<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RubroSeeder extends Seeder
{
    /**
     * Ejecuta el seeder de rubros.
     *
     * @return void
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('rubros')->insert([
            [
                'rubroNombre'     => 'Trabajos preliminares',
                'rubroTimestamp'  => $now,
            ],
            [
                'rubroNombre'     => 'Movimientos de Tierra',
                'rubroTimestamp'  => $now,
            ],
            [
                'rubroNombre'     => 'Estructura de Hormigón Armado',
                'rubroTimestamp'  => $now,
            ],
            [
                'rubroNombre'     => 'Albañilería',
                'rubroTimestamp'  => $now,
            ],
            [
                'rubroNombre'     => 'Revoques',
                'rubroTimestamp'  => $now,
            ],
            [
                'rubroNombre'     => 'Contrapisos y Carpetas',
                'rubroTimestamp'  => $now,
            ],
            [
                'rubroNombre'     => 'Pisos',
                'rubroTimestamp'  => $now,
            ],
            [
                'rubroNombre'     => 'Cielorrasos',
                'rubroTimestamp'  => $now,
            ],
            [
                'rubroNombre'     => 'Zócalos',
                'rubroTimestamp'  => $now,
            ],
            [
                'rubroNombre'     => 'Revestimientos',
                'rubroTimestamp'  => $now,
            ],
            [
                'rubroNombre'     => 'Pintura',
                'rubroTimestamp'  => $now,
            ],
            [
                'rubroNombre'     => 'Carpintería',
                'rubroTimestamp'  => $now,
            ],
            [
                'rubroNombre'     => 'Mobiliario',
                'rubroTimestamp'  => $now,
            ],
            [
                'rubroNombre'     => 'Instalación Eléctrica',
                'rubroTimestamp'  => $now,
            ],
            [
                'rubroNombre'     => 'Instalación Sanitaria',
                'rubroTimestamp'  => $now,
            ],
            [
                'rubroNombre'     => 'Instalación de Gas',
                'rubroTimestamp'  => $now,
            ],
            [
                'rubroNombre'     => 'Ahorro Energético',
                'rubroTimestamp'  => $now,
            ],
            [
                'rubroNombre'     => 'Ayuda de Gremios',
                'rubroTimestamp'  => $now,
            ],
        ]);
    }
}
