<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        $productos = [
            // ESCRITORIOS
            [
                'nombre' => 'Mesa Forma 01',
                'categoria' => 'escritorios',
                'descripcion' => 'Escritorio contemporáneo de líneas limpias y proporciones equilibradas, diseñado para espacios de trabajo modernos. Su acabado en madera aporta calidez y una estética atemporal.',
                'precio' => 12900.00,
                'stock' => 8,
                'imagen' => 'images/productos/mesa-forma-01.webp',
                'destacado' => true,
            ],
            [
                'nombre' => 'Escritorio Nórdico 02',
                'categoria' => 'escritorios',
                'descripcion' => 'Escritorio minimalista con cubierta de madera clara y estructura metálica. Ideal para oficinas domésticas y espacios compactos.',
                'precio' => 8490.00,
                'stock' => 12,
                'imagen' => 'images/productos/escritorio-nordico-02.webp',
            ],
            [
                'nombre' => 'Escritorio Ejecutivo 03',
                'categoria' => 'escritorios',
                'descripcion' => 'Escritorio ejecutivo de superficie amplia con acabado nogal y detalles negros. Diseñado para espacios profesionales.',
                'precio' => 18900.00,
                'stock' => 6,
                'imagen' => 'images/productos/escritorio-ejecutivo-03.webp',
            ],
            [
                'nombre' => 'Escritorio Elevable 04',
                'categoria' => 'escritorios',
                'descripcion' => 'Escritorio de altura ajustable con cubierta resistente y estructura metálica, adaptable al trabajo sentado o de pie.',
                'precio' => 15490.00,
                'stock' => 9,
                'imagen' => 'images/productos/escritorio-elevable-04.webp',
            ],

            // SILLAS
            [
                'nombre' => 'Silla Ejecutiva 01',
                'categoria' => 'sillas',
                'descripcion' => 'Silla ejecutiva tapizada con respaldo alto y acabados elegantes para jornadas de trabajo.',
                'precio' => 7990.00,
                'stock' => 10,
                'imagen' => 'images/productos/silla-ejecutiva-01.webp',
            ],
            [
                'nombre' => 'Silla Ergonómica 02',
                'categoria' => 'sillas',
                'descripcion' => 'Silla ergonómica con respaldo de malla transpirable y ajustes para mayor comodidad.',
                'precio' => 6490.00,
                'stock' => 15,
                'imagen' => 'images/productos/silla-ergonomica-02.webp',
            ],
            [
                'nombre' => 'Silla de Visita 03',
                'categoria' => 'sillas',
                'descripcion' => 'Silla de visita de diseño contemporáneo, con asiento acolchado y estructura resistente.',
                'precio' => 3490.00,
                'stock' => 18,
                'imagen' => 'images/productos/silla-visita-03.webp',
            ],
            [
                'nombre' => 'Silla Giratoria 04',
                'categoria' => 'sillas',
                'descripcion' => 'Silla giratoria compacta con base de cinco apoyos, ideal para estaciones de trabajo modernas.',
                'precio' => 4890.00,
                'stock' => 14,
                'imagen' => 'images/productos/silla-giratoria-04.webp',
            ],

            // ALMACENAMIENTO
            [
                'nombre' => 'Credenza Nogal 01',
                'categoria' => 'almacenamiento',
                'descripcion' => 'Credenza de acabado nogal con compartimentos cerrados para organizar documentos y materiales.',
                'precio' => 11900.00,
                'stock' => 7,
                'imagen' => 'images/productos/credenza-nogal-01.webp',
            ],
            [
                'nombre' => 'Librero Modular 02',
                'categoria' => 'almacenamiento',
                'descripcion' => 'Librero modular de líneas rectas con entrepaños para libros, carpetas y objetos decorativos.',
                'precio' => 8990.00,
                'stock' => 11,
                'imagen' => 'images/productos/librero-modular-02.webp',
            ],
            [
                'nombre' => 'Archivero Ejecutivo 03',
                'categoria' => 'almacenamiento',
                'descripcion' => 'Archivero de cajones con diseño funcional para almacenar documentación de oficina.',
                'precio' => 5490.00,
                'stock' => 13,
                'imagen' => 'images/productos/archivero-ejecutivo-03.webp',
            ],
            [
                'nombre' => 'Gabinete Bajo 04',
                'categoria' => 'almacenamiento',
                'descripcion' => 'Gabinete bajo de puertas discretas y acabado neutro para complementar estaciones de trabajo.',
                'precio' => 6990.00,
                'stock' => 8,
                'imagen' => 'images/productos/gabinete-bajo-04.webp',
            ],

            // ILUMINACIÓN
            [
                'nombre' => 'Lámpara Lineal 01',
                'categoria' => 'iluminacion',
                'descripcion' => 'Lámpara de escritorio de perfil delgado y luz dirigida para tareas de precisión.',
                'precio' => 2490.00,
                'stock' => 20,
                'imagen' => 'images/productos/lampara-lineal-01.webp',
            ],
            [
                'nombre' => 'Lámpara Articulada 02',
                'categoria' => 'iluminacion',
                'descripcion' => 'Lámpara articulada de acabado negro mate que permite orientar la iluminación.',
                'precio' => 3190.00,
                'stock' => 16,
                'imagen' => 'images/productos/lampara-articulada-02.webp',
            ],
            [
                'nombre' => 'Lámpara de Mesa 03',
                'categoria' => 'iluminacion',
                'descripcion' => 'Lámpara de mesa decorativa de silueta minimalista y luz ambiental cálida.',
                'precio' => 2890.00,
                'stock' => 12,
                'imagen' => 'images/productos/lampara-mesa-03.webp',
            ],
            [
                'nombre' => 'Luminaria LED 04',
                'categoria' => 'iluminacion',
                'descripcion' => 'Luminaria LED compacta para complementar espacios de trabajo contemporáneos.',
                'precio' => 1990.00,
                'stock' => 22,
                'imagen' => 'images/productos/luminaria-led-04.webp',
            ],

            // ACCESORIOS
            [
                'nombre' => 'Organizador Nogal 01',
                'categoria' => 'accesorios',
                'descripcion' => 'Organizador de escritorio en acabado nogal para mantener accesorios y materiales al alcance.',
                'precio' => 1290.00,
                'stock' => 25,
                'imagen' => 'images/productos/organizador-nogal-01.webp',
            ],
            [
                'nombre' => 'Soporte para Monitor 02',
                'categoria' => 'accesorios',
                'descripcion' => 'Soporte de escritorio para elevar el monitor y aprovechar el espacio inferior.',
                'precio' => 1890.00,
                'stock' => 19,
                'imagen' => 'images/productos/soporte-monitor-02.webp',
            ],
            [
                'nombre' => 'Bandeja de Escritorio 03',
                'categoria' => 'accesorios',
                'descripcion' => 'Bandeja organizadora de diseño sobrio para documentos y artículos de oficina.',
                'precio' => 890.00,
                'stock' => 30,
                'imagen' => 'images/productos/bandeja-escritorio-03.webp',
            ],
            [
                'nombre' => 'Portalápices 04',
                'categoria' => 'accesorios',
                'descripcion' => 'Portalápices minimalista de acabado mate para escritorios contemporáneos.',
                'precio' => 590.00,
                'stock' => 35,
                'imagen' => 'images/productos/portalapices-04.webp',
            ],
        ];

        foreach ($productos as $datos) {
            $slug = Str::slug($datos['nombre']);

            $producto = Producto::firstOrNew(['slug' => $slug]);

            // Los productos existentes conservan sus datos.
            if ($producto->exists) {
                continue;
            }

            $producto->fill([
                ...$datos,
                'slug' => $slug,
                'destacado' => $datos['destacado'] ?? false,
                'activo' => true,
            ]);

            $producto->save();
        }
    }
}
