<?php

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MensajeContactoController;


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
| Ubicación y contacto
|--------------------------------------------------------------------------
*/

Route::get('/ubicacion', function () {
    return view('institucional.ubicacion');
})->name('ubicacion');


Route::get('/contacto', function () {
    return view('institucional.contacto');
})->name('contacto');

Route::post('/contacto', [
    \App\Http\Controllers\ContactoController::class,
    'store'
])->name('contacto.store');


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

    // Mensajes de contacto
    $totalMensajes = \App\Models\Contacto::count();

    $mensajesPendientes = \App\Models\Contacto::where(
        'leido',
        false
    )->count();

    return view('dashboard', compact(
        'totalProductos',
        'totalPedidos',
        'totalUsuarios',
        'totalMensajes',
        'mensajesPendientes'
    ));
})->middleware(['auth', 'verified', 'administrador'])
  ->name('dashboard');


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
    | Mensajes de contacto
    |--------------------------------------------------------------------------
    */

    Route::middleware('administrador')
        ->prefix('admin/contactos')
        ->name('admin.contactos.')
        ->group(function () {

            Route::get('/', [MensajeContactoController::class, 'index'])
                ->name('index');

            Route::get('/{contacto}', [MensajeContactoController::class, 'show'])
                ->name('show');

            Route::patch('/{contacto}/no-leido', [
                MensajeContactoController::class,
                'marcarNoLeido'
            ])->name('no-leido');
        });

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
