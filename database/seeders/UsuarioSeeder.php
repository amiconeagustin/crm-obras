<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuarios')->insert([
            'usuarioApodo'          => 'admin',
            'usuarioNombre'         => 'Administrador',
            'usuarioApellido'       => 'Sistema',
            'usuarioCorreo'         => 'admin@crm-obras.test',
            'usuarioClave'          => Hash::make('admin123'),
            'usuarioCel'            => '1122334455',
            'usuarioTel'            => '2214455667',
            'usuarioRolId'          => 1,    // Rol: 1 = Activo (según tu tabla rol)
            'usuarioTipoId'         => 1,    // Tipo 1 = Interno
            'usuarioEstadoId'       => 1,    // Estado 1 = Activo
            'usuarioFechaAlta'      => now(),
            'usuarioFechaNacimiento'=> '1990-01-01',
        ]);
    }
}
