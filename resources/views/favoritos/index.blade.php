<x-app-layout>
    <div style="max-width:1100px;margin:60px auto;padding:0 24px;min-height:55vh;">
        <p style="font-size:12px;letter-spacing:3px;color:#888;text-transform:uppercase;">
            InteOffice · Tu selección
        </p>

        <h1 style="font-family:Georgia,serif;font-size:clamp(36px,5vw,56px);margin:16px 0 12px;">
            Mis favoritos.
        </h1>

        <p style="color:#666;margin-bottom:36px;">
            Guarda tus muebles preferidos y consúltalos cuando quieras.
        </p>

        @if(session('status'))
            <p style="padding:14px;background:#edf7ed;margin-bottom:24px;">
                {{ session('status') }}
            </p>
        @endif

        @if($favoritos->isEmpty())
            <div style="padding:65px 20px;text-align:center;background:#f7f6f3;">
                <h2 style="font-family:Georgia,serif;font-size:26px;">
                    Tu lista está vacía.
                </h2>
                <p style="color:#666;margin:15px 0 25px;">
                    Explora el catálogo y guarda los productos que más te gusten.
                </p>
                <a href="{{ route('productos.index') }}"
                   style="display:inline-block;background:#222;color:white;padding:14px 25px;text-decoration:none;">
                    EXPLORAR PRODUCTOS
                </a>
            </div>
        @else
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:25px;">
                @foreach($favoritos as $favorito)
                    @if($favorito->producto)
                        <article style="background:#f7f6f3;padding:18px;">
                            @if($favorito->producto->imagen)
                                <img
                                    src="{{ str_starts_with($favorito->producto->imagen, 'images/') ? asset($favorito->producto->imagen) : asset('storage/'.$favorito->producto->imagen) }}"
                                    alt="{{ $favorito->producto->nombre }}"
                                    style="width:100%;height:220px;object-fit:cover;"
                                >
                            @endif

                            <h2 style="font-family:Georgia,serif;font-size:22px;margin:18px 0 8px;">
                                {{ $favorito->producto->nombre }}
                            </h2>

                            <p style="margin-bottom:18px;">
                                ${{ number_format($favorito->producto->precio, 2) }} MXN
                            </p>

                            <a href="{{ route('productos.show', $favorito->producto) }}"
                               style="display:block;margin-bottom:15px;text-decoration:underline;">
                                Ver producto
                            </a>

                            <form action="{{ route('favoritos.toggle', $favorito->producto) }}" method="POST">
                                @csrf
                                <button type="submit"
                                        style="color:#9b3434;font-weight:bold;">
                                    ♥ Quitar de favoritos
                                </button>
                            </form>
                        </article>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
