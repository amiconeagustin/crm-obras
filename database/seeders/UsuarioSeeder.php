<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Usuario admin por defecto
        Usuario::firstOrCreate(
            [
                // Condición de búsqueda: si ya existe con este correo, NO lo duplica
                'usuarioCorreo' => 'admin@crm-obras.test',
            ],
            [
                // Estos campos se usan solo si NO existe y se crea uno nuevo
                'usuarioApodo'   => 'admin',
                'usuarioNombre'  => 'Administrador',
                'usuarioApellido'=> 'Sistema',
                'usuarioClave'   => Hash::make('admin123'), // o la clave que estés usando
                'usuarioCel'     => '1122334455',
                'usuarioTel'     => '2214455667',
                'usuarioRolId'   => 1,
                'usuarioTipoId'  => 1,
                'usuarioEstadoId'=> 1,
                'usuarioFechaAlta'       => now(),
                'usuarioFechaNacimiento' => '1990-01-01',
            ]
        );
    }
}
