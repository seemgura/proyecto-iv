<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductoController extends Controller
{
    /**
     * Mostrar todos los productos.
     */
    public function index()
    {
        $productos = Producto::latest()->paginate(10);

        return view('productos.index', compact('productos'));
    }

    /**
     * Mostrar formulario para crear un producto.
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Guardar un nuevo producto.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'categoria' => ['required', 'string', 'max:255'],
            'descripcion' => ['nullable', 'string'],
            'precio' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'imagen' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'destacado' => ['nullable', 'boolean'],
            'activo' => ['nullable', 'boolean'],
        ]);

        $datos['slug'] = $this->crearSlugUnico($datos['nombre']);
        $datos['destacado'] = $request->boolean('destacado');
        $datos['activo'] = $request->boolean('activo');

        if ($request->hasFile('imagen')) {
            $datos['imagen'] = $request->file('imagen')->store(
                'productos',
                'public'
            );
        }

        Producto::create($datos);

        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto creado correctamente.');
    }

    /**
     * Mostrar un producto.
     */
    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    /**
     * Mostrar formulario para editar un producto.
     */
    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    /**
     * Actualizar un producto.
     */
    public function update(Request $request, Producto $producto)
    {
        $datos = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'categoria' => ['required', 'string', 'max:255'],
            'descripcion' => ['nullable', 'string'],
            'precio' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'imagen' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'destacado' => ['nullable', 'boolean'],
            'activo' => ['nullable', 'boolean'],
        ]);

        if ($producto->nombre !== $datos['nombre']) {
            $datos['slug'] = $this->crearSlugUnico(
                $datos['nombre'],
                $producto->id
            );
        }

        $datos['destacado'] = $request->boolean('destacado');
        $datos['activo'] = $request->boolean('activo');

        if ($request->hasFile('imagen')) {
            if ($producto->imagen) {
                Storage::disk('public')->delete($producto->imagen);
            }

            $datos['imagen'] = $request->file('imagen')->store(
                'productos',
                'public'
            );
        }

        $producto->update($datos);

        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto actualizado correctamente.');
    }

    /**
     * Eliminar un producto.
     */
    public function destroy(Producto $producto)
    {
        if ($producto->imagen) {
            Storage::disk('public')->delete($producto->imagen);
        }

        $producto->delete();

        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto eliminado correctamente.');
    }

    /**
     * Generar un slug único para cada producto.
     */
    private function crearSlugUnico(string $nombre, ?int $ignorarId = null): string
    {
        $slugBase = Str::slug($nombre);
        $slug = $slugBase;
        $contador = 2;

        while (
            Producto::where('slug', $slug)
                ->when(
                    $ignorarId,
                    fn ($query) => $query->where('id', '!=', $ignorarId)
                )
                ->exists()
        ) {
            $slug = $slugBase . '-' . $contador;
            $contador++;
        }

        return $slug;
    }
}