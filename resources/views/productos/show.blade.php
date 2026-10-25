<x-app-layout>
    <style>
    .product-show {
        min-height: calc(100vh - 80px);
        background: #f4f2ee;
        color: #171715;
        padding: 70px 32px 80px;
    }

    .show-container {
        width: min(1180px, 100%);
        margin: 0 auto;
    }

    .back-link {
        display: inline-block;
        margin-bottom: 38px;
        padding-bottom: 5px;
        border-bottom: 1px solid #9a948b;
        color: #777168;
        font-size: 10px;
        letter-spacing: .28em;
        text-transform: uppercase;
        text-decoration: none;
    }

    /* FICHA DEL PRODUCTO */
    .product-layout {
        display: grid;
        grid-template-columns: 1fr 1fr;
        min-height: 480px;
        height: auto;
        background: #faf8f4;
        border: 1px solid #ddd7ce;
        overflow: visible;
    }

    /* IMAGEN */
    .product-photo {
        height: 480px;
        background: #ebe6dd;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .product-photo img {
        width: 100%;
        height: 100%;
        min-height: 0;
        object-fit: cover;
    }

    .no-image {
        color: #a09a91;
        font-size: 10px;
        letter-spacing: .28em;
        text-transform: uppercase;
    }

    /* INFORMACIÓN DEL PRODUCTO */
    .product-content {
        min-height: 480px;
        height: auto;
        box-sizing: border-box;
        padding: 24px 40px 20px;
        display: flex;
        flex-direction: column;
    }

    .category {
        margin-bottom: 10px;
        color: #989188;
        font-size: 9px;
        letter-spacing: .35em;
        text-transform: uppercase;
    }

    .product-title {
        margin: 0;
        font-family: Georgia, "Times New Roman", serif;
        font-size: clamp(36px, 3.5vw, 52px);
        line-height: .98;
        font-weight: 400;
        letter-spacing: -.035em;
    }

    .description {
        margin: 14px 0;
        color: #716b63;
        font-size: 13px;
        line-height: 1.45;
    }

    /* ESTADO Y DESTACADO */
    .badges {
        display: flex;
        gap: 10px;
        margin-bottom: 16px;
    }

    .badge {
        padding: 9px 15px;
        border: 1px solid #d3ccc2;
        font-size: 8px;
        letter-spacing: .22em;
        text-transform: uppercase;
    }

    .badge.active {
        background: #171715;
        border-color: #171715;
        color: white;
    }

    /* VALORACIÓN DEL PRODUCTO */
    .rating-section {
        margin-bottom: 12px;
        padding: 15px 0 12px;
        border-top: 1px solid #ddd7ce;
    }

    .rating-label,
    .rating-question {
        color: #989188;
        font-size: 8px;
        letter-spacing: .3em;
        text-transform: uppercase;
    }

    .rating-success {
        margin-top: 8px;
        color: #6f765f;
        font-size: 11px;
    }

    .rating-summary {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-top: 10px;
    }

    .rating-average {
        font-family: Georgia, "Times New Roman", serif;
        font-size: 36px;
        line-height: 1;
    }

    .rating-display {
        display: flex;
        gap: 3px;
        color: #c9c2b8;
        font-size: 16px;
    }

    .rating-display .filled {
        color: #171715;
    }

    .rating-count {
        margin-top: 3px;
        color: #989188;
        font-size: 9px;
        letter-spacing: .08em;
    }

    .rating-form {
        margin-top: 14px;
    }

    .rating-input {
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        gap: 4px;
        margin-top: 8px;
        width: fit-content;
    }

    .rating-input button {
        padding: 0;
        border: 0;
        background: transparent;
        color: #c9c2b8;
        cursor: pointer;
        font-size: 23px;
        line-height: 1;
        transition:
            color .2s ease,
            transform .2s ease;
    }

    .rating-input:hover button {
        color: #171715;
    }

    .rating-input button:hover ~ button {
        color: #c9c2b8;
    }

    .rating-input button:hover {
        transform: translateY(-2px);
    }

    .rating-input button:focus-visible {
        outline: 1px solid #171715;
        outline-offset: 4px;
    }

    /* PRECIO Y DISPONIBILIDAD */
    .details {
        margin-top: auto;
        padding: 14px 0;
        border-top: 1px solid #ddd7ce;
        border-bottom: 1px solid #ddd7ce;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
    }

    .detail-label {
        margin-bottom: 6px;
        color: #9a948b;
        font-size: 8px;
        letter-spacing: .3em;
        text-transform: uppercase;
    }

    .price {
        font-family: Georgia, "Times New Roman", serif;
        font-size: 28px;
        line-height: 1;
    }

    .stock {
        font-size: 15px;
    }

    /* ACCIONES */
    .actions {
        margin-top: 12px;
        padding-top: 0;
        display: flex;
        align-items: center;
        gap: 24px;
    }

    .edit-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 170px;
        min-height: 42px;
        padding: 0 24px;
        background: #171715;
        color: white;
        font-size: 8px;
        letter-spacing: .3em;
        text-transform: uppercase;
        text-decoration: none;
    }

    .delete-form {
        margin: 0;
    }

    .delete-button {
        padding: 0 0 5px;
        border: 0;
        border-bottom: 1px solid transparent;
        background: transparent;
        color: #934c42;
        cursor: pointer;
        font-size: 8px;
        letter-spacing: .25em;
        text-transform: uppercase;
    }

    .delete-button:hover {
        border-bottom-color: #934c42;
    }

    /* RESPONSIVE */
    @media (max-width: 850px) {
        .product-show {
            padding: 45px 20px 70px;
        }

        .product-layout {
            grid-template-columns: 1fr;
            height: auto;
            overflow: visible;
        }

        .product-photo {
            height: 420px;
        }

        .product-photo img {
            min-height: 0;
        }

        .product-content {
            height: auto;
            padding: 35px 30px;
        }

        .details {
            margin-top: 20px;
        }

        .actions {
            margin-top: 20px;
        }
    }
