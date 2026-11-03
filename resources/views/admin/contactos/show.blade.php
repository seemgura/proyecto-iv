<x-app-layout>
    <div class="max-w-4xl mx-auto px-6 py-12">

        {{-- Navegación --}}
        <div class="mb-12">
            <a
                href="{{ route('admin.contactos.index') }}"
                class="text-xs uppercase tracking-widest text-gray-500 hover:text-black"
            >
                ← Volver a mensajes
            </a>
        </div>

        {{-- Encabezado --}}
        <div class="mb-12">
            <p class="text-xs tracking-widest uppercase text-gray-500 mb-4">
                INTEOFFICE · ATENCIÓN AL CLIENTE
            </p>

            <h1 class="font-serif text-5xl text-gray-900 mb-4">
                Detalle del mensaje.
            </h1>

            <p class="text-gray-500">
                Consulta la información de la solicitud recibida.
            </p>
        </div>

        {{-- Mensaje --}}
        <article class="bg-white border border-gray-200">

            <div class="p-8 border-b border-gray-200">
                <div class="flex flex-col md:flex-row md:justify-between gap-6">

                    <div>
                        <p class="text-xs uppercase tracking-widest text-gray-500 mb-3">
                            REMITENTE
                        </p>

                        <h2 class="font-serif text-3xl text-gray-900">
                            {{ $contacto->nombre }}
                        </h2>

                        <a
                            href="mailto:{{ $contacto->correo }}"
                            class="text-sm text-gray-600 underline mt-2 inline-block"
                        >
                            {{ $contacto->correo }}
                        </a>
                    </div>

                    <div class="text-sm text-gray-500">
                        {{ $contacto->created_at->format('d/m/Y H:i') }}
                    </div>

                </div>
            </div>

            <div class="p-8 border-b border-gray-200">
                <p class="text-xs uppercase tracking-widest text-gray-500 mb-3">
                    ASUNTO
                </p>

                <h3 class="font-serif text-2xl text-gray-900">
                    {{ $contacto->asunto }}
                </h3>
            </div>

            <div class="p-8">
                <p class="text-xs uppercase tracking-widest text-gray-500 mb-6">
                    MENSAJE
                </p>

                <div class="text-gray-700 leading-8 whitespace-pre-wrap break-words">{{ $contacto->mensaje }}</div>
            </div>

        </article>

        {{-- Acciones --}}
        <div class="mt-8 flex flex-wrap items-center justify-between gap-6">

            <form
                action="{{ route('admin.contactos.no-leido', $contacto) }}"
                method="POST"
            >
                @csrf
                @method('PATCH')

                <button
                    type="submit"
                    class="px-6 py-4 border border-gray-900 text-xs uppercase tracking-widest hover:bg-gray-900 hover:text-white transition"
                >
                    Marcar como no leído
                </button>
            </form>

            <a
                href="mailto:{{ $contacto->correo }}"
                class="px-6 py-4 bg-gray-900 text-white text-xs uppercase tracking-widest hover:bg-gray-700 transition"
            >
                Responder por correo ↗
            </a>

        </div>

        {{-- Pie editorial --}}
        <div class="mt-16 pt-8 border-t border-gray-200">
            <p class="text-xs tracking-widest text-gray-400">
                INTEOFFICE · GESTIÓN DE MENSAJES
            </p>
        </div>

    </div>
</x-app-layout>
