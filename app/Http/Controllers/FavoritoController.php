<?php

namespace App\Http\Controllers;

use App\Models\Favorito;
use App\Models\Producto;
use Illuminate\Http\Request;

class FavoritoController extends Controller
{
    public function index(Request $request)
    {
        $favoritos = Favorito::with('producto')
            ->where('user_id', $request->user()->id)
            ->latest()
            ->get();

        return view('favoritos.index', compact('favoritos'));
    }

    public function toggle(Request $request, Producto $producto)
    {
        $favorito = Favorito::where('user_id', $request->user()->id)
            ->where('producto_id', $producto->id)
            ->first();

        if ($favorito) {
            $favorito->delete();
            $mensaje = 'Producto eliminado de favoritos.';
        } else {
            Favorito::create([
                'user_id' => $request->user()->id,
                'producto_id' => $producto->id,
            ]);
            $mensaje = 'Producto agregado a favoritos.';
        }

        return back()->with('status', $mensaje);
    }
}
