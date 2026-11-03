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
            min-height: 650px;
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
            min-height: 650px;
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
        .hero-slide {
    opacity: 0;
    transition: opacity 1.2s ease-in-out;
}
.hero-slide.active {
    opacity: 1;
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
        .hero-counter {
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
   COLECCIONES EDITORIALES
   ========================================================= */
.collections-section {
    padding-top: 65px;
    padding-bottom: 70px;
}
.collections-section .section-header {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 30px;
    margin-bottom: 35px;
}

.collections-intro {
    max-width: 390px;
    margin: 0;
    padding: 5px 0 5px 24px;
    border-left: 2px solid #9b8066;

    color: #514b45;
    font-family: Georgia, "Times New Roman", serif;
    font-size: clamp(18px, 1.6vw, 24px);
    font-weight: 400;
    line-height: 1.45;
    letter-spacing: -0.02em;
}

.collections-intro em {
    color: #96765a;
    font-style: italic;
}
.collections-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 14px;
}
.collection-card {
    position: relative;
    display: block;
    min-width: 0;
    height: 270px;
    overflow: hidden;
    background: #ded9cf;
    color: #fff;
    text-decoration: none;
    isolation: isolate;
}
.collection-featured {
    grid-column: span 2;
}
.collection-image {
    position: absolute;
    inset: 0;
}
.collection-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform .65s ease;
}
.collection-card::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0, 0, 0, .65), rgba(0, 0, 0, .04) 70%);
    z-index: 0;
}
.collection-info {
    position: absolute;
    inset: auto 0 0;
    z-index: 1;
    padding: 24px;
}
.collection-index {
    font-size: 9px;
    letter-spacing: .2em;
    text-transform: uppercase;
}
.collection-bottom {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    margin-top: 10px;
}
.collection-bottom h3 {
    margin: 0;
    font-family: Georgia, "Times New Roman", serif;
    font-size: clamp(24px, 2.6vw, 37px);
    font-weight: 400;
}
.collection-arrow {
    display: grid;
    place-items: center;
    width: 35px;
    height: 35px;
    flex-shrink: 0;
    border: 1px solid rgba(255, 255, 255, .65);
    border-radius: 50%;
    font-size: 17px;
    transition: background .25s ease, color .25s ease;
}
.collection-card:hover .collection-image img {
    transform: scale(1.055);
}
.collection-card:hover .collection-arrow {
    background: #fff;
    color: #171717;
}
.collection-card:focus-visible {
    outline: 3px solid #171717;
    outline-offset: 3px;
}
.collections-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    margin-top: 28px;
    padding-top: 18px;
    border-top: 1px solid var(--line);
}
.collections-footer > span {
    color: var(--muted);
    font-size: 9px;
    letter-spacing: .2em;
}
.collections-footer a {
    color: inherit;
    font-size: 11px;
    letter-spacing: .08em;
    text-decoration: none;
    border-bottom: 1px solid currentColor;
    padding-bottom: 5px;
}
@media (max-width: 900px) {
    .collections-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
    .collection-featured {
        grid-column: span 2;
    }
}
@media (max-width: 600px) {
    .collections-section {
        padding-top: 45px;
        padding-bottom: 50px;
    }
    .collections-section .section-header {
        align-items: flex-start;
        flex-direction: column;
        gap: 12px;
    }
    .collections-grid {
        grid-template-columns: 1fr;
        gap: 12px;
    }
    .collection-featured {
        grid-column: auto;
    }
    .collection-card {
        height: 245px;
    }
    .collections-footer {
        align-items: flex-start;
        flex-direction: column;
    }
}
@media (prefers-reduced-motion: reduce) {
    .collection-image img,
    .collection-arrow {
        transition: none;
    }
    .collection-card:hover .collection-image img {
        transform: none;
    }
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
.footer-social {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 18px;
}
.footer-social span {
    color: var(--muted);
}
.footer-social a {
    color: inherit;
    text-decoration: none;
    transition: opacity .2s ease;
}
.footer-social a:hover {
    opacity: .5;
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

            .footer-grid {
                grid-template-columns: 1fr;
            }
            .footer-bottom {
                flex-direction: column;
                gap: 15px;
            }
            }
/* =========================================================
   CHAT INTEOFFICE
   ========================================================= */
.chat-launcher {
    position: fixed;
    right: 28px;
    bottom: 28px;
    z-index: 100;
    width: 58px;
    height: 58px;
    border: 0;
    border-radius: 50%;
    background: var(--ink);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    box-shadow: 0 12px 35px rgba(23, 23, 21, .18);
    transition: transform .25s ease, background .25s ease;
}
.chat-launcher:hover {
    transform: translateY(-3px);
    background: #383630;
}
.chat-launcher svg {
    width: 22px;
    height: 22px;
}
.chat-panel {
    position: fixed;
    right: 28px;
    bottom: 100px;
    z-index: 100;
    width: min(380px, calc(100vw - 40px));
    background: var(--paper-light);
    border: 1px solid var(--line);
    box-shadow: 0 20px 60px rgba(23, 23, 21, .16);
    opacity: 0;
    visibility: hidden;
    transform: translateY(15px);
    transition: opacity .25s ease,
                transform .25s ease,
                visibility .25s ease;
}
.chat-panel.is-open {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}
.chat-header {
    padding: 24px;
    background: var(--ink);
    color: #fff;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
}
.chat-header-copy span {
    display: block;
    margin-bottom: 7px;
    font-size: 8px;
    letter-spacing: .32em;
    text-transform: uppercase;
    color: #bdb4a8;
}
.chat-header-copy strong {
    font-family: Georgia, "Times New Roman", serif;
    font-size: 24px;
    font-weight: 400;
}
.chat-close {
    border: 0;
    background: transparent;
    color: #fff;
    font-size: 22px;
    line-height: 1;
    cursor: pointer;
}
.chat-messages {
    height: 300px;
    padding: 24px;
    overflow-y: auto;
    display: flex;
    flex-direction: column;
    gap: 14px;
}
.chat-message {
    max-width: 85%;
    padding: 13px 15px;
    font-size: 13px;
    line-height: 1.55;
}
.chat-message.bot {
    align-self: flex-start;
    background: #e9e3d9;
}
.chat-message.user {
    align-self: flex-end;
    background: var(--ink);
    color: #fff;
}
.chat-form {
    padding: 18px;
    border-top: 1px solid var(--line);
    display: grid;
    grid-template-columns: 1fr auto;
    gap: 10px;
}
.chat-input {
    min-width: 0;
    padding: 13px 14px;
    border: 1px solid var(--line);
    background: #fff;
    color: var(--ink);
    outline: none;
    font: inherit;
    font-size: 13px;
}
.chat-input:focus {
    border-color: var(--ink);
}
.chat-send {
    border: 0;
    padding: 0 18px;
    background: var(--ink);
    color: #fff;
    cursor: pointer;
    font-size: 9px;
    letter-spacing: .18em;
    text-transform: uppercase;
}
@media (max-width: 600px) {
    .chat-launcher {
        right: 18px;
        bottom: 18px;
    }
    .chat-panel {
        right: 18px;
        bottom: 88px;
        width: calc(100vw - 36px);
    }
}
/* ==========================================
   INSPIRACIÓN: GALERÍA DE IMÁGENES Y VIDEOS
   ========================================== */ 
   /* Sección Inspiración */
.inspiracion {
    padding: 100px 0;
    background-color: #f4f0ea;
}
.inspiracion-encabezado {
    margin-bottom: 48px;
}
.inspiracion-etiqueta {
    display: block;
    margin-bottom: 20px;
    font-size: 11px;
    font-weight: 500;
    letter-spacing: 0.3em;
    text-transform: uppercase;
    color: #8a8178;
}
.inspiracion-titulo {
    margin: 0 0 20px;
    font-size: clamp(36px, 5vw, 64px);
    font-weight: 400;
    line-height: 1.1;
    color: #191919;
}
.inspiracion-descripcion {
    max-width: 560px;
    font-size: 16px;
    line-height: 1.8;
    color: #66615b;
}   
/* Galería de imágenes */
.inspiracion-galeria {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 20px;
    margin-bottom: 64px;
}
.inspiracion-imagen {
    position: relative;
    overflow: hidden;
    aspect-ratio: 4 / 5;
    background-color: #e5dfd6;
}
.inspiracion-imagen img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
}
.inspiracion-imagen:hover img {
    transform: scale(1.05);
}
/* Adaptación a tabletas y teléfonos */
@media (max-width: 768px) {
    .inspiracion {
        padding: 64px 0;
    }
    .inspiracion-galeria {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 12px;
    }
}
@media (max-width: 480px) {
    .inspiracion-galeria {
        grid-template-columns: 1fr;
    }
}
/* Visor de imágenes (Lightbox) */
.inspiracion-lightbox:not([hidden]) {
    position: fixed;
    inset: 0;
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 60px 24px;
    background: rgba(0, 0, 0, 0.92);
}
.inspiracion-lightbox[hidden] {
    display: none;
}
.inspiracion-lightbox-imagen {
    display: block;
    max-width: 100%;
    max-height: 85vh;
    width: auto;
    height: auto;
    object-fit: contain;
}
.inspiracion-lightbox-cerrar {
    position: absolute;
    top: 20px;
    right: 30px;
    z-index: 1;
    padding: 8px 14px;
    border: none;
    background: transparent;
    color: #ffffff;
    font-size: 40px;
    line-height: 1;
    cursor: pointer;
}
.inspiracion-lightbox-cerrar:hover {
    opacity: 0.7;
}
.inspiracion-lightbox-cerrar:focus-visible {
    outline: 2px solid #ffffff;
    outline-offset: 4px;
}
@media (max-width: 480px) {
    .inspiracion-lightbox:not([hidden]) {
        padding: 60px 16px;
    }
    .inspiracion-lightbox-cerrar {
        top: 12px;
        right: 12px;
    }
}
/* Videos de inspiración */
.inspiracion-videos {
    margin-top: 90px;
}
.inspiracion-videos-encabezado {
    margin-bottom: 32px;
}
.inspiracion-videos-encabezado h3 {
    margin: 14px 0 0;
    font-size: clamp(30px, 4vw, 48px);
    font-weight: 400;
    line-height: 1.15;
}
.inspiracion-videos-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 24px;
}
.inspiracion-video {
    position: relative;
    width: 100%;
    aspect-ratio: 16 / 9;
    overflow: hidden;
    background: #1a1a1a;
}
.inspiracion-video iframe {
    display: block;
    width: 100%;
    height: 100%;
    border: 0;
}
@media (max-width: 768px) {
    .inspiracion-videos {
        margin-top: 60px;
    }
    .inspiracion-videos-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
}
    /* Animación de entrada para tarjetas de productos */
