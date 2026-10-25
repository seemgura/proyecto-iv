
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Mi carrito | InteOffice</title>

    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --ink: #171715;
            --paper: #f4f0e8;
            --paper-light: #faf8f3;
            --line: #d8d0c3;
            --muted: #817b72;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--paper);
            color: var(--ink);
            font-family: Arial, Helvetica, sans-serif;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button {
            font: inherit;
        }

        .container {
            width: min(1400px, calc(100% - 80px));
            margin: 0 auto;
        }

        .site-header {
            position: sticky;
            top: 0;
            z-index: 50;
            background: rgba(244, 240, 232, .96);
            border-bottom: 1px solid var(--line);
            backdrop-filter: blur(12px);
        }

        .nav {
            min-height: 88px;
            display: grid;
            grid-template-columns: 1fr auto 1fr;
            align-items: center;
            gap: 30px;
        }

        .nav-left,
        .nav-right {
            display: flex;
            align-items: center;
            gap: 28px;
        }

        .nav-right {
            justify-content: flex-end;
        }

        .nav-link {
            font-size: 11px;
            letter-spacing: .18em;
            text-transform: uppercase;
        }

        .brand {
            text-align: center;
        }

        .brand-name {
            font-family: Georgia, "Times New Roman", serif;
            font-size: 25px;
            letter-spacing: .32em;
        }

        .brand-tagline {
            margin-top: 8px;
            font-size: 8px;
            letter-spacing: .38em;
            color: var(--muted);
            text-transform: uppercase;
        }

        .cart-section {
            padding: 100px 0 140px;
            min-height: 65vh;
        }

        .eyebrow {
            font-size: 10px;
            letter-spacing: .4em;
            text-transform: uppercase;
            color: var(--muted);
        }

        .cart-title {
            margin: 20px 0 55px;
            font-family: Georgia, "Times New Roman", serif;
            font-size: clamp(48px, 6vw, 84px);
            font-weight: 400;
            letter-spacing: -.04em;
        }

        .cart-empty {
            padding: 90px 30px;
            border-top: 1px solid var(--line);
            border-bottom: 1px solid var(--line);
            text-align: center;
        }

        .cart-empty h2 {
            font-family: Georgia, "Times New Roman", serif;
            font-size: clamp(28px, 4vw, 44px);
            font-weight: 400;
        }

        .cart-empty p {
            margin: 20px 0 36px;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.8;
        }

        .button-dark {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            min-height: 58px;
            padding: 0 30px;
            border: 0;
            background: var(--ink);
            color: white;
            font-size: 10px;
            letter-spacing: .25em;
            text-transform: uppercase;
            cursor: pointer;
            transition: background .25s ease;
        }

        .button-dark:hover:not(:disabled) {
            background: #383630;
        }

        .button-dark:disabled {
            cursor: not-allowed;
        }

        .cart-layout {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 360px;
            gap: 70px;
            align-items: start;
        }

        .cart-list {
            border-top: 1px solid var(--line);
        }

        .cart-item {
            display: grid;
            grid-template-columns: minmax(0, 1fr) auto;
            gap: 32px;
            padding: 36px 0;
            border-bottom: 1px solid var(--line);
            align-items: start;
        }

        .item-details {
            min-width: 0;
        }

        .item-name {
            margin: 0 0 14px;
            font-family: Georgia, "Times New Roman", serif;
            font-size: clamp(24px, 3vw, 34px);
            font-weight: 400;
        }

        .item-price,
        .item-label {
            color: var(--muted);
            font-size: 12px;
        }

        .item-price {
            margin: 0;
            line-height: 1.6;
        }

        .item-label {
            display: block;
            margin: 24px 0 10px;
            letter-spacing: .12em;
            text-transform: uppercase;
        }

        .stock-info {
            margin: 0 0 14px;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.5;
        }

        .stock-info.stock-warning {
            color: #9b4939;
        }

        .quantity-control {
            display: inline-flex;
            align-items: center;
            border: 1px solid var(--line);
            vertical-align: middle;
        }

        .quantity-control button {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 42px;
            height: 42px;
            padding: 0;
            border: 0;
            background: transparent;
            cursor: pointer;
            font-size: 20px;
            transition: background .2s ease;
        }

        .quantity-control button:hover:not(:disabled) {
            background: rgba(23, 23, 21, .06);
        }

        .quantity-control button:disabled {
            opacity: .3;
            cursor: not-allowed;
        }

        .quantity-control span {
            min-width: 40px;
            text-align: center;
            font-size: 13px;
        }

        .remove-button {
            display: block;
            width: fit-content;
            margin-top: 18px;
            padding: 0;
            border: 0;
            background: transparent;
            color: var(--muted);
            font-size: 11px;
            line-height: 1.5;
            text-decoration: underline;
            text-underline-offset: 3px;
            cursor: pointer;
        }

        .remove-button:hover {
            color: var(--ink);
        }

        .item-subtotal {
            padding-top: 7px;
            font-size: 15px;
            font-weight: 600;
            white-space: nowrap;
            text-align: right;
        }

        .cart-summary {
            padding: 32px;
            border: 1px solid var(--line);
            background: var(--paper-light);
        }

        .summary-title {
            margin: 0 0 30px;
            font-family: Georgia, "Times New Roman", serif;
            font-size: 29px;
            font-weight: 400;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 22px;
            font-size: 13px;
        }

        .summary-row span:last-child {
            text-align: right;
        }

        .summary-muted {
            color: var(--muted);
        }

        .summary-divider {
            height: 1px;
            margin: 28px 0;
            background: var(--line);
        }

        .summary-total-label {
            margin: 0 0 10px;
            color: var(--muted);
            font-size: 11px;
            letter-spacing: .15em;
            text-transform: uppercase;
        }

        .summary-total {
            margin: 0 0 28px;
            font-family: Georgia, "Times New Roman", serif;
            font-size: clamp(28px, 3vw, 38px);
            overflow-wrap: anywhere;
        }

        .summary-button {
            width: 100%;
        }

        .summary-note {
            margin-top: 20px;
            color: var(--muted);
            font-size: 11px;
            line-height: 1.7;
        }

        .continue-shopping {
            display: inline-block;
            margin-top: 28px;
            padding-bottom: 5px;
            border-bottom: 1px solid var(--ink);
            font-size: 11px;
            letter-spacing: .12em;
            text-transform: uppercase;
        }

        .cart-feedback {
            margin-bottom: 24px;
            padding: 14px 18px;
            border: 1px solid #a45e4e;
            color: #8b4234;
            font-size: 13px;
        }

        .cart-feedback[hidden] {
            display: none;
        }

        .site-footer {
            padding: 40px 0;
            background: var(--paper-light);
            border-top: 1px solid var(--line);
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            color: var(--muted);
            font-size: 10px;
            letter-spacing: .2em;
            text-transform: uppercase;
        }

        @media (max-width: 1100px) {
            .cart-layout {
                grid-template-columns: minmax(0, 1fr) 320px;
                gap: 35px;
            }
        }

        @media (max-width: 1000px) {
            .cart-layout {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .cart-summary {
                width: 100%;
            }
        }

        @media (max-width: 900px) {
            .container {
                width: calc(100% - 36px);
            }

            .nav {
                grid-template-columns: 1fr auto;
            }

            .nav-left {
                display: none;
            }

            .brand {
                text-align: left;
            }
        }

        @media (max-width: 600px) {
            .nav {
                min-height: 76px;
                gap: 15px;
            }

            .nav-right {
                gap: 16px;
            }

            .brand-name {
                font-size: 18px;
                letter-spacing: .2em;
            }

            .brand-tagline {
                font-size: 6px;
            }

            .cart-section {
                padding: 65px 0 90px;
            }

            .cart-title {
                margin-bottom: 40px;
            }

            .cart-empty {
                padding: 65px 15px;
            }

            .cart-item {
                grid-template-columns: 1fr;
                gap: 22px;
                padding: 30px 0;
            }

            .item-subtotal {
                padding-top: 0;
                text-align: left;
                font-size: 17px;
            }

            .cart-summary {
                padding: 25px;
            }

            .footer-content {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

<header class="site-header">
    <div class="container nav">

        <nav class="nav-left" aria-label="Navegación principal">
            <a class="nav-link" href="{{ url('/#colecciones') }}">
                Colecciones
            </a>

            <a class="nav-link" href="{{ route('productos.index') }}">
                Productos
            </a>

            <a class="nav-link" href="{{ route('nosotros') }}">
                Nosotros
            </a>
        </nav>

        <a href="{{ url('/') }}" class="brand">
            <div class="brand-name">INTEOFFICE</div>
            <div class="brand-tagline">Espacios que inspiran</div>
        </a>

        <div class="nav-right">
            <a class="nav-link" href="{{ url('/') }}">
                Inicio
            </a>

            <a
                class="nav-link"
                href="{{ route('carrito.index') }}"
                aria-current="page"
            >
                Bag
            </a>
        </div>

    </div>
</header>

<main>
    <section class="cart-section">
        <div class="container">

            <span class="eyebrow">
                Tu selección / InteOffice
            </span>

            <h1 class="cart-title">
                Mi carrito.
            </h1>

            <div
                id="cart-feedback"
                class="cart-feedback"
                role="alert"
                hidden
            ></div>

            @if (count($productos) === 0)

                <div class="cart-empty">

                    <span class="eyebrow">
                        Tu espacio comienza aquí
                    </span>

                    <h2>Tu carrito está vacío.</h2>

                    <p>
                        Descubre piezas diseñadas para transformar
                        tus espacios de trabajo.
                    </p>

                    <a
                        href="{{ route('productos.index') }}"
                        class="button-dark"
                    >
                        Explorar productos
                    </a>

                </div>

            @else

                <div class="cart-layout">

                    <div>
                        <div class="cart-list">

                            @foreach ($productos as $producto)

                                @php
                                    $cantidad = (int) $producto['cantidad'];
                                    $stockDisponible = (int) ($producto['stock_disponible'] ?? 0);
                                    $productoId = (int) $producto['producto_id'];
                                    $excedeStock = $cantidad > $stockDisponible;
                                @endphp

                                <article class="cart-item">

                                    <div class="item-details">

                                        <h2 class="item-name">
                                            {{ $producto['nombre'] }}
                                        </h2>

                                        <p class="item-price">
                                            Precio unitario:
                                            ${{ number_format((float) $producto['precio'], 2) }}
                                            MXN
                                        </p>

                                        <span class="item-label">
                                            Cantidad
                                        </span>

                                        <p class="stock-info {{ $excedeStock ? 'stock-warning' : '' }}">

                                            @if ($stockDisponible === 0)
                                                Producto agotado o no disponible

                                            @elseif ($excedeStock)
                                                Solo quedan {{ $stockDisponible }} unidades disponibles.
                                                Ajusta la cantidad antes de comprar.

                                            @else
                                                Disponibles: {{ $stockDisponible }}
                                                {{ $stockDisponible === 1 ? 'unidad' : 'unidades' }}
                                            @endif

                                        </p>

                                        <div
                                            class="quantity-control"
                                            aria-label="Cantidad de {{ $producto['nombre'] }}"
                                        >

                                            <button
                                                type="button"
                                                aria-label="Disminuir cantidad"
                                                onclick="cambiarCantidad({{ $productoId }}, {{ $cantidad - 1 }})"
                                                @disabled($cantidad <= 1)
                                                title="Disminuir cantidad"
                                            >
                                                −
                                            </button>

                                            <span>
                                                {{ $cantidad }}
                                            </span>

                                            <button
                                                type="button"
                                                aria-label="Aumentar cantidad"
                                                onclick="cambiarCantidad({{ $productoId }}, {{ $cantidad + 1 }})"
                                                @disabled($cantidad >= $stockDisponible)
                                                title="{{ $cantidad >= $stockDisponible ? 'Has alcanzado el límite de existencias' : 'Agregar una unidad' }}"
                                            >
                                                +
                                            </button>

                                        </div>

                                        <button
                                            type="button"
                                            class="remove-button"
                                            onclick="eliminarProducto({{ $productoId }})"
                                        >
                                            Eliminar producto
                                        </button>

                                    </div>

                                    <div class="item-subtotal">
                                        ${{ number_format(
                                            (float) $producto['precio'] * $cantidad,
                                            2
                                        ) }}
                                        MXN
                                    </div>

                                </article>

                            @endforeach

                        </div>

                        <a
                            href="{{ route('productos.index') }}"
                            class="continue-shopping"
                        >
                            ← Seguir explorando
                        </a>
                    </div>

                    <aside class="cart-summary">

                        <h2 class="summary-title">
                            Resumen de compra
                        </h2>

                        <div class="summary-row">
                            <span>Artículos</span>
                            <span>
                                {{ collect($productos)->sum('cantidad') }}
                            </span>
                        </div>

                        <div class="summary-row">
                            <span>Subtotal</span>
                            <span>
                                ${{ number_format((float) $total, 2) }} MXN
                            </span>
                        </div>

                        <div class="summary-row summary-muted">
                            <span>Envío</span>
                            <span>Por calcular</span>
                        </div>

                        <div class="summary-divider"></div>

                        <p class="summary-total-label">
                            Total de productos
                        </p>

                        <p class="summary-total">
                            ${{ number_format((float) $total, 2) }}
                        </p>

                        <button
                            type="button"
                            class="button-dark summary-button"
                            disabled
                            title="El proceso de compra estará disponible próximamente"
                        >
                            Continuar compra
                        </button>

                        <p class="summary-note">
                            Los gastos de envío, si corresponden,
                            se calcularán durante el proceso de compra.
                            El pago en línea todavía no está habilitado.
                        </p>

                    </aside>

                </div>

            @endif

        </div>
    </section>
</main>

<footer class="site-footer">
    <div class="container footer-content">
        <span>© {{ date('Y') }} InteOffice</span>
        <span>Espacios que inspiran</span>
    </div>
</footer>

<script>
    const csrfToken = document.querySelector(
        'meta[name="csrf-token"]'
    ).getAttribute('content');

    const feedback = document.getElementById('cart-feedback');

    function mostrarError(mensaje) {
        feedback.textContent = mensaje;
        feedback.hidden = false;

        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    async function solicitarCarrito(url, metodo, datos = null) {
        const opciones = {
            method: metodo,
            credentials: 'same-origin',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            }
        };

        if (datos !== null) {
            opciones.headers['Content-Type'] = 'application/json';
            opciones.body = JSON.stringify(datos);
        }

        const respuesta = await fetch(url, opciones);
        const resultado = await respuesta.json();

        if (!respuesta.ok) {
            const primerError = resultado.errors
                ? Object.values(resultado.errors).flat()[0]
                : null;

            throw new Error(
                primerError ||
                resultado.message ||
                'No se pudo actualizar el carrito.'
            );
        }

        return resultado;
    }

    async function cambiarCantidad(productoId, cantidad) {
        feedback.hidden = true;

        if (cantidad < 1) {
            mostrarError(
                'La cantidad mínima es una unidad. Utiliza "Eliminar producto" para quitarlo.'
            );
            return;
        }

        try {
            await solicitarCarrito(
                `/carrito/${productoId}`,
                'PATCH',
                { cantidad }
            );

            window.location.reload();

        } catch (error) {
            mostrarError(error.message);
        }
    }

    async function eliminarProducto(productoId) {
        feedback.hidden = true;

        try {
            await solicitarCarrito(
                `/carrito/${productoId}`,
                'DELETE'
            );

            window.location.reload();

        } catch (error) {
            mostrarError(error.message);
        }
    }
</script>

</body>
</html>
