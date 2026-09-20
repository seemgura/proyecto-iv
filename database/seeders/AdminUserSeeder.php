<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $usuarios = [
            [
                'name' => 'Administrador Proyecto IV',
                'email' => 'admin@proyectoiv.test',
                'password' => 'password',
            ],
            [
                'name' => 'Sergio Ulises Lillingston Peréz',
                'email' => 'asesor@inteoffice.test',
                'password' => 'password',
            ],
            [
                'name' => 'Eduardo Serrano Barajas',
                'email' => 'eduardo@inteoffice.test',
                'password' => 'password',
            ],
            [
                'name' => 'Edson Missael López Carbajal',
                'email' => 'edson@inteoffice.test',
                'password' => 'password',
            ],
            [
                'name' => 'Sergio Emmanuel Guerra Ramírez',
                'email' => 'emmanuel@inteoffice.test',
                'password' => 'password',
            ],
        ];

        foreach ($usuarios as $usuario) {
            User::updateOrCreate(
                ['email' => $usuario['email']],
                [
                    'name' => $usuario['name'],
                    'password' => Hash::make($usuario['password']),
                ]
            );
        }
    }
}