@keyframes aparecerProducto {
    from {
        opacity: 0;
        transform: translateY(80px) scale(0.94);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}
.product.animar-entrada {
animation: aparecerProducto 1.4s ease-out both;
}
/* Respetar las preferencias de movimiento del usuario */
@media (prefers-reduced-motion: reduce) {
    .product.animar-entrada {
        animation: none;
    }
}
    </style>

</head>

<body>


<header class="site-header">
    <div class="container nav">

        <nav class="nav-left" aria-label="Navegación principal">
            <a class="nav-link" href="#colecciones">
                Colecciones
            </a>

            <a class="nav-link" href="{{ route('productos.index') }}">
                Tienda
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
                    Mi cuenta
                </a>
            @else
                <a
                    class="nav-link"
                    href="{{ route('login') }}"
                >
                    Iniciar sesión
                </a>
            @endauth

            <a
                class="icon-link"
                href="{{ route('carrito.index') }}"
                aria-label="Ver carrito de compras"
                title="Ver carrito"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="22"
                    height="22"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.6"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    aria-hidden="true"
                >
                    <rect
                        x="4"
                        y="7"
                        width="16"
                        height="14"
                        rx="2"
                    />
                    <path d="M9 9V6a3 3 0 0 1 6 0v3" />
                </svg>
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
        alt="Oficina contemporánea InteOffice"
        class="hero-image hero-slide active"
    >

    <img
        src="{{ asset('images/home/hero-02.jpg') }}"
        alt="Espacio de trabajo cálido InteOffice"
        class="hero-image hero-slide"
    >

    <img
        src="{{ asset('images/home/hero-03.jpg') }}"
        alt="Oficina moderna InteOffice"
        class="hero-image hero-slide"
    >

    <div class="visual-copy">
    <span id="heroCollection">Colección 01</span>
    <strong id="heroTitle">Líneas esenciales</strong>
</div>

<div class="hero-counter" id="heroCounter">01</div>

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

    

<section class="section collections-section" id="colecciones">
    <div class="container">

        <div class="section-header">
            <div>
                <span class="section-number">01 / EXPLORAR</span>

                <h2 class="section-title serif">
                    Colecciones
                </h2>
            </div>

            
<p class="collections-intro">
    Piezas seleccionadas para
    <em>transformar</em> cada espacio
    de trabajo.
</p>

        </div>

        <div class="collections-grid">

            <!-- 01. ESCRITORIOS -->
            <a href="{{ route('productos.index') }}?categoria=escritorios"
               class="collection-card collection-featured">
                <div class="collection-image">
                    <img
                        src="{{ asset('images/productos/escritorio-nordico-02.png') }}"
                        alt="Escritorio Nórdico 02 de diseño contemporáneo"
                        loading="lazy"
                    >
                </div>

                <div class="collection-info">

                    <div class="collection-bottom">
                        <h3>Escritorios</h3>
                        <span class="collection-arrow" aria-hidden="true">↗</span>
                    </div>
                </div>
            </a>

            <!-- 02. SILLAS -->
            <a href="{{ route('productos.index') }}?categoria=sillas"
               class="collection-card">
                <div class="collection-image">
                    <img
                        src="{{ asset('images/productos/silla-ejecutiva-01.png') }}"
                        alt="Silla Ejecutiva 01 para espacios de trabajo"
                        loading="lazy"
                    >
                </div>

                <div class="collection-info">
                    <div class="collection-bottom">
                        <h3>Sillas</h3>
                        <span class="collection-arrow" aria-hidden="true">↗</span>
                    </div>
                </div>
            </a>

            <!-- 03. ALMACENAMIENTO -->
            <a href="{{ route('productos.index') }}?categoria=almacenamiento"
               class="collection-card">
                <div class="collection-image">
                    <img
                        src="{{ asset('images/productos/credenza-nogal-01.png') }}"
                        alt="Credenza Nogal 01 para almacenamiento de oficina"
                        loading="lazy"
                    >
                </div>

                <div class="collection-info">
                    <div class="collection-bottom">
                        <h3>Almacenamiento</h3>
                        <span class="collection-arrow" aria-hidden="true">↗</span>
                    </div>
                </div>
            </a>

            <!-- 04. ILUMINACIÓN -->
            <a href="{{ route('productos.index') }}?categoria=iluminacion"
               class="collection-card">
                <div class="collection-image">
                    <img
                        src="{{ asset('images/productos/lampara-lineal-01.png') }}"
                        alt="Lámpara Lineal 01 de diseño minimalista"
                        loading="lazy"
                    >
                </div>

                <div class="collection-info">
                    <div class="collection-bottom">
                        <h3>Iluminación</h3>
                        <span class="collection-arrow" aria-hidden="true">↗</span>
                    </div>
                </div>
            </a>

            <!-- 05. ACCESORIOS -->
            <a href="{{ route('productos.index') }}?categoria=accesorios"
               class="collection-card">
                <div class="collection-image">
                    <img
                        src="{{ asset('images/productos/organizador-nogal-01.png') }}"
                        alt="Organizador Nogal 01 para escritorio"
                        loading="lazy"
                    >
                </div>

                <div class="collection-info">
                    <div class="collection-bottom">
                        <h3>Accesorios</h3>
                        <span class="collection-arrow" aria-hidden="true">↗</span>
                    </div>
                </div>
            </a>

        </div>

        <div class="collections-footer">
            <span>DISEÑO · FUNCIÓN · ESPACIOS</span>

            <a href="{{ route('productos.index') }}">
                Explorar toda la tienda
                <span aria-hidden="true">↗</span>
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

                <a href="{{ route('productos.index') }}" class="text-link">
                    Ver todos
                </a>

            </div>


        <div class="products">

    @forelse ($productosDestacados as $producto)

        <article class="product">

            <a href="{{ route('productos.show', $producto) }}" class="product-image">
                @if ($producto->imagen)
                    <img
                        src="{{ str_starts_with($producto->imagen, 'images/')
    ? asset($producto->imagen)
    : asset('storage/' . $producto->imagen) }}"
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

