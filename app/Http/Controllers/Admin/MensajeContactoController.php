<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contacto;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MensajeContactoController extends Controller
{
    /**
     * Mostrar los mensajes recibidos.
     */
    public function index(): View
    {
        $mensajes = Contacto::orderBy('leido')
            ->latest()
            ->paginate(10);

        return view('admin.contactos.index', compact('mensajes'));
    }

    /**
     * Mostrar un mensaje y marcarlo como leído.
     */
    public function show(Contacto $contacto): View
    {
        if (! $contacto->leido) {
            $contacto->update(['leido' => true]);
        }

        return view('admin.contactos.show', compact('contacto'));
    }

    /**
     * Marcar un mensaje como no leído.
     */
    public function marcarNoLeido(Contacto $contacto): RedirectResponse
    {
        $contacto->update(['leido' => false]);

        return redirect()
            ->route('admin.contactos.index')
            ->with('success', 'Mensaje marcado como no leído.');
    }
}
