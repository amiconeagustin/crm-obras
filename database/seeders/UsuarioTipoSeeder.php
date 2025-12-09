<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UsuarioTipo;

class UsuarioTipoSeeder extends Seeder
{
    public function run(): void
    {
        UsuarioTipo::insert([
            ['tipoNombre' => 'Interno'],
            ['tipoNombre' => 'Cliente'],
            ['tipoNombre' => 'Proveedor'],
        ]);
    }
}