<!-- INSPIRACIÓN: GALERÍA DE IMÁGENES Y VIDEOS -->
<section class="inspiracion" id="inspiracion">
    <div class="container">
        <div class="inspiracion-encabezado">
            <span class="inspiracion-etiqueta">03 / INSPIRACIÓN</span>
            <h2 class="inspiracion-titulo serif">
                Espacios que inspiran.
            </h2>
            <p class="inspiracion-descripcion">
                Ideas, materiales y ambientes que transforman
                nuestra manera de trabajar.
            </p>
        </div>

        <div class="inspiracion-galeria">
    <div class="inspiracion-imagen" role="button" tabindex="0" aria-label="Ampliar fotografía">
        <img
            src="{{ asset('images/home/hero.jpg') }}"
            alt="Espacio de trabajo contemporáneo"
            loading="lazy"
        >
    </div>

    <div class="inspiracion-imagen" role="button" tabindex="0" aria-label="Ampliar fotografía">
        <img
            src="{{ asset('images/home/hero-02.jpg') }}"
            alt="Oficina moderna con mobiliario de diseño"
            loading="lazy"
        >
    </div>

   <div class="inspiracion-imagen" role="button" tabindex="0" aria-label="Ampliar fotografía">
        <img
            src="{{ asset('images/home/hero-03.jpg') }}"
            alt="Ambiente de oficina cálido y funcional"
            loading="lazy"
        >
    </div>
