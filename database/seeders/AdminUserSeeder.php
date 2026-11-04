<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use RuntimeException;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $usuarios = [
            'admin@proyectoiv.test' => 'Administrador Proyecto IV',
            'asesor@inteoffice.test' => 'Sergio Ulises Lillingston Pérez',
            'eduardo@inteoffice.test' => 'Eduardo Serrano Barajas',
            'edson@inteoffice.test' => 'Edson Missael López Carbajal',
            'emmanuel@inteoffice.test' => 'Sergio Emmanuel Guerra Ramírez',
        ];

        foreach ($usuarios as $correo => $nombre) {
            $usuario = User::where('email', $correo)->first();

            if ($usuario) {
                // Conservar la contraseña existente.
                $usuario->rol = 'administrador';
                $usuario->save();

                continue;
            }

            // Una contraseña inicial diferente para cada cuenta.
            $variable = match ($correo) {
                'admin@proyectoiv.test' => 'ADMIN_INITIAL_PASSWORD',
                'asesor@inteoffice.test' => 'ASESOR_INITIAL_PASSWORD',
                'eduardo@inteoffice.test' => 'EDUARDO_INITIAL_PASSWORD',
                'edson@inteoffice.test' => 'EDSON_INITIAL_PASSWORD',
                'emmanuel@inteoffice.test' => 'EMMANUEL_INITIAL_PASSWORD',
            };

            $password = env($variable);

            if (!is_string($password) || strlen($password) < 12) {
                throw new RuntimeException(
                    "Falta configurar una contraseña segura: {$variable}"
                );
            }

            $usuario = new User();

$usuario->name = $nombre;
$usuario->email = $correo;
$usuario->password = Hash::make($password);
$usuario->rol = 'administrador';
$usuario->email_verified_at = now();

$usuario->save();
        }
    }
}
