
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubicación | InteOffice</title>

    <style>
        :root {
            --fondo: #f5f4ed;
            --texto: #252521;
            --secundario: #77776e;
            --borde: #deded4;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--fondo);
            color: var(--texto);
            font-family: Arial, Helvetica, sans-serif;
        }

        header {
            padding: 28px 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--borde);
        }

        .marca {
            font-family: Georgia, serif;
            font-size: 23px;
            letter-spacing: 5px;
            text-decoration: none;
            color: var(--texto);
        }

        nav a {
            color: var(--texto);
            text-decoration: none;
            margin-left: 25px;
            font-size: 12px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 90px 7%;
        }

        .etiqueta {
            font-size: 11px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--secundario);
        }

        h1 {
            font-family: Georgia, serif;
            font-size: clamp(42px, 6vw, 76px);
            font-weight: 400;
            margin: 20px 0;
        }

        .descripcion {
            max-width: 600px;
            line-height: 1.8;
            color: var(--secundario);
            margin-bottom: 50px;
        }

        .contenido {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 45px;
            align-items: start;
        }

        .datos {
            padding: 35px;
            background: #eeede5;
        }

        .datos h2 {
            font-family: Georgia, serif;
            font-size: 29px;
            font-weight: 400;
        }

        .datos p {
            line-height: 1.8;
            color: var(--secundario);
        }

        .boton {
            display: inline-block;
            margin-top: 22px;
            padding: 16px 25px;
            background: var(--texto);
            color: white;
            text-decoration: none;
            font-size: 11px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .mapa {
            width: 100%;
            min-height: 420px;
            border: 0;
            filter: grayscale(0.5);
        }

        .aviso {
            margin-top: 25px;
            font-size: 12px;
            line-height: 1.7;
            color: var(--secundario);
        }

        footer {
            padding: 30px 7%;
            border-top: 1px solid var(--borde);
            font-size: 12px;
            color: var(--secundario);
        }

        @media (max-width: 760px) {
            header {
                flex-direction: column;
                gap: 20px;
            }

            nav a {
                margin: 0 10px;
            }

            main {
                padding-top: 55px;
            }

            .contenido {
                grid-template-columns: 1fr;
            }

            .mapa {
                min-height: 350px;
            }
        }
    </style>
</head>

<body>
    <header>
        <a class="marca" href="{{ route('nosotros') }}">
            INTEOFFICE
        </a>

        <nav aria-label="Navegación principal">
            <a href="{{ url('/') }}">Inicio</a>
            <a href="{{ route('productos.index') }}">Productos</a>
            <a href="{{ route('nosotros') }}">Nosotros</a>
            <a href="{{ route('contacto') }}">Contacto</a>
        </nav>
    </header>

    <main>
        <span class="etiqueta">Encuéntranos</span>

        <h1>Nuestra ubicación.</h1>

        <p class="descripcion">
            Descubre nuestra ubicación de referencia en una de
            las zonas comerciales más representativas de Zapopan,
            Jalisco.
        </p>

        <section class="contenido" aria-label="Información de ubicación">
            <div class="datos">
                <span class="etiqueta">Ubicación de referencia</span>

                <h2>The Landmark Guadalajara</h2>

                <p>
                    Paseo de los Virreyes 45<br>
                    Puerta de Hierro<br>
                    Zapopan, Jalisco, C. P. 45116<br>
                    México
                </p>

                <a
                    class="boton"
                    href="https://www.google.com/maps/search/?api=1&amp;query=The%20Landmark%20Guadalajara%20Zapopan"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    Cómo llegar
                </a>
            </div>

            <iframe
                class="mapa"
                title="Mapa de The Landmark Guadalajara, Zapopan"
                src="https://www.google.com/maps?q=The%20Landmark%20Guadalajara%20Zapopan&amp;output=embed"
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                allowfullscreen
            ></iframe>
        </section>

        <p class="aviso">
            Esta ubicación se utiliza únicamente como referencia
            demostrativa para el proyecto académico InteOffice.
            No representa una sucursal física abierta al público.
        </p>
    </main>

    <footer>
        &copy; {{ date('Y') }} InteOffice.
        Proyecto académico de desarrollo web.
    </footer>
</body>
</html>