</div>
<!-- Videos de inspiración -->
<div class="inspiracion-videos">
    <div class="inspiracion-videos-encabezado">
        <span class="inspiracion-etiqueta">DISEÑO EN MOVIMIENTO</span>
        <h3 class="serif">El diseño cobra vida.</h3>
    </div>

    <div class="inspiracion-videos-grid">
        <div class="inspiracion-video">
            <iframe
                src="https://www.youtube-nocookie.com/embed/e-40aTA2xR8"
                title="Video de inspiración 1"
                loading="lazy"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin"
                allowfullscreen>
            </iframe>
        </div>

        <div class="inspiracion-video">
            <iframe
                src="https://www.youtube-nocookie.com/embed/jB-VAIRay-w"
                title="Video de inspiración 2"
                loading="lazy"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin"
                allowfullscreen>
            </iframe>
        </div>
    </div>
</div>
    </div>
</section>
<!-- Visor de imágenes de Inspiración -->
<div
    id="inspiracion-lightbox"
    class="inspiracion-lightbox"
    role="dialog"
    aria-modal="true"
    aria-label="Fotografía ampliada"
    aria-hidden="true"
    hidden
>
    <button
        type="button"
        class="inspiracion-lightbox-cerrar"
        aria-label="Cerrar fotografía ampliada"
    >
        &times;
    </button>

    <img
        class="inspiracion-lightbox-imagen"
        src=""
        alt=""
    >
