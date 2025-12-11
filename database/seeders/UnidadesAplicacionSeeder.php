<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnidadesAplicacionSeeder extends Seeder
{
    /**
     * Cargar unidades de aplicación básicas para construcción.
     */
    public function run()
    {
        DB::table('UNIDADES_APLICACION')->insert([
            // PESO
            [
                'unidadApNombre' => 'Kilogramo',
                'unidadApCodigo' => 'kg',
            ],
            [
                'unidadApNombre' => 'Gramo',
                'unidadApCodigo' => 'g',
            ],
            [
                'unidadApNombre' => 'Tonelada',
                'unidadApCodigo' => 'tn',
            ],

            // LONGITUD
            [
                'unidadApNombre' => 'Milímetro',
                'unidadApCodigo' => 'mm',
            ],
            [
                'unidadApNombre' => 'Centímetro',
                'unidadApCodigo' => 'cm',
            ],
            [
                'unidadApNombre' => 'Metro',
                'unidadApCodigo' => 'm',
            ],
            [
                'unidadApNombre' => 'Metro lineal',
                'unidadApCodigo' => 'ML',
            ],

            // SUPERFICIE
            [
                'unidadApNombre' => 'Metro cuadrado',
                'unidadApCodigo' => 'm²', // superíndice 2
            ],
            [
                'unidadApNombre' => 'Centímetro cuadrado',
                'unidadApCodigo' => 'cm²',
            ],

            // VOLUMEN
            [
                'unidadApNombre' => 'Metro cúbico',
                'unidadApCodigo' => 'm³', // superíndice 3
            ],
            [
                'unidadApNombre' => 'Litro',
                'unidadApCodigo' => 'L',
            ],
            [
                'unidadApNombre' => 'Mililitro',
                'unidadApCodigo' => 'ml',
            ],

            // UNIDADES GENÉRICAS
            [
                'unidadApNombre' => 'Global',
                'unidadApCodigo' => 'Gl',
            ],
            [
                'unidadApNombre' => 'Unidad',
                'unidadApCodigo' => 'u',
            ],
            [
                'unidadApNombre' => 'Bolsa',
                'unidadApCodigo' => 'bol',
            ],
            [
                'unidadApNombre' => 'Caja',
                'unidadApCodigo' => 'cj',
            ],
            [
                'unidadApNombre' => 'Placa',
                'unidadApCodigo' => 'pl',
            ],
            [
                'unidadApNombre' => 'Módulo',
                'unidadApCodigo' => 'mod',
            ],
            [
                'unidadApNombre' => 'Par',
                'unidadApCodigo' => 'par',
            ],
            [
                'unidadApNombre' => 'Juego',
                'unidadApCodigo' => 'jgo',
            ],
            [
                'unidadApNombre' => 'Rollo',
                'unidadApCodigo' => 'rll',
            ],

            // TIEMPO (para mano de obra / equipos)
            [
                'unidadApNombre' => 'Hora',
                'unidadApCodigo' => 'h',
            ],
            [
                'unidadApNombre' => 'Jornada',
                'unidadApCodigo' => 'jor',
            ],
            [
                'unidadApNombre' => 'Día',
                'unidadApCodigo' => 'd',
            ],
            [
                'unidadApNombre' => 'Semana',
                'unidadApCodigo' => 'sem',
            ],
            [
                'unidadApNombre' => 'Mes',
                'unidadApCodigo' => 'mes',
            ],
        ]);
    }
}
