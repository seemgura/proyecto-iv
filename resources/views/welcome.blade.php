<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<title>InteOffice | Espacios que inspiran</title>

<link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}?v=2">
<link rel="shortcut icon" href="{{ asset('favicon.svg') }}?v=2">

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

        html {
            scroll-behavior: smooth;
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

        .serif {
            font-family: Georgia, "Times New Roman", serif;
        }

        .container {
            width: min(1400px, calc(100% - 80px));
            margin: 0 auto;
        }

        /* =========================================================
           HEADER
           ========================================================= */

        .site-header {
            position: sticky;
            top: 0;
            z-index: 50;
            background: rgba(244, 240, 232, .96);
            border-bottom: 1px solid var(--line);
            backdrop-filter: blur(12px);
        }

        .nav {
            height: 88px;
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
            transition: opacity .25s ease;
        }

        .nav-link:hover {
            opacity: .55;
        }

        .brand {
            text-align: center;
        }

        .brand-name {
            font-family: Georgia, "Times New Roman", serif;
            font-size: 25px;
            letter-spacing: .32em;
            line-height: 1;
        }

        .brand-tagline {
            margin-top: 8px;
            font-size: 8px;
            letter-spacing: .38em;
            color: var(--muted);
            text-transform: uppercase;
        }

        .icon-link {
            font-size: 17px;
            transition: opacity .25s ease;
        }

        .icon-link:hover {
            opacity: .55;
        }

        /* =========================================================
           HERO
           ========================================================= */

        .hero {
            min-height: calc(100vh - 88px);
            display: grid;
            grid-template-columns: 46% 54%;
            border-bottom: 1px solid var(--line);
        }

        .hero-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 90px max(60px, calc((100vw - 1400px) / 2));
            padding-right: 70px;
        }

        .eyebrow {
            font-size: 10px;
            letter-spacing: .4em;
            text-transform: uppercase;
            color: var(--muted);
        }

        .hero-title {
            margin: 28px 0 30px;
            max-width: 650px;
            font-size: clamp(62px, 6.5vw, 118px);
            font-weight: 400;
            line-height: .88;
            letter-spacing: -.055em;
        }

        .hero-title em {
            font-weight: 400;
        }

        .hero-description {
            max-width: 480px;
            color: #6f6a62;
            font-size: 15px;
            line-height: 1.8;
        }

        .hero-actions {
            margin-top: 48px;
            display: flex;
            align-items: center;
            gap: 32px;
        }

        .button-dark {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            min-width: 220px;
            min-height: 58px;
            padding: 0 30px;
            background: var(--ink);
            color: white;
            font-size: 10px;
            letter-spacing: .3em;
            text-transform: uppercase;
            transition: .25s ease;
        }

        .button-dark:hover {
            background: #383630;
        }

        .text-link {
            padding-bottom: 7px;
            border-bottom: 1px solid var(--ink);
            font-size: 10px;
            letter-spacing: .25em;
            text-transform: uppercase;
            transition: opacity .25s ease;
        }

        .text-link:hover {
            opacity: .55;
        }

        /* IMAGEN PRINCIPAL */

        .hero-visual {
            position: relative;
            min-height: 720px;
            overflow: hidden;
            background: #c8b9a6;
        }

        .hero-image {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: 55% center;
            display: block;
        }

        /*
         * Capa tonal muy discreta.
         * Ayuda a integrar la fotografía con la paleta
         * y mejora la lectura del texto inferior.
         */
        .hero-visual::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: 1;
            background: linear-gradient(
                180deg,
                rgba(23, 23, 21, .01) 0%,
                rgba(23, 23, 21, .03) 55%,
                rgba(23, 23, 21, .30) 100%
            );
            pointer-events: none;
        }

        .hero-visual::after {
            content: "01";
            position: absolute;
            z-index: 2;
            right: 38px;
            bottom: 35px;
            color: rgba(255, 255, 255, .85);
            font-size: 10px;
            letter-spacing: .35em;
        }

        .visual-copy {
            position: absolute;
            z-index: 2;
            left: 45px;
            bottom: 42px;
            color: white;
        }

        .visual-copy span {
            display: block;
            font-size: 9px;
            letter-spacing: .4em;
            text-transform: uppercase;
        }

        .visual-copy strong {
            display: block;
            margin-top: 10px;
            font-family: Georgia, "Times New Roman", serif;
            font-size: 29px;
            font-weight: 400;
        }

        /* =========================================================
           INTRO
           ========================================================= */

        .intro {
            padding: 130px 0;
            border-bottom: 1px solid var(--line);
        }

        .intro-grid {
            display: grid;
            grid-template-columns: 1fr 2.2fr;
            gap: 90px;
        }

        .intro-title {
            max-width: 900px;
            margin: 0;
            font-size: clamp(46px, 5vw, 82px);
            line-height: 1;
            font-weight: 400;
            letter-spacing: -.04em;
        }

        /* =========================================================
           SECCIONES
           ========================================================= */

        .section {
            padding: 110px 0;
            border-bottom: 1px solid var(--line);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 55px;
        }

        .section-number {
            font-size: 9px;
            letter-spacing: .3em;
            color: var(--muted);
        }

        .section-title {
            margin: 12px 0 0;
            font-size: 44px;
            font-weight: 400;
        }

        /* =========================================================
           CATEGORÍAS
           ========================================================= */

        .categories {
            border-top: 1px solid var(--line);
        }

        .category {
            display: grid;
            grid-template-columns: 80px 1fr auto;
            align-items: center;
            padding: 30px 0;
            border-bottom: 1px solid var(--line);
            transition:
                padding .25s ease,
                background .25s ease;
        }

        .category:hover {
            padding-left: 15px;
        }

        .category-number {
            color: var(--muted);
            font-size: 9px;
            letter-spacing: .2em;
        }

        .category-name {
            font-family: Georgia, "Times New Roman", serif;
            font-size: clamp(30px, 3vw, 52px);
        }

        .category-arrow {
            font-size: 22px;
        }

        /* =========================================================
   PRODUCTOS
   ========================================================= */

