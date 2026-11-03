
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto | InteOffice</title>

    <style>
        :root {
            --background: #f5f4ee;
            --text: #24231f;
            --muted: #77766f;
            --border: #dedbd2;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--background);
            color: var(--text);
            font-family: Arial, Helvetica, sans-serif;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .site-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 30px 7%;
            border-bottom: 1px solid var(--border);
        }

        .brand {
            font-family: Georgia, serif;
            font-size: 24px;
            letter-spacing: 0.2em;
        }

        .site-nav {
            display: flex;
            gap: 32px;
            font-size: 12px;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .contact-container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 95px 24px 110px;
        }

        .eyebrow {
            color: var(--muted);
            font-size: 11px;
            letter-spacing: 0.28em;
            text-transform: uppercase;
        }

        h1 {
            margin: 26px 0;
            font-family: Georgia, serif;
            font-size: clamp(48px, 7vw, 82px);
            font-weight: 400;
            line-height: 1.05;
        }

        .intro {
            max-width: 600px;
            color: var(--muted);
            font-size: 16px;
            line-height: 1.8;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: 0.8fr 1.2fr;
            gap: 75px;
            margin-top: 65px;
        }

        .contact-info {
            padding: 35px;
            background: #eeede6;
        }

        .contact-info h2 {
            margin: 0 0 25px;
            font-family: Georgia, serif;
            font-size: 30px;
            font-weight: 400;
        }

        .contact-info p {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.8;
        }

        .contact-info a {
            text-decoration: underline;
            text-underline-offset: 4px;
        }

        .contact-form {
            display: grid;
            gap: 25px;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        label {
            font-size: 11px;
            letter-spacing: 0.18em;
            text-transform: uppercase;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 15px 0;
            border: 0;
            border-bottom: 1px solid #bdbab1;
            border-radius: 0;
            background: transparent;
            color: var(--text);
            font: inherit;
            font-size: 15px;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-bottom-color: #24231f;
        }

        textarea {
            min-height: 140px;
            resize: vertical;
        }

        .submit-button {
            justify-self: start;
            padding: 18px 45px;
            border: 1px solid #24231f;
            background: #24231f;
            color: white;
            cursor: pointer;
            font-size: 11px;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            transition: background 0.2s ease;
        }

        .submit-button:hover {
            background: #49473f;
        }

        .form-note {
            color: var(--muted);
            font-size: 12px;
            line-height: 1.7;
        }


.form-success {
    padding: 18px 22px;
    margin-top: 30px;
    border: 1px solid #b8c9b6;
    background: #e9f0e7;
    color: #34543b;
    font-size: 14px;
    line-height: 1.7;
}

.form-errors {
    padding: 18px 22px;
    margin-top: 30px;
    border: 1px solid #d6b5b0;
    background: #f5e9e7;
    color: #853f36;
    font-size: 14px;
    line-height: 1.7;
}

.form-errors ul {
    margin: 10px 0 0;
    padding-left: 20px;
}

        @media (max-width: 750px) {
            .site-header {
                flex-direction: column;
                gap: 22px;
            }

            .site-nav {
                flex-wrap: wrap;
                justify-content: center;
                gap: 15px;
            }

            .contact-container {
                padding-top: 65px;
            }

            .contact-grid {
                grid-template-columns: 1fr;
                gap: 35px;
            }
        }
    </style>
</head>

<body>

<header class="site-header">
    <a href="{{ url('/') }}" class="brand">INTEOFFICE</a>

    <nav class="site-nav" aria-label="Navegación principal">
        <a href="{{ url('/') }}">Inicio</a>
        <a href="{{ route('productos.index') }}">Productos</a>
        <a href="{{ route('nosotros') }}">Nosotros</a>
        <a href="{{ route('ubicacion') }}">Ubicación</a>
    </nav>
</header>

<main class="contact-container">

    <span class="eyebrow">ESTAMOS PARA AYUDARTE</span>

    <h1>Hablemos de tu espacio.</h1>

   
<p class="intro">
    ¿Tienes alguna pregunta sobre nuestros productos o necesitas
    orientación para elegir el mobiliario adecuado?
    Envíanos un mensaje.
</p>

{{-- Confirmación de mensaje guardado --}}
@if (session('success'))
    <div class="form-success" role="status">
        {{ session('success') }}
    </div>
@endif

{{-- Errores de validación --}}
@if ($errors->any())
    <div class="form-errors" role="alert">
        <strong>Revisa los siguientes campos:</strong>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="contact-grid">


        <aside class="contact-info">
            <h2>Conversemos.</h2>

            <p>
                Nuestro equipo está disponible para recibir
                tus consultas sobre productos, pedidos
                y soluciones para espacios de trabajo.
            </p>

            <p>
                <strong>Ubicación de referencia</strong><br>
                The Landmark Guadalajara<br>
                Zapopan, Jalisco, México
            </p>

            <p>
                <a href="{{ route('ubicacion') }}">
                    Consultar ubicación ↗
                </a>
            </p>
        </aside>

        <form
            class="contact-form"
            action="{{ route('contacto.store') }}"
            method="POST"
        >
            @csrf

            <div class="field">
                <label for="nombre">Nombre completo</label>
                <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    value="{{ old('nombre') }}"
                    autocomplete="name"
                    maxlength="120"
                    required
                >
            </div>

            <div class="field">
                <label for="correo">Correo electrónico</label>
                <input
                    type="email"
                    id="correo"
                    name="correo"
                    value="{{ old('correo') }}"
                    autocomplete="email"
                    maxlength="255"
                    required
                >
            </div>

            <div class="field">
                <label for="asunto">Asunto</label>
                <select id="asunto" name="asunto" required>
                    <option value="">Selecciona una opción</option>
                    <option value="Productos" @selected(old('asunto') === 'Productos')>Información de productos</option>
                    <option value="Pedidos" @selected(old('asunto') === 'Pedidos')>Consulta sobre pedidos</option>
                    <option value="Asesoría" @selected(old('asunto') === 'Asesoría')>Asesoría de mobiliario</option>
                    <option value="Otro" @selected(old('asunto') === 'Otro')>Otro asunto</option>
                </select>
            </div>

            <div class="field">
                <label for="mensaje">Tu mensaje</label>
                <textarea
                    id="mensaje"
                    name="mensaje"
                    maxlength="3000"
                    required
                >{{ old('mensaje') }}</textarea>
            </div>

            <button type="submit" class="submit-button">
                Enviar mensaje ↗
            </button>

            <p class="form-note">
                Este formulario forma parte de la demostración académica
                de InteOffice. No compartas información sensible.
            </p>
        </form>

    </div>
</main>

</body>
</html>
