<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CarritoController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Mostrar carrito de compras
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $carrito = $request->session()->get('carrito', []);

        $productos = array_values($carrito);

        foreach ($productos as &$item) {
            $producto = Producto::find($item['producto_id']);

            $item['stock_disponible'] = $producto && $producto->activo
                ? (int) $producto->stock
                : 0;
        }

        unset($item);

        return view('carrito.index', [
            'productos' => $productos,
            'total' => $this->calcularTotal($carrito),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Agregar producto al carrito
    |--------------------------------------------------------------------------
    */

    public function agregar(Request $request)
    {
        $datos = $request->validate([
            'producto_id' => ['required', 'integer', 'exists:productos,id'],
            'cantidad' => ['required', 'integer', 'min:1'],
        ]);

        $producto = Producto::findOrFail($datos['producto_id']);

        if (!$producto->activo) {
            throw ValidationException::withMessages([
                'producto_id' => 'Este producto no está disponible para la venta.',
            ]);
        }

        $carrito = $request->session()->get('carrito', []);
        $id = (string) $producto->id;

        $cantidadActual = $carrito[$id]['cantidad'] ?? 0;
        $nuevaCantidad = $cantidadActual + $datos['cantidad'];

        if ($nuevaCantidad > $producto->stock) {
            throw ValidationException::withMessages([
                'cantidad' => 'No hay suficientes unidades disponibles.',
            ]);
        }

        $carrito[$id] = [
            'producto_id' => $producto->id,
            'nombre' => $producto->nombre,
            'precio' => $producto->precio,
            'cantidad' => $nuevaCantidad,
        ];

        $request->session()->put('carrito', $carrito);

        if (! $request->expectsJson()) {
    return redirect()
        ->route('carrito.index')
        ->with('success', 'Producto agregado al carrito.');
}

        return response()->json([
            'mensaje' => 'Producto agregado al carrito.',
            'productos' => array_values($carrito),
            'total' => $this->calcularTotal($carrito),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Actualizar cantidad de producto
    |--------------------------------------------------------------------------
    */

    public function actualizar(Request $request, int $productoId)
    {
        $datos = $request->validate([
            'cantidad' => ['required', 'integer', 'min:1'],
        ]);

        $carrito = $request->session()->get('carrito', []);
        $id = (string) $productoId;

        if (!isset($carrito[$id])) {
            return response()->json([
                'mensaje' => 'El producto no está en el carrito.',
            ], 404);
        }

        $producto = Producto::findOrFail($productoId);

        if (!$producto->activo) {
            throw ValidationException::withMessages([
                'producto_id' => 'Este producto no está disponible para la venta.',
            ]);
        }

        if ($datos['cantidad'] > $producto->stock) {
            throw ValidationException::withMessages([
                'cantidad' => 'No hay suficientes unidades disponibles.',
            ]);
        }

        $carrito[$id]['cantidad'] = $datos['cantidad'];
        $carrito[$id]['precio'] = $producto->precio;

        $request->session()->put('carrito', $carrito);

        return response()->json([
            'mensaje' => 'Cantidad actualizada.',
            'productos' => array_values($carrito),
            'total' => $this->calcularTotal($carrito),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Eliminar producto del carrito
    |--------------------------------------------------------------------------
    */

    public function eliminar(Request $request, int $productoId)
    {
        $carrito = $request->session()->get('carrito', []);

        unset($carrito[(string) $productoId]);

        $request->session()->put('carrito', $carrito);

        return response()->json([
            'mensaje' => 'Producto eliminado del carrito.',
            'productos' => array_values($carrito),
            'total' => $this->calcularTotal($carrito),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Calcular total del carrito
    |--------------------------------------------------------------------------
    */

    private function calcularTotal(array $carrito): string
    {
        $total = '0.00';

        foreach ($carrito as $item) {
            $subtotal = bcmul(
                (string) $item['precio'],
                (string) $item['cantidad'],
                2
            );

            $total = bcadd($total, $subtotal, 2);
        }

        return $total;
    }
}