.products {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1px;
    background: var(--line);
    border: 1px solid var(--line);
}

.product {
    background: var(--paper);
}

.product-image {
    display: block;
    height: 430px;
    position: relative;
    overflow: hidden;
    background: #ddd5c9;
}

.product-image img {
    width: 100%;
    height: 100%;
    display: block;
    object-fit: cover;
    object-position: center;
    transition: transform .6s ease;
}

.product:hover .product-image img {
    transform: scale(1.025);
}

.product-placeholder {
    width: 100%;
    height: 100%;
    min-height: 430px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #e8e1d6;
}

.product-placeholder span {
    color: var(--muted);
    font-size: 9px;
    letter-spacing: .3em;
    text-transform: uppercase;
}

.product-info {
    padding: 28px;
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
}

.product-category {
    font-size: 8px;
    letter-spacing: .3em;
    color: var(--muted);
    text-transform: uppercase;
}

.product-name {
    display: block;
    margin-top: 10px;
    font-family: Georgia, "Times New Roman", serif;
    font-size: 25px;
    color: var(--ink);
    text-decoration: none;
}

.product-price {
    font-size: 12px;
    white-space: nowrap;
}

.products-empty {
    grid-column: 1 / -1;
    padding: 90px 40px;
    background: var(--paper);
    text-align: center;
}

.products-empty p {
    margin: 18px 0 0;
    color: var(--muted);
}

/* =========================================================
   MANIFIESTO
   ========================================================= */

.manifesto {
    padding: 160px 0;
    background: var(--ink);
    color: #f5f0e7;
}

.manifesto-grid {
    display: grid;
    grid-template-columns: 1fr 2.5fr;
    gap: 80px;
    align-items: start;
}

.manifesto-title {
    margin: 0;
    max-width: 900px;
    font-size: clamp(50px, 6vw, 95px);
    line-height: .98;
    font-weight: 400;
    letter-spacing: -.045em;
}

.manifesto-title em {
    color: #bdb4a8;
    font-weight: 400;
}


/* =========================================================
   FOOTER
   ========================================================= */

footer {
    padding: 80px 0 45px;
    background: var(--paper-light);
}

.footer-grid {
    display: grid;
    grid-template-columns: 2fr repeat(3, 1fr);
    gap: 70px;
    padding-bottom: 80px;
}

.footer-heading {
    margin-bottom: 22px;
    font-size: 9px;
    letter-spacing: .3em;
    color: var(--muted);
    text-transform: uppercase;
}

.footer-links {
    display: flex;
    flex-direction: column;
    gap: 13px;
    font-size: 13px;
}

.footer-links a {
    color: inherit;
    text-decoration: none;
    transition: opacity .25s ease;
}

.footer-links a:hover {
    opacity: .55;
}

