<x-app-layout>

    <x-slot name="header">
        <div>
            <p style="
                margin: 0 0 8px;
                font-size: 10px;
                letter-spacing: .3em;
                text-transform: uppercase;
                color: #9a958c;
            ">
                Administración
            </p>

            <h2 style="
                margin: 0;
                font-family: Georgia, 'Times New Roman', serif;
                font-size: 32px;
                font-weight: 400;
                color: #171715;
            ">
                Productos
            </h2>
        </div>
    </x-slot>


    <style>
        .catalog-page {
            max-width: 1180px;
            margin: 0 auto;
            padding: 60px 30px 100px;
        }

        .catalog-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 40px;
            margin-bottom: 42px;
        }

        .catalog-eyebrow {
            margin: 0 0 10px;
            font-size: 9px;
            letter-spacing: .3em;
            text-transform: uppercase;
            color: #9a958c;
        }

        .catalog-title {
            margin: 0;
            font-family: Georgia, "Times New Roman", serif;
            font-size: 42px;
            line-height: 1;
            font-weight: 400;
            color: #171715;
        }

        .catalog-description {
            margin: 14px 0 0;
            font-size: 14px;
            line-height: 1.7;
            color: #777168;
        }

        .catalog-header-right {
            display: flex;
            align-items: center;
            gap: 28px;
        }

        .catalog-count {
            white-space: nowrap;
            font-size: 11px;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: #8c867d;
        }

        .button-new {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 52px;
            padding: 0 27px;
            background: #171715;
            color: #fff;
            text-decoration: none;
            font-size: 9px;
            letter-spacing: .25em;
            text-transform: uppercase;
            transition: background .2s ease;
        }

        .button-new:hover {
            background: #383630;
        }


        /* Mensaje de éxito */

        .success-message {
            margin-bottom: 30px;
            padding: 18px 22px;
            border: 1px solid #d8d0c3;
            background: #f8f5ef;
            font-size: 12px;
            color: #4e4a44;
        }


        /* Lista */

        .product-list {
            border-top: 1px solid #d8d0c3;
        }

        .product-row {
            display: grid;
            grid-template-columns: 220px minmax(0, 1fr) 190px;
            min-height: 245px;
            padding: 28px 0;
            border-bottom: 1px solid #d8d0c3;
            gap: 34px;
        }


        /* Imagen */

        .product-photo {
            position: relative;
            width: 220px;
            height: 188px;
            overflow: hidden;
            background: #e9e3d9;
        }

        .product-photo img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .35s ease;
        }

        .product-row:hover .product-photo img {
            transform: scale(1.025);
        }

        .product-no-image {
            display: flex;
            width: 100%;
            height: 100%;
            align-items: center;
            justify-content: center;
            font-size: 9px;
            letter-spacing: .2em;
            text-transform: uppercase;
            color: #9a958c;
        }


        /* Información central */

        .product-main {
            display: flex;
            flex-direction: column;
            min-width: 0;
            padding: 5px 0;
        }

        .product-category {
            margin-bottom: 14px;
            font-size: 8px;
            letter-spacing: .3em;
            text-transform: uppercase;
            color: #9a958c;
        }

        .product-name {
            margin: 0;
            font-family: Georgia, "Times New Roman", serif;
            font-size: 30px;
            line-height: 1.1;
            font-weight: 400;
            color: #171715;
        }

        .product-description {
            max-width: 620px;
            margin: 16px 0 22px;
            font-size: 13px;
            line-height: 1.7;
            color: #777168;
        }

        .product-badges {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: auto;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            min-height: 27px;
            padding: 0 11px;
            border: 1px solid #d8d0c3;
            font-size: 8px;
            letter-spacing: .18em;
            text-transform: uppercase;
            color: #625d55;
        }

        .badge-active {
            background: #171715;
            border-color: #171715;
            color: #fff;
        }

        .badge-inactive {
            color: #9a958c;
        }


        /* Precio y acciones */

        .product-side {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            padding: 5px 0;
            text-align: right;
        }

        .price-label,
        .stock-label {
            margin-bottom: 7px;
            font-size: 8px;
            letter-spacing: .25em;
            text-transform: uppercase;
            color: #9a958c;
        }

        .product-price {
            font-family: Georgia, "Times New Roman", serif;
            font-size: 25px;
            color: #171715;
        }

        .stock-block {
            margin-top: 24px;
        }

        .product-stock {
            font-size: 14px;
            color: #171715;
        }

        .product-actions {
    display: flex;
    align-items: baseline;
    justify-content: flex-end;
    gap: 18px;
    margin-top: auto;
}