</div>
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

                    <a href="{{ route('faq') }}">
    Preguntas frecuentes
</a>


<a href="{{ route('contacto') }}">
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

    <div class="footer-social">
        <span>Síguenos</span>

        <a
            href="https://www.instagram.com/"
            target="_blank"
            rel="noopener noreferrer"
        >
            Instagram
        </a>

        <a
            href="https://www.facebook.com/"
            target="_blank"
            rel="noopener noreferrer"
        >
            Facebook
        </a>

        <a
            href="https://www.pinterest.com/"
            target="_blank"
            rel="noopener noreferrer"
        >
            Pinterest
        </a>
    </div>

    <span>
        Mobiliario · Diseño · Espacios
    </span>

</div>

    </div>

</footer>

<!-- =============================================================
     CHAT INTEOFFICE
     ============================================================= -->

<div
    class="chat-panel"
    id="chatPanel"
    aria-hidden="true"
>
    <div class="chat-header">
        <div class="chat-header-copy">
            <span>Atención InteOffice</span>
            <strong>¿Cómo podemos ayudarte?</strong>
        </div>

        <button
            class="chat-close"
            id="chatClose"
            type="button"
            aria-label="Cerrar chat"
        >
            ×
        </button>
    </div>

    <div class="chat-messages" id="chatMessages">
        <div class="chat-message bot">
            ¡Hola! Soy el asistente de InteOffice.
            ¿En qué podemos ayudarte hoy?
        </div>
    </div>

    <form class="chat-form" id="chatForm">
        <input
            class="chat-input"
            id="chatInput"
            type="text"
            placeholder="Escribe tu mensaje..."
            autocomplete="off"
            aria-label="Mensaje"
        >

        <button
            class="chat-send"
            type="submit"
        >
            Enviar
        </button>
    </form>
