<?php

namespace App\Http\Controllers;

use App\Models\User;

class UsuarioController extends Controller
{
    /**
     * Mostrar todos los usuarios registrados.
     */
    public function index()
    {
        $usuarios = User::latest()->paginate(10);

        return view('usuarios.index', compact('usuarios'));
    }
}