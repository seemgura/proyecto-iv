<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ContactoController extends Controller
{
    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => ['required', 'string', 'max:120'],
            'correo' => ['required', 'email', 'max:255'],
            'asunto' => [
                'required',
                Rule::in([
                    'Productos',
                    'Pedidos',
                    'Asesoría',
                    'Otro',
                ]),
            ],
            'mensaje' => ['required', 'string', 'max:3000'],
        ]);

        Contacto::create($datos);

        return redirect()
            ->route('contacto')
            ->with(
                'success',
                'Tu mensaje fue enviado y registrado correctamente.'
            );
    }
}
