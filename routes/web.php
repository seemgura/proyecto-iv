
<?php

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Página pública
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $productosDestacados = \App\Models\Producto::where('activo', true)
        ->where('destacado', true)
        ->latest()
        ->take(3)
        ->get();

    return view('welcome', compact('productosDestacados'));
});

Route::get('/nosotros', function () {
    return view('institucional.nosotros');
})->name('nosotros');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

/*
|--------------------------------------------------------------------------
| Productos públicos
|--------------------------------------------------------------------------
|
| Los visitantes pueden consultar el catálogo, abrir la ficha de un
| producto y registrar una valoración sin iniciar sesión.
|
*/

Route::get('/productos', [ProductoController::class, 'index'])
    ->name('productos.index');

Route::get('/productos/{producto}', [ProductoController::class, 'show'])
    ->name('productos.show');

Route::post('/productos/{producto}/valorar', [ProductoController::class, 'valorar'])
    ->name('productos.valorar');

/*
|--------------------------------------------------------------------------
| Carrito de compras
|--------------------------------------------------------------------------
|
| El carrito es público y almacena los productos en la sesión.
|
*/

Route::get('/carrito', [CarritoController::class, 'index'])
    ->name('carrito.index');

Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])
    ->name('carrito.agregar');

Route::patch('/carrito/{productoId}', [CarritoController::class, 'actualizar'])
    ->name('carrito.actualizar');

Route::delete('/carrito/{productoId}', [CarritoController::class, 'eliminar'])
    ->name('carrito.eliminar');

/*
|--------------------------------------------------------------------------
| Panel administrativo
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    $totalProductos = \App\Models\Producto::count();
    $totalPedidos = \App\Models\Pedido::count();
    $totalUsuarios = \App\Models\User::count();

    return view('dashboard', compact(
        'totalProductos',
        'totalPedidos',
        'totalUsuarios'
    ));
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Rutas protegidas
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Productos
    |--------------------------------------------------------------------------
    |
    | La consulta del catálogo y de cada producto es pública.
    | Crear, editar, actualizar y eliminar requieren autenticación.
    |
    */

    Route::resource('productos', ProductoController::class)
    ->except(['index', 'show'])
    ->middleware('administrador');

    /*
    |--------------------------------------------------------------------------
    | Pedidos
    |--------------------------------------------------------------------------
    */

    Route::resource('pedidos', PedidoController::class)
    ->middleware('administrador');

    /*
    |--------------------------------------------------------------------------
    | Usuarios
    |--------------------------------------------------------------------------
    */

    Route::get('/usuarios', [UsuarioController::class, 'index'])
    ->middleware('administrador')
    ->name('usuarios.index');

    /*
    |--------------------------------------------------------------------------
    | Perfil
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Autenticación
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
