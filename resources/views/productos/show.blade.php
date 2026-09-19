<x-app-layout>
    <style>
        .product-show {
            min-height: calc(100vh - 80px);
            background: #f4f2ee;
            color: #171715;
            padding: 70px 32px 100px;
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

        .product-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: #faf8f4;
            border: 1px solid #ddd7ce;
        }

        .product-photo {
            min-height: 650px;
            background: #ebe6dd;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .product-photo img {
            width: 100%;
            height: 100%;
            min-height: 650px;
            object-fit: cover;
        }

        .no-image {
            color: #a09a91;
            font-size: 10px;
            letter-spacing: .28em;
            text-transform: uppercase;
        }

        .product-content {
            padding: 70px 65px;
            display: flex;
            flex-direction: column;
        }

        .category {
            margin-bottom: 24px;
            color: #989188;
            font-size: 10px;
            letter-spacing: .35em;
            text-transform: uppercase;
        }

        .product-title {
            margin: 0;
            font-family: Georgia, "Times New Roman", serif;
            font-size: clamp(44px, 5vw, 72px);
            line-height: .98;
            font-weight: 400;
            letter-spacing: -.035em;
        }

        .description {
            margin: 35px 0;
            color: #716b63;
            font-size: 16px;
            line-height: 1.8;
        }

        .badges {
            display: flex;
            gap: 12px;
            margin-bottom: 48px;
        }

        .badge {
            padding: 12px 18px;
            border: 1px solid #d3ccc2;
            font-size: 9px;
            letter-spacing: .22em;
            text-transform: uppercase;
        }

        .badge.active {
            background: #171715;
            border-color: #171715;
            color: white;
        }

        .details {
            padding: 35px 0;
            border-top: 1px solid #ddd7ce;
            border-bottom: 1px solid #ddd7ce;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .detail-label {
            margin-bottom: 10px;
            color: #9a948b;
            font-size: 9px;
            letter-spacing: .3em;
            text-transform: uppercase;
        }

        .price {
            font-family: Georgia, "Times New Roman", serif;
            font-size: 34px;
        }

        .stock {
            font-size: 17px;
        }

        .actions {
            margin-top: auto;
            padding-top: 45px;
            display: flex;
            align-items: center;
            gap: 28px;
        }

        .edit-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 190px;
            min-height: 55px;
            padding: 0 28px;
            background: #171715;
            color: white;
            font-size: 9px;
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
            font-size: 9px;
            letter-spacing: .25em;
            text-transform: uppercase;
        }

        .delete-button:hover {
            border-bottom-color: #934c42;
        }

        @media (max-width: 850px) {
            .product-show {
                padding: 45px 20px 70px;
            }

            .product-layout {
                grid-template-columns: 1fr;
            }

            .product-photo,
            .product-photo img {
                min-height: 420px;
            }

            .product-content {
                padding: 45px 30px;
            }

            .actions {
                margin-top: 45px;
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
                            src="{{ asset('storage/' . $producto->imagen) }}"
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

                </div>

            </article>

        </div>
    </div>
</x-app-layout>