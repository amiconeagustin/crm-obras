<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UsuarioEstado;

class UsuarioEstadoSeeder extends Seeder
{
    public function run(): void
    {
        UsuarioEstado::insert([
            ['estadoNombre' => 'Activo'],
            ['estadoNombre' => 'Eliminado'],
        ]);
    }
}