.product-actions form {
    margin: 0;
    padding: 0;
    display: inline-flex;
    align-items: baseline;
}

        .action-link,
        .action-delete {
            padding: 0 0 5px;
            border: 0;
            border-bottom: 1px solid transparent;
            background: transparent;
            color: #625d55;
            cursor: pointer;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 8px;
            letter-spacing: .18em;
            text-transform: uppercase;
            text-decoration: none;
            line-height: 1;
        }

        .action-link:hover {
            border-bottom-color: #171715;
            color: #171715;
        }

        .action-delete {
            color: #8b4a42;
        }

        .action-delete:hover {
            border-bottom-color: #8b4a42;
        }


        /* Catálogo vacío */

        .empty-catalog {
            padding: 90px 30px;
            border: 1px solid #d8d0c3;
            background: #fff;
            text-align: center;
        }

        .empty-eyebrow {
            font-size: 9px;
            letter-spacing: .3em;
            text-transform: uppercase;
            color: #9a958c;
        }

        .empty-title {
            margin: 16px 0 10px;
            font-family: Georgia, "Times New Roman", serif;
            font-size: 30px;
            font-weight: 400;
        }

        .empty-text {
            margin: 0 0 30px;
            color: #777168;
            font-size: 13px;
        }


        /* Responsive */

        @media (max-width: 900px) {

            .catalog-page {
                padding: 45px 20px 80px;
            }

            .catalog-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .catalog-header-right {
                width: 100%;
                justify-content: space-between;
            }

            .product-row {
                grid-template-columns: 180px minmax(0, 1fr);
            }

            .product-photo {
                width: 180px;
                height: 170px;
            }

            .product-side {
                grid-column: 2;
                align-items: flex-start;
                text-align: left;
            }

            .product-actions {
                justify-content: flex-start;
                margin-top: 28px;
            }
        }

        @media (max-width: 650px) {

            .catalog-title {
                font-size: 36px;
            }

            .catalog-header-right {
                align-items: stretch;
                flex-direction: column;
            }

            .button-new {
                width: 100%;
            }

            .product-row {
                grid-template-columns: 1fr;
                gap: 22px;
            }

            .product-photo {
                width: 100%;
                height: 280px;
            }

            .product-side {
                grid-column: auto;
            }
        }
    </style>


    <div class="catalog-page">

        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif


        <div class="catalog-header">

            <div>
                <p class="catalog-eyebrow">
                    Catálogo
                </p>

                <h1 class="catalog-title">
                    Productos
                </h1>

                <p class="catalog-description">
                    Gestiona el mobiliario y accesorios disponibles en InteOffice.
                </p>
            </div>


            <div class="catalog-header-right">

                <span class="catalog-count">
                    {{ $productos->count() }}
                    {{ $productos->count() === 1 ? 'producto' : 'productos' }}
                </span>

                <a
                    href="{{ route('productos.create') }}"
                    class="button-new"
                >
                    + Nuevo producto
                </a>

            </div>

        </div>


        @if ($productos->count())

            <div class="product-list">

                @foreach ($productos as $producto)

                    <article class="product-row">

                        {{-- Fotografía --}}
                        <div class="product-photo">

                            @if ($producto->imagen)

                                <img
src="{{ str_starts_with($producto->imagen, 'images/')
    ? asset($producto->imagen)
    : asset('storage/' . $producto->imagen) }}"                                    alt="{{ $producto->nombre }}"
                                >

                            @else

                                <div class="product-no-image">
                                    Sin imagen
                                </div>

                            @endif

                        </div>


                        {{-- Información --}}
                        <div class="product-main">

                            <div class="product-category">
                                {{ $producto->categoria }}
                            </div>

                            <h2 class="product-name">
                                {{ $producto->nombre }}
                            </h2>

                            @if ($producto->descripcion)

                                <p class="product-description">
                                    {{ $producto->descripcion }}
                                </p>

                            @endif


                            <div class="product-badges">

                                @if ($producto->activo)

                                    <span class="badge badge-active">
                                        Activo
                                    </span>

                                @else

                                    <span class="badge badge-inactive">
                                        Inactivo
                                    </span>

                                @endif


                                @if ($producto->destacado)

                                    <span class="badge">
                                        ★ Destacado
                                    </span>

                                @endif

                            </div>

                        </div>


                        {{-- Precio / stock / acciones --}}
                        <div class="product-side">

                            <div>
                                <div class="price-label">
                                    Precio
                                </div>

                                <div class="product-price">
                                    ${{ number_format($producto->precio, 2) }}
                                </div>
                            </div>


                            <div class="stock-block">

                                <div class="stock-label">
                                    Stock
                                </div>

                                <div class="product-stock">
                                    {{ $producto->stock }}
                                    {{ $producto->stock == 1 ? 'unidad' : 'unidades' }}
                                </div>

                            </div>


                            <div class="product-actions">

                                <a
                                    href="{{ route('productos.show', $producto) }}"
                                    class="action-link"
                                >
                                    Ver
                                </a>

                                <a
                                    href="{{ route('productos.edit', $producto) }}"
                                    class="action-link"
                                >
                                    Editar
                                </a>


                                <form
                                    action="{{ route('productos.destroy', $producto) }}"
                                    method="POST"
                                    onsubmit="return confirm('¿Seguro que deseas eliminar este producto?');"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="action-delete"
                                    >
                                        Eliminar
                                    </button>

                                </form>

                            </div>

                        </div>

                    </article>

                @endforeach

            </div>


        @else

            <div class="empty-catalog">

                <span class="empty-eyebrow">
                    Catálogo vacío
                </span>

                <h2 class="empty-title">
                    Aún no hay productos
                </h2>

                <p class="empty-text">
                    Agrega el primer producto para comenzar a construir
                    el catálogo de InteOffice.
                </p>

                <a
                    href="{{ route('productos.create') }}"
                    class="button-new"
                >
                    Crear primer producto
                </a>

            </div>

        @endif

    </div>

</x-app-layout>