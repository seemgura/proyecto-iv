<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Mostrar todos los pedidos.
     */
    public function index()
    {
        $pedidos = Pedido::latest()->paginate(10);

        return view('pedidos.index', compact('pedidos'));
    }

    /**
     * Mostrar formulario para crear un pedido.
     */
    public function create()
    {
        //
    }

    /**
     * Guardar un nuevo pedido.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Mostrar un pedido.
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Mostrar formulario para editar un pedido.
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Actualizar un pedido.
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Eliminar un pedido.
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}