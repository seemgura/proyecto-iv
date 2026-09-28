<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Preguntas frecuentes | InteOffice</title>

    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link
        href="https://fonts.bunny.net/css?family=montserrat:400,500,600|playfair-display:400,500,600,400i,500i,600i&display=swap"
        rel="stylesheet"
    >

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --ink: #171715;
            --paper: #f2eee7;
            --paper-light: #f8f5ef;
            --muted: #777269;
            --line: #d8d0c4;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--paper-light);
            color: var(--ink);
            font-family: "Montserrat", sans-serif;
        }

        .faq-page {
            min-height: 100vh;
        }

        .faq-nav {
            min-height: 108px;
            padding: 0 7.5%;
            border-bottom: 1px solid var(--line);
            display: grid;
            grid-template-columns: 1fr auto 1fr;
            align-items: center;
            gap: 30px;
        }

        .faq-nav-left,
        .faq-nav-right {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .faq-nav-right {
            justify-content: flex-end;
        }

        .faq-nav a {
            color: var(--ink);
            text-decoration: none;
            font-size: 10px;
            letter-spacing: .18em;
            text-transform: uppercase;
        }

        .faq-brand {
            text-align: center;
        }

        .faq-brand strong {
            display: block;
            font-family: "Playfair Display", Georgia, serif;
            font-size: 27px;
            font-weight: 500;
            letter-spacing: .22em;
        }

        .faq-brand span {
            display: block;
            margin-top: 5px;
            color: var(--muted);
            font-size: 7px;
            letter-spacing: .35em;
            text-transform: uppercase;
        }

        .faq-hero {
            padding: 105px 7.5% 90px;
            background: var(--paper);
            border-bottom: 1px solid var(--line);
        }

        .faq-eyebrow {
            margin-bottom: 28px;
            color: var(--muted);
            font-size: 9px;
            letter-spacing: .35em;
            text-transform: uppercase;
        }

        .faq-hero h1 {
            max-width: 850px;
            margin: 0;
            font-family: "Playfair Display", Georgia, serif;
            font-size: clamp(54px, 7vw, 105px);
            line-height: .95;
            font-weight: 400;
            letter-spacing: -.04em;
        }

        .faq-hero h1 em {
            color: #91887d;
            font-weight: 400;
        }

        .faq-hero p {
            max-width: 620px;
            margin: 38px 0 0;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.8;
        }

        .faq-content {
            padding: 90px 7.5% 110px;
        }

        .faq-grid {
            display: grid;
            grid-template-columns: minmax(220px, .65fr) minmax(0, 1.35fr);
            gap: 90px;
        }

        .faq-intro span {
            display: block;
            margin-bottom: 22px;
            color: var(--muted);
            font-size: 9px;
            letter-spacing: .3em;
            text-transform: uppercase;
        }

        .faq-intro h2 {
            margin: 0;
            font-family: "Playfair Display", Georgia, serif;
            font-size: clamp(38px, 4vw, 60px);
            line-height: 1;
            font-weight: 400;
        }

        .faq-intro p {
            max-width: 360px;
            margin-top: 28px;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.8;
        }

        .faq-list {
            border-top: 1px solid var(--line);
        }

        .faq-item {
            border-bottom: 1px solid var(--line);
        }

        .faq-question {
            width: 100%;
            padding: 28px 0;
            border: 0;
            background: transparent;
            color: var(--ink);
            display: grid;
            grid-template-columns: 42px 1fr 24px;
            align-items: center;
            gap: 15px;
            text-align: left;
            cursor: pointer;
        }

        .faq-number {
            color: var(--muted);
            font-size: 9px;
            letter-spacing: .15em;
        }

        .faq-question-text {
            font-family: "Playfair Display", Georgia, serif;
            font-size: 24px;
            font-weight: 400;
        }

        .faq-icon {
            position: relative;
            width: 18px;
            height: 18px;
        }

        .faq-icon::before,
        .faq-icon::after {
            content: "";
            position: absolute;
            top: 8px;
            left: 2px;
            width: 14px;
            height: 1px;
            background: var(--ink);
            transition: transform .25s ease;
        }

        .faq-icon::after {
            transform: rotate(90deg);
        }

        .faq-item.is-open .faq-icon::after {
            transform: rotate(0deg);
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height .35s ease;
        }

        .faq-answer-inner {
            padding: 0 55px 30px 57px;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.8;
        }

        .faq-footer {
            padding: 34px 7.5%;
            border-top: 1px solid var(--line);
            display: flex;
            justify-content: space-between;
            gap: 30px;
            color: var(--muted);
            font-size: 8px;
            letter-spacing: .28em;
            text-transform: uppercase;
        }

        @media (max-width: 800px) {
            .faq-nav {
                grid-template-columns: 1fr auto;
            }

            .faq-nav-left {
                display: none;
            }

            .faq-brand {
                text-align: left;
            }

            .faq-grid {
                grid-template-columns: 1fr;
                gap: 55px;
            }

            .faq-question-text {
                font-size: 20px;
            }
        }

        @media (max-width: 600px) {
            .faq-nav {
                min-height: 90px;
                padding: 0 6%;
            }

            .faq-nav-right {
                gap: 16px;
            }

            .faq-nav-right a:not(:last-child) {
                display: none;
            }

            .faq-brand strong {
                font-size: 20px;
            }

            .faq-hero {
                padding: 75px 6% 65px;
            }

            .faq-content {
                padding: 65px 6% 80px;
            }

            .faq-question {
                grid-template-columns: 30px 1fr 20px;
                padding: 24px 0;
            }

            .faq-answer-inner {
                padding: 0 35px 26px 45px;
            }

            .faq-footer {
                padding: 28px 6%;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
<div class="faq-page">

    <header class="faq-nav">
        <nav class="faq-nav-left">
            <a href="{{ url('/') }}#colecciones">Colecciones</a>
            <a href="{{ url('/') }}#productos">Productos</a>
            <a href="{{ url('/nosotros') }}">Nosotros</a>
        </nav>

        <a href="{{ url('/') }}" class="faq-brand" style="text-decoration: none; color: inherit;">
            <strong>INTEOFFICE</strong>
            <span>Espacios que inspiran</span>
        </a>

        <nav class="faq-nav-right">
            @auth
                <a href="{{ url('/dashboard') }}">Panel</a>
            @else
                <a href="{{ route('login') }}">Cuenta</a>
            @endauth

            <a href="{{ url('/') }}">Inicio</a>
        </nav>
    </header>

    <main>
        <section class="faq-hero">
            <div class="faq-eyebrow">Servicio · Preguntas frecuentes</div>

            <h1>
                Respuestas para<br>
                <em>comprar mejor.</em>
            </h1>

            <p>
                Reunimos las dudas más frecuentes sobre productos, pedidos,
                entregas y atención para facilitar tu experiencia en InteOffice.
            </p>
        </section>

        <section class="faq-content">
            <div class="faq-grid">

                <div class="faq-intro">
                    <span>Información útil</span>

                    <h2>
                        Antes de<br>
                        elegir.
                    </h2>

                    <p>
                        Selecciona una pregunta para consultar la información
                        disponible. Si necesitas ayuda adicional, nuestro equipo
                        puede orientarte de manera personalizada.
                    </p>
                </div>

                <div class="faq-list">

                    <article class="faq-item">
                        <button class="faq-question" type="button" aria-expanded="false">
                            <span class="faq-number">01</span>
                            <span class="faq-question-text">¿Qué productos ofrece InteOffice?</span>
                            <span class="faq-icon" aria-hidden="true"></span>
                        </button>

                        <div class="faq-answer">
                            <div class="faq-answer-inner">
                                InteOffice está orientado a la selección de mobiliario
                                y accesorios para espacios de trabajo, incluyendo
                                escritorios, sillas y otros elementos destinados a
                                crear ambientes funcionales y contemporáneos.
                            </div>
                        </div>
                    </article>

                    <article class="faq-item">
                        <button class="faq-question" type="button" aria-expanded="false">
                            <span class="faq-number">02</span>
                            <span class="faq-question-text">¿Cómo puedo conocer la disponibilidad de un producto?</span>
                            <span class="faq-icon" aria-hidden="true"></span>
                        </button>

                        <div class="faq-answer">
                            <div class="faq-answer-inner">
                                La disponibilidad se mostrará dentro de la información
                                correspondiente a cada producto publicado en el catálogo.
                                Las existencias pueden variar de acuerdo con el artículo.
                            </div>
                        </div>
                    </article>

                    <article class="faq-item">
                        <button class="faq-question" type="button" aria-expanded="false">
                            <span class="faq-number">03</span>
                            <span class="faq-question-text">¿InteOffice realiza entregas?</span>
                            <span class="faq-icon" aria-hidden="true"></span>
                        </button>

                        <div class="faq-answer">
                            <div class="faq-answer-inner">
                                Sí. El proyecto contempla servicio de entrega para los
                                pedidos realizados mediante la plataforma. La cobertura
                                y los tiempos dependerán de la ubicación y de los
                                productos seleccionados.
                            </div>
                        </div>
                    </article>

                    <article class="faq-item">
                        <button class="faq-question" type="button" aria-expanded="false">
                            <span class="faq-number">04</span>
                            <span class="faq-question-text">¿Qué métodos de pago estarán disponibles?</span>
                            <span class="faq-icon" aria-hidden="true"></span>
                        </button>

                        <div class="faq-answer">
                            <div class="faq-answer-inner">
                                Las opciones de pago disponibles se presentarán durante
                                el proceso de compra. InteOffice contempla integrar
                                alternativas que permitan realizar las operaciones de
                                manera clara y segura.
                            </div>
                        </div>
                    </article>

                    <article class="faq-item">
                        <button class="faq-question" type="button" aria-expanded="false">
                            <span class="faq-number">05</span>
                            <span class="faq-question-text">¿Puedo solicitar cambios o devoluciones?</span>
                            <span class="faq-icon" aria-hidden="true"></span>
                        </button>

                        <div class="faq-answer">
                            <div class="faq-answer-inner">
                                Los cambios y devoluciones estarán sujetos a las
                                condiciones aplicables al producto y a las políticas
                                comerciales de InteOffice. La información correspondiente
                                se proporcionará al cliente durante el proceso de compra.
                            </div>
                        </div>
                    </article>

                    <article class="faq-item">
                        <button class="faq-question" type="button" aria-expanded="false">
                            <span class="faq-number">06</span>
                            <span class="faq-question-text">¿Dónde opera InteOffice?</span>
                            <span class="faq-icon" aria-hidden="true"></span>
                        </button>

                        <div class="faq-answer">
                            <div class="faq-answer-inner">
                                InteOffice opera mediante una plataforma digital y
                                contempla su operación comercial en Guadalajara,
                                Jalisco, México.
                            </div>
                        </div>
                    </article>

                    <article class="faq-item">
                        <button class="faq-question" type="button" aria-expanded="false">
                            <span class="faq-number">07</span>
                            <span class="faq-question-text">¿Cómo puedo recibir atención personalizada?</span>
                            <span class="faq-icon" aria-hidden="true"></span>
                        </button>

                        <div class="faq-answer">
                            <div class="faq-answer-inner">
                                Puedes utilizar los medios de contacto disponibles en
                                InteOffice para solicitar orientación sobre productos,
                                pedidos o cualquier otra duda relacionada con tu compra.
                            </div>
                        </div>
                    </article>

                </div>
            </div>
        </section>
    </main>

    <footer class="faq-footer">
        <span>© 2026 InteOffice</span>
        <span>Mobiliario · Diseño · Espacios</span>
    </footer>

</div>

<script>
    const faqItems = document.querySelectorAll('.faq-item');

    faqItems.forEach((item) => {
        const button = item.querySelector('.faq-question');
        const answer = item.querySelector('.faq-answer');

        button.addEventListener('click', () => {
            const isOpen = item.classList.contains('is-open');

            faqItems.forEach((otherItem) => {
                const otherButton = otherItem.querySelector('.faq-question');
                const otherAnswer = otherItem.querySelector('.faq-answer');

                otherItem.classList.remove('is-open');
                otherButton.setAttribute('aria-expanded', 'false');
                otherAnswer.style.maxHeight = null;
            });

            if (!isOpen) {
                item.classList.add('is-open');
                button.setAttribute('aria-expanded', 'true');
                answer.style.maxHeight = answer.scrollHeight + 'px';
            }
        });
    });
</script>

</body>
</html>