</div>

<button
    class="chat-launcher"
    id="chatLauncher"
    type="button"
    aria-label="Abrir chat"
    aria-expanded="false"
>
    <svg
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="1.7"
        aria-hidden="true"
    >
        <path d="M21 15a4 4 0 0 1-4 4H8l-5 3V7a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4z"/>
    </svg>
</button>

<script>
    const chatLauncher = document.getElementById('chatLauncher');
    const chatPanel = document.getElementById('chatPanel');
    const chatClose = document.getElementById('chatClose');
    const chatForm = document.getElementById('chatForm');
    const chatInput = document.getElementById('chatInput');
    const chatMessages = document.getElementById('chatMessages');

    function openChat() {
        chatPanel.classList.add('is-open');
        chatPanel.setAttribute('aria-hidden', 'false');
        chatLauncher.setAttribute('aria-expanded', 'true');

        setTimeout(() => {
            chatInput.focus();
        }, 250);
    }

    function closeChat() {
        chatPanel.classList.remove('is-open');
        chatPanel.setAttribute('aria-hidden', 'true');
        chatLauncher.setAttribute('aria-expanded', 'false');
    }

    function addMessage(message, type) {
        const messageElement = document.createElement('div');

        messageElement.classList.add('chat-message', type);
        messageElement.textContent = message;

        chatMessages.appendChild(messageElement);

        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function getAutomaticResponse(message) {
    const text = message
        .toLowerCase()
        .normalize('NFD')
        .replace(/[\u0300-\u036f]/g, '');

    const includesAny = (words) => {
        return words.some(word => text.includes(word));
    };

    // Productos y mobiliario
    if (includesAny([
        'producto',
        'productos',
        'mueble',
        'muebles',
        'escritorio',
        'escritorios',
        'silla',
        'sillas',
        'almacenamiento',
        'iluminacion',
        'accesorio',
        'accesorios'
    ])) {
        return 'Claro. En InteOffice contamos con mobiliario y accesorios para espacios de trabajo. Puedes consultar nuestra selección de productos y colecciones. ¿Buscas algún tipo de mueble en particular?';
    }

    // Precios y cotizaciones
    if (includesAny([
        'precio',
        'precios',
        'cuanto cuesta',
        'cuanto vale',
        'costo',
        'costos',
        'cotizacion',
        'cotizar'
    ])) {
        return 'Los precios se muestran en cada producto disponible. Si necesitas una cotización para varios artículos o un proyecto específico, podemos ayudarte a solicitar atención personalizada.';
    }

    // Envíos y entregas
    if (includesAny([
        'envio',
        'envios',
        'entrega',
        'entregas',
        'mandan',
        'enviar'
    ])) {
        return 'InteOffice contempla servicio de entrega para sus pedidos. La cobertura y el tiempo de entrega dependen de la ubicación y de los productos seleccionados.';
    }

    // Pagos
    if (includesAny([
        'pago',
        'pagos',
        'pagar',
        'tarjeta',
        'transferencia',
        'metodo de pago'
    ])) {
        return 'InteOffice contempla diferentes opciones de pago para facilitar las compras. Las alternativas disponibles se mostrarán durante el proceso de compra.';
    }

    // Devoluciones y cambios
    if (includesAny([
        'devolucion',
        'devolver',
        'cambio',
        'cambiar',
        'reembolso',
        'garantia'
    ])) {
        return 'Si necesitas realizar un cambio, devolución o solicitar información sobre una garantía, podemos orientarte de acuerdo con las condiciones aplicables al producto.';
    }

    // Disponibilidad
    if (includesAny([
        'disponible',
        'disponibilidad',
        'existencia',
        'stock',
        'inventario'
    ])) {
        return 'La disponibilidad puede variar según el producto. En el catálogo podrás consultar los artículos publicados y su información correspondiente.';
    }

    // Ubicación
    if (includesAny([
        'ubicacion',
        'donde estan',
        'donde se encuentran',
        'tienda',
        'guadalajara',
        'jalisco'
    ])) {
        return 'InteOffice opera mediante una plataforma digital y contempla su operación comercial en Guadalajara, Jalisco, México.';
    }

    // Contacto y atención humana
    if (includesAny([
        'contacto',
        'contactar',
        'asesor',
        'asesoria',
        'persona',
        'humano',
        'ayuda personalizada'
    ])) {
        return 'Con gusto. Podemos canalizar tu solicitud con el equipo de InteOffice para brindarte atención personalizada.';
    }

    // Agradecimientos y despedidas
    if (includesAny([
        'gracias',
        'muchas gracias',
        'adios',
        'hasta luego'
    ])) {
        return '¡Con gusto! Gracias por visitar InteOffice. Estamos para ayudarte a crear un mejor espacio de trabajo.';
    }

    // Saludos: se evalúan después de las intenciones importantes
    if (includesAny([
        'hola',
        'buen dia',
        'buenas tardes',
        'buenas noches',
        'buenas'
    ])) {
        return '¡Hola! Bienvenido a InteOffice. Puedo ayudarte con productos, precios, envíos, pagos, disponibilidad, ubicación y atención personalizada. ¿Qué te gustaría consultar?';
    }

    // Respuesta general
    return 'Quiero ayudarte con tu consulta. Puedes preguntarme sobre productos, precios, envíos, pagos, disponibilidad, devoluciones, ubicación o atención personalizada.';
}

    chatLauncher.addEventListener('click', () => {
        if (chatPanel.classList.contains('is-open')) {
            closeChat();
        } else {
            openChat();
        }
    });

    chatClose.addEventListener('click', closeChat);

    chatForm.addEventListener('submit', (event) => {
        event.preventDefault();

        const message = chatInput.value.trim();

        if (!message) {
            return;
        }

        addMessage(message, 'user');
        chatInput.value = '';

        setTimeout(() => {
            const response = getAutomaticResponse(message);
            addMessage(response, 'bot');
        }, 600);
    });

    // Slider automático del hero
const heroSlides = document.querySelectorAll('.hero-slide');
let currentHeroSlide = 0;
const heroCollection = document.getElementById('heroCollection');
const heroTitle = document.getElementById('heroTitle');
const heroCounter = document.getElementById('heroCounter');

const heroContent = [
    {
        collection: 'Colección 01',
        title: 'Líneas esenciales'
    },
    {
        collection: 'Colección 02',
        title: 'Calidez contemporánea'
    },
    {
        collection: 'Colección 03',
        title: 'Espacios con carácter'
    }
];

function showNextHeroSlide() {
    heroSlides[currentHeroSlide].classList.remove('active');

    currentHeroSlide = (currentHeroSlide + 1) % heroSlides.length;

    heroSlides[currentHeroSlide].classList.add('active');

    heroCollection.textContent = heroContent[currentHeroSlide].collection;
    heroTitle.textContent = heroContent[currentHeroSlide].title;
    heroCounter.textContent = String(currentHeroSlide + 1).padStart(2, '0');
}

if (heroSlides.length > 1) {
    setInterval(showNextHeroSlide, 5000);
} 
/* Galería de imágenes: visor ampliado */
const galeriaImagenes = document.querySelectorAll(
    '.inspiracion-imagen'
);
const lightbox = document.getElementById('inspiracion-lightbox');
const lightboxImagen = lightbox?.querySelector(
    '.inspiracion-lightbox-imagen'
);
const lightboxCerrar = lightbox?.querySelector(
    '.inspiracion-lightbox-cerrar'
);

if (lightbox && lightboxImagen && lightboxCerrar) {
    let elementoAnterior = null;

    function abrirLightbox(contenedor) {
        const imagen = contenedor.querySelector('img');
        if (!imagen) return;

        elementoAnterior = document.activeElement;
        lightboxImagen.src = imagen.currentSrc || imagen.src;
        lightboxImagen.alt = imagen.alt;
        lightbox.hidden = false;
        lightbox.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
        lightboxCerrar.focus();
    }

    function cerrarLightbox() {
        lightbox.hidden = true;
        lightbox.setAttribute('aria-hidden', 'true');
        lightboxImagen.removeAttribute('src');
        document.body.style.overflow = '';
        elementoAnterior?.focus();
    }

    galeriaImagenes.forEach((contenedor) => {
        contenedor.addEventListener('click', () => {
            abrirLightbox(contenedor);
        });

        contenedor.addEventListener('keydown', (evento) => {
            if (evento.key === 'Enter' || evento.key === ' ') {
                evento.preventDefault();
                abrirLightbox(contenedor);
            }
        });
    });

    lightboxCerrar.addEventListener('click', cerrarLightbox);

    lightbox.addEventListener('click', (evento) => {
        if (evento.target === lightbox) {
            cerrarLightbox();
        }
    });

    document.addEventListener('keydown', (evento) => {
        if (!lightbox.hidden && evento.key === 'Escape') {
            cerrarLightbox();
        }
    });

    }

    /* Animación de entrada de productos */
const tarjetasAnimadas = document.querySelectorAll('.product');

if ('IntersectionObserver' in window) {
    const observadorProductos = new IntersectionObserver(
        (entradas, observador) => {
            entradas.forEach((entrada) => {
                if (entrada.isIntersecting) {
    entrada.target.classList.add('animar-entrada');
} else {
    entrada.target.classList.remove('animar-entrada');
}
            });
        },
        {
            threshold: 0
        }
    );

    tarjetasAnimadas.forEach((tarjeta) => {
        observadorProductos.observe(tarjeta);
    });
}
</script>

</body>
</html>