.footer-bottom {
    padding-top: 25px;
    border-top: 1px solid var(--line);
    display: flex;
    justify-content: space-between;
    color: var(--muted);
    font-size: 9px;
    letter-spacing: .25em;
    text-transform: uppercase;
}

        /* =========================================================
           RESPONSIVE
           ========================================================= */

        @media (max-width: 900px) {

            .container {
                width: min(100% - 36px, 1400px);
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

            .nav-right .nav-link {
                display: none;
            }

            .hero {
                grid-template-columns: 1fr;
            }

            .hero-content {
                padding: 80px 28px;
            }

            .hero-visual {
                min-height: 500px;
            }

            .intro-grid,
            .manifesto-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .products {
                grid-template-columns: 1fr;
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 600px) {

            .nav {
                height: 76px;
            }

            .brand-name {
                font-size: 18px;
            }

            .brand-tagline {
                font-size: 6px;
            }

            .nav-right {
                gap: 15px;
            }

            .hero-title {
                font-size: clamp(58px, 18vw, 82px);
            }

            .hero-actions {
                align-items: flex-start;
                flex-direction: column;
            }

            .hero-visual {
                min-height: 480px;
            }

            .visual-copy {
                left: 24px;
                bottom: 28px;
            }

            .hero-visual::after {
                right: 24px;
                bottom: 28px;
            }

            .intro,
            .section {
                padding: 80px 0;
            }

            .section-header {
                align-items: flex-start;
                flex-direction: column;
                gap: 25px;
            }

            .category {
                grid-template-columns: 50px 1fr auto;
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }

            .footer-bottom {
                flex-direction: column;
                gap: 15px;
            }
        }
    </style>
</head>

<body>

<header class="site-header">
    <div class="container nav">

        <nav class="nav-left">
            <a class="nav-link" href="#colecciones">
                Colecciones
            </a>

            <a class="nav-link" href="#productos">
                Productos
            </a>

            <a class="nav-link" href="{{ route('nosotros') }}">
    Nosotros
</a>
        </nav>

        <a href="{{ url('/') }}" class="brand">
            <div class="brand-name">
                INTEOFFICE
            </div>

            <div class="brand-tagline">
                Espacios que inspiran
            </div>
        </a>

        <div class="nav-right">

            @auth
                <a
                    class="nav-link"
                    href="{{ route('dashboard') }}"
                >
                    Panel
                </a>
            @else
                <a
                    class="nav-link"
                    href="{{ route('login') }}"
                >
                    Cuenta
                </a>
            @endauth

            <a
                class="icon-link"
                href="#"
                aria-label="Buscar"
            >
                ⌕
            </a>

            <a
                class="icon-link"
                href="#"
                aria-label="Carrito"
            >
                Bag
            </a>

        </div>

    </div>
</header>


<main>

    <!-- =========================================================
         HERO
         ========================================================= -->

    <section class="hero">

        <div class="hero-content">

            <span class="eyebrow">
                Nueva colección · 2026
            </span>

            <h1 class="hero-title serif">
                Espacios<br>
                para <em>crear.</em>
            </h1>

            <p class="hero-description">
                Mobiliario contemporáneo pensado para transformar la forma
                en que trabajamos, creamos y habitamos nuestros espacios.
            </p>

            <div class="hero-actions">

                <a
                    href="#productos"
                    class="button-dark"
                >
                    Explorar colección
                </a>

                <a
                    href="#nosotros"
                    class="text-link"
                >
                    Nuestra filosofía
                </a>

            </div>

        </div>


        <!-- Imagen principal -->

        <div class="hero-visual">

            <img
                src="{{ asset('images/home/hero.jpg') }}"
                alt="Mobiliario contemporáneo InteOffice"
                class="hero-image"
            >

            <div class="visual-copy">
                <span>
                    Colección 01
                </span>

                <strong>
                    Líneas esenciales
                </strong>
            </div>

        </div>

    </section>


    <!-- =========================================================
         INTRODUCCIÓN DE MARCA
         ========================================================= -->

    <section
        class="intro"
        id="nosotros"
    >
        <div class="container intro-grid">

            <div>
                <span class="eyebrow">
                    InteOffice
                </span>
            </div>

            <h2 class="intro-title serif">
                Diseñamos espacios que trabajan contigo,
                no contra ti.
            </h2>

        </div>
    </section>


    <!-- =========================================================
         COLECCIONES
         ========================================================= -->

    <section
        class="section"
        id="colecciones"
    >
        <div class="container">

            <div class="section-header">

                <div>
                    <span class="section-number">
                        01
                    </span>

                    <h2 class="section-title serif">
                        Colecciones
                    </h2>
                </div>

                <span class="eyebrow">
                    Explora por categoría
                </span>

            </div>


            <div class="categories">

                <a href="#" class="category">
                    <span class="category-number">
                        01
                    </span>

                    <span class="category-name">
                        Escritorios
                    </span>

                    <span class="category-arrow">
                        →
                    </span>
                </a>


                <a href="#" class="category">
                    <span class="category-number">
                        02
                    </span>

                    <span class="category-name">
                        Sillas
                    </span>

                    <span class="category-arrow">
                        →
                    </span>
                </a>


                <a href="#" class="category">
                    <span class="category-number">
                        03
                    </span>

                    <span class="category-name">
                        Almacenamiento
                    </span>

                    <span class="category-arrow">
                        →
                    </span>
                </a>


                <a href="#" class="category">
                    <span class="category-number">
                        04
                    </span>

                    <span class="category-name">
                        Iluminación
                    </span>

                    <span class="category-arrow">
                        →
                    </span>
                </a>


                <a href="#" class="category">
                    <span class="category-number">
                        05
                    </span>

                    <span class="category-name">
                        Accesorios
                    </span>

                    <span class="category-arrow">
                        →
                    </span>
                </a>

            </div>

        </div>
    </section>


    <!-- =========================================================
         PRODUCTOS DESTACADOS
         ========================================================= -->

    <section
        class="section"
        id="productos"
    >
        <div class="container">

            <div class="section-header">

                <div>
                    <span class="section-number">
                        02
                    </span>

                    <h2 class="section-title serif">
                        Selección InteOffice
                    </h2>
                </div>

                <a href="#" class="text-link">
                    Ver todos
                </a>

            </div>


        <div class="products">

    @forelse ($productosDestacados as $producto)

        <article class="product">

            <a href="{{ route('productos.show', $producto) }}" class="product-image">
                @if ($producto->imagen)
                    <img
                        src="{{ asset('storage/' . $producto->imagen) }}"
                        alt="{{ $producto->nombre }}"
                    >
                @else
                    <div class="product-placeholder">
                        <span>Sin imagen</span>
                    </div>
                @endif
            </a>

            <div class="product-info">

                <div>
                    <div class="product-category">
                        {{ $producto->categoria }}
                    </div>

                    <a
                        href="{{ route('productos.show', $producto) }}"
                        class="product-name"
                    >
                        {{ $producto->nombre }}
                    </a>
                </div>

                <div class="product-price">
                    ${{ number_format($producto->precio, 2) }}
                </div>

            </div>

        </article>

    @empty

        <div class="products-empty">
            <span class="eyebrow">Colección InteOffice</span>

            <p>
                Próximamente encontrarás aquí nuestra selección de mobiliario.
            </p>
        </div>

    @endforelse

</div>

        </div>
    </section>


    <!-- =========================================================
         MANIFIESTO
         ========================================================= -->

    <section class="manifesto">

        <div class="container manifesto-grid">

            <span class="eyebrow">
                Nuestra filosofía
            </span>

            <h2 class="manifesto-title serif">
                Menos ruido.<br>
                Más intención.<br>
                <em>Mejores espacios.</em>
            </h2>

        </div>

    </section>

</main>


<!-- =============================================================
     FOOTER
     ============================================================= -->

<footer>

    <div class="container">

        <div class="footer-grid">

            <!-- Marca -->

            <div>

                <div class="brand-name">
                    INTEOFFICE
                </div>

                <div class="brand-tagline">
                    Espacios que inspiran
                </div>

            </div>


            <!-- Explorar -->

            <div>

                <div class="footer-heading">
                    Explorar
                </div>

                <div class="footer-links">

                    <a href="#productos">
                        Productos
                    </a>

                    <a href="#colecciones">
                        Colecciones
                    </a>

                    <a href="{{ route('nosotros') }}">
    Nosotros
</a>

                </div>

            </div>


            <!-- Servicio -->

            <div>

                <div class="footer-heading">
                    Servicio
                </div>

                <div class="footer-links">

                    <a href="#">
                        Envíos
                    </a>

                    <a href="#">
                        Preguntas frecuentes
                    </a>

                    <a href="#">
                        Contacto
                    </a>

                </div>

            </div>


            <!-- Cuenta -->

            <div>

                <div class="footer-heading">
                    Cuenta
                </div>

                <div class="footer-links">

                    @auth

                        <a href="{{ route('dashboard') }}">
                            Panel
                        </a>

                    @else

                        <a href="{{ route('login') }}">
                            Iniciar sesión
                        </a>

                        @if (Route::has('register'))

                            <a href="{{ route('register') }}">
                                Crear cuenta
                            </a>

                        @endif

                    @endauth

                </div>

            </div>

        </div>


        <div class="footer-bottom">

            <span>
                © {{ date('Y') }} InteOffice
            </span>

            <span>
                Mobiliario · Diseño · Espacios
            </span>

        </div>

    </div>

</footer>

</body>
</html>