</style>

    <div class="product-show">
        <div class="show-container">

            <a href="{{ route('productos.index') }}" class="back-link">
                ← Volver a productos
            </a>

            <article class="product-layout">

                <div class="product-photo">
    @if ($producto->imagen)
        <img
            src="{{ str_starts_with($producto->imagen, 'images/')
                ? asset($producto->imagen)
                : asset('storage/' . $producto->imagen) }}"
            alt="{{ $producto->nombre }}"
        >
    @else
        <span class="no-image">Sin imagen</span>
                  @endif
             </div>

                <div class="product-content">

                    <div class="category">
                        {{ $producto->categoria }}
                    </div>

                    <h1 class="product-title">
                        {{ $producto->nombre }}
                    </h1>

                    @if ($producto->descripcion)
                        <p class="description">
                            {{ $producto->descripcion }}
                        </p>
                    @endif
                    @if (auth()->check() && auth()->user()->esAdministrador())
                    <div class="badges">

                        @if ($producto->activo)
                            <span class="badge active">Activo</span>
                        @else
                            <span class="badge">Inactivo</span>
                        @endif

                        @if ($producto->destacado)
                            <span class="badge">★ Destacado</span>
                        @endif

                    </div>
                 @endif

                    <div class="rating-section">

    <div class="rating-label">
        Valoración del producto
    </div>

    @if (session('success'))
        <div class="rating-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="rating-summary">

        <div class="rating-average">
            @if ($totalValoraciones > 0)
                {{ number_format($promedioValoracion, 1) }}
            @else
                —
            @endif
        </div>

        <div>
            <div class="rating-display">
                @for ($i = 1; $i <= 5; $i++)
                    <span class="{{ $promedioValoracion >= $i ? 'filled' : '' }}">★</span>
                @endfor
            </div>

            <div class="rating-count">
                {{ $totalValoraciones }}
                {{ $totalValoraciones === 1 ? 'valoración' : 'valoraciones' }}
            </div>
        </div>

    </div>

    <form
        action="{{ route('productos.valorar', $producto) }}"
        method="POST"
        class="rating-form"
    >
        @csrf

        <div class="rating-question">
            ¿Qué te pareció este producto?
        </div>

        <div class="rating-input">
            @for ($i = 1; $i <= 5; $i++)
                <button
                    type="submit"
                    name="puntuacion"
                    value="{{ $i }}"
                    aria-label="Valorar con {{ $i }} {{ $i === 1 ? 'estrella' : 'estrellas' }}"
                >
                    ★
                </button>
            @endfor
        </div>
    </form>

</div>

                    <div class="details">

                        <div>
                            <div class="detail-label">Precio</div>

                            <div class="price">
                                ${{ number_format($producto->precio, 2) }}
                            </div>
                        </div>

                        <div>
                            <div class="detail-label">Disponibilidad</div>

                            <div class="stock">
                                {{ $producto->stock }}
                                {{ $producto->stock == 1 ? 'unidad' : 'unidades' }}
                            </div>
                        </div>

                    </div>

                    @if ($producto->activo && $producto->stock > 0)
                        <form action="{{ route('carrito.agregar') }}" method="POST" style="margin-top: 12px;">
                            @csrf
                            <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                            <input type="hidden" name="cantidad" value="1">
                            <button type="submit" style="width: 100%; padding: 12px 15px; background: #171715; color: #fff; border: 0; cursor: pointer; font-size: 10px; letter-spacing: .18em; text-transform: uppercase;">
                                Agregar
                            </button>
                        </form>
                    @endif

                @if (auth()->check() && auth()->user()->esAdministrador())

                    <div class="actions">

                        <a
                            href="{{ route('productos.edit', $producto) }}"
                            class="edit-button"
                        >
                            Editar producto
                        </a>

                        <form
                            class="delete-form"
                            action="{{ route('productos.destroy', $producto) }}"
                            method="POST"
                            onsubmit="return confirm('¿Seguro que deseas eliminar este producto?');"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="delete-button"
                            >
                                Eliminar
                            </button>
                        </form>

                    </div>

@endif

</div>

            </article>

        </div>
    </div>
</x-app-layout>
