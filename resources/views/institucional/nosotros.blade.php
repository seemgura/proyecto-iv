<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nosotros | InteOffice</title>

    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link
        href="https://fonts.bunny.net/css?family=montserrat:400,500,600|playfair-display:400,500,600,400i,500i,600i&display=swap"
        rel="stylesheet"
    >

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div class="inteoffice-institutional">

        {{-- HERO --}}
        <section class="institutional-hero">
            <div class="institutional-hero-copy">
                <p class="institutional-label">INTEOFFICE · IDENTIDAD</p>

                <h1>
                    Espacios que
                    <em>inspiran.</em>
                </h1>

                <p class="institutional-intro">
                    Creamos soluciones de mobiliario contemporáneo que combinan
                    diseño, funcionalidad y confort para transformar los espacios
                    de trabajo en lugares que favorecen la creatividad y el bienestar.
                </p>
            </div>

            <div class="institutional-brand">
                <span>INTEOFFICE</span>
                <p>MOBILIARIO · DISEÑO · ESPACIOS</p>
            </div>
        </section>


        {{-- QUIÉNES SOMOS --}}
        <section class="about-section">

            <div class="about-heading">
                <p class="institutional-label">QUIÉNES SOMOS</p>

                <h2>
                    Diseño pensado para
                    <em>trabajar mejor.</em>
                </h2>
            </div>

            <div class="about-copy">
                <p>
                    InteOffice es una propuesta especializada en mobiliario y
                    accesorios para espacios de trabajo contemporáneos. Nuestro
                    objetivo es acercar a cada cliente productos que equilibren
                    estética, funcionalidad y comodidad, facilitando la creación
                    de oficinas, estudios y espacios profesionales que respondan
                    a las nuevas formas de trabajar.
                </p>

                <p>
                    A través de nuestra plataforma digital buscamos ofrecer una
                    experiencia de compra clara, accesible y confiable, en la que
                    el usuario pueda conocer, comparar y seleccionar mobiliario
                    de acuerdo con sus necesidades.
                </p>
            </div>

        </section>


        {{-- MISIÓN Y VISIÓN --}}
        <section class="mission-vision">

            <article>
                <p class="institutional-label">MISIÓN</p>

                <h2>Nuestra razón de ser.</h2>

                <p>
                    Proporcionar mobiliario y accesorios funcionales, estéticos
                    y de calidad que contribuyan a crear espacios de trabajo
                    cómodos, organizados e inspiradores, ofreciendo una experiencia
                    digital sencilla y cercana para nuestros clientes.
                </p>
            </article>

            <article>
                <p class="institutional-label">VISIÓN</p>

                <h2>Hacia dónde vamos.</h2>

                <p>
                    Consolidarnos como una marca reconocida en el mercado de
                    mobiliario contemporáneo para espacios de trabajo, destacando
                    por nuestra propuesta de diseño, atención al cliente y capacidad
                    para adaptarnos a las nuevas necesidades de los entornos
                    profesionales.
                </p>
            </article>

        </section>


        {{-- POLÍTICA DE CALIDAD --}}
        <section class="quality-section">

            <div>
                <p class="institutional-label">POLÍTICA DE CALIDAD</p>

                <h2>
                    Calidad en cada
                    <em>detalle.</em>
                </h2>
            </div>

            <div class="quality-copy">
                <p>
                    En InteOffice nos comprometemos a ofrecer productos y servicios
                    que respondan a las expectativas de nuestros clientes mediante
                    una selección responsable de mobiliario, información clara,
                    atención oportuna y procesos orientados a una experiencia de
                    compra confiable.
                </p>

                <p>
                    Buscamos mejorar continuamente nuestra plataforma y nuestros
                    procesos, manteniendo como principios la funcionalidad, el diseño,
                    la transparencia y la satisfacción del cliente.
                </p>
            </div>

        </section>


        {{-- UBICACIÓN --}}
        <section class="location-section">

            <div class="location-copy">
                <p class="institutional-label">UBICACIÓN</p>

                <h2>
                    Cerca de nuestros
                    <em>clientes.</em>
                </h2>

                <p>
                    InteOffice opera mediante una plataforma digital orientada a
                    facilitar la consulta y adquisición de mobiliario y accesorios.
                    El proyecto contempla su operación comercial en Guadalajara,
                    Jalisco, México.
                </p>
            </div>

            <div class="location-card">
                <p class="institutional-label">GUADALAJARA</p>

                <strong>Jalisco · México</strong>

                <p>
                    Atención y ventas mediante nuestra plataforma digital.
                </p>
            </div>

        </section>


        {{-- FOOTER --}}
        <footer class="institutional-footer">
            <span>INTEOFFICE</span>
            <p>ESPACIOS QUE INSPIRAN · 2026</p>
        </footer>

    </div>

</body>
</html>