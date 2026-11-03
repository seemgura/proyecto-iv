<x-app-layout>
    <div class="max-w-7xl mx-auto px-6 py-12">

        {{-- Encabezado --}}
        <div class="mb-12">
            <p class="text-xs tracking-widest uppercase text-gray-500 mb-4">
                INTEOFFICE · ADMINISTRACIÓN
            </p>

            <h1 class="font-serif text-5xl text-gray-900 mb-4">
                Mensajes de contacto.
            </h1>

            <p class="text-gray-500">
                Consulta las solicitudes recibidas desde el formulario
                de contacto de InteOffice.
            </p>
        </div>

        {{-- Confirmaciones --}}
        @if (session('success'))
            <div class="mb-8 p-4 border border-green-200 bg-green-50 text-green-800">
                {{ session('success') }}
            </div>
        @endif

        {{-- Bandeja --}}
        <div class="bg-white border border-gray-200 overflow-hidden">

            <div class="px-6 py-5 border-b border-gray-200 flex justify-between items-center">
                <h2 class="font-serif text-2xl">
                    Bandeja de entrada
                </h2>

                <span class="text-xs uppercase tracking-widest text-gray-500">
                    {{ $mensajes->total() }} mensajes
                </span>
            </div>

            @forelse ($mensajes as $mensaje)
                <a
                    href="{{ route('admin.contactos.show', $mensaje) }}"
                    class="block px-6 py-6 border-b border-gray-100 hover:bg-gray-50 transition"
                >
                    <div class="flex flex-col md:flex-row md:justify-between gap-4">

                        <div>
                            <div class="flex items-center gap-3 mb-2">
                                @unless ($mensaje->leido)
                                    <span class="w-2 h-2 rounded-full bg-amber-600"
                                          aria-label="No leído"></span>
                                @endunless

                                <h3 class="text-lg text-gray-900 {{ $mensaje->leido ? '' : 'font-bold' }}">
                                    {{ $mensaje->nombre }}
                                </h3>
                            </div>

                            <p class="text-sm text-gray-600 mb-2">
                                {{ $mensaje->asunto }} · {{ $mensaje->correo }}
                            </p>

                            <p class="text-sm text-gray-500">
                                {{ \Illuminate\Support\Str::limit($mensaje->mensaje, 120) }}
                            </p>
                        </div>

                        <div class="text-xs text-gray-500 whitespace-nowrap">
                            {{ $mensaje->created_at->format('d/m/Y H:i') }}
                        </div>

                    </div>
                </a>
            @empty
                <div class="px-6 py-16 text-center text-gray-500">
                    Todavía no se han recibido mensajes.
                </div>
            @endforelse

        </div>

        {{-- Paginación --}}
        <div class="mt-8">
            {{ $mensajes->links() }}
        </div>

        {{-- Regresar --}}
        <div class="mt-12">
            <a href="{{ route('dashboard') }}"
               class="text-xs uppercase tracking-widest text-gray-700 hover:text-black">
                ← Volver al panel administrativo
            </a>
        </div>

    </div>
</x-app-layout>
