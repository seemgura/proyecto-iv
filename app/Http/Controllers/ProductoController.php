<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductoController extends Controller
{
    
/**
 * Mostrar el catálogo de productos.
 * Permite filtrar por categoría.
 */
public function index(Request $request)
{
    $esAdministrador = auth()->user()?->esAdministrador() ?? false;

    $categorias = [
        'escritorios',
        'sillas',
        'almacenamiento',
        'iluminacion',
        'accesorios',
    ];

    $categoria = $request->query('categoria');

    $categoria = is_string($categoria)
        && in_array($categoria, $categorias, true)
            ? $categoria
            : null;

    $productos = Producto::query()
        ->when(
            !$esAdministrador,
            fn ($query) => $query->where('activo', true)
        )
        ->when(
            $categoria,
            fn ($query) => $query->where('categoria', $categoria)
        )
        ->latest()
        ->paginate(10)
        ->withQueryString();

    return view('productos.index', compact(
        'productos',
        'esAdministrador',
        'categoria',
        'categorias'
    ));
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
    $promedioValoracion = $producto->valoraciones()->avg('puntuacion');
    $totalValoraciones = $producto->valoraciones()->count();

    return view('productos.show', compact(
        'producto',
        'promedioValoracion',
        'totalValoraciones'
    ));
}

    /**
     * Guardar la valoración de un producto.
     */
    public function valorar(Request $request, Producto $producto)
    {
        $datos = $request->validate([
            'puntuacion' => ['required', 'integer', 'between:1,5'],
        ]);

        $producto->valoraciones()->create([
            'puntuacion' => $datos['puntuacion'],
        ]);

        return redirect()
            ->route('productos.show', $producto)
            ->with('success', 'Gracias por tu valoración.');
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