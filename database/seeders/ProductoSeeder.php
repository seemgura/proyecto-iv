<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Producto::updateOrCreate(
            ['slug' => 'mesa-forma-01'],
            [
                'nombre' => 'Mesa Forma 01',
                'categoria' => 'Escritorios',
                'descripcion' => 'Escritorio contemporáneo de líneas limpias y proporciones equilibradas, diseñado para espacios de trabajo modernos. Su acabado en madera aporta calidez y una estética atemporal que se integra fácilmente en oficinas y estudios.',
                'precio' => 12900.00,
                'stock' => 8,
                'imagen' => 'images/productos/mesa-forma-01.png',
                'destacado' => true,
                'activo' => true,
            ]
        );
    }
}