<x-app-layout>

    <x-slot name="header">
        <div>
            <p style="
                margin: 0 0 8px;
                font-size: 10px;
                letter-spacing: .3em;
                text-transform: uppercase;
                color: #9ca3af;
            ">
                Catálogo
            </p>

            <h2 style="
                margin: 0;
                font-family: Georgia, 'Times New Roman', serif;
                font-size: 32px;
                font-weight: 400;
                color: #171715;
            ">
                Editar producto
            </h2>
        </div>
    </x-slot>

    <style>
        .product-form-container {
            max-width: 1050px;
            margin: 0 auto;
            padding: 55px 30px 90px;
        }

        .product-form-top {
            margin-bottom: 35px;
        }

        .product-form-back {
            font-size: 10px;
            letter-spacing: .22em;
            text-transform: uppercase;
            color: #6b7280;
            text-decoration: none;
            border-bottom: 1px solid #9ca3af;
            padding-bottom: 5px;
        }

        .product-form-card {
            background: #ffffff;
            border: 1px solid #e5e1da;
            padding: 48px;
        }

        .product-form-intro {
            margin-bottom: 42px;
            padding-bottom: 32px;
            border-bottom: 1px solid #e5e1da;
        }

        .product-form-eyebrow {
            margin: 0 0 10px;
            font-size: 9px;
            letter-spacing: .3em;
            text-transform: uppercase;
            color: #9ca3af;
        }

        .product-form-title {
            margin: 0;
            font-family: Georgia, "Times New Roman", serif;
            font-size: 30px;
            font-weight: 400;
            color: #171715;
        }

        .product-form-description {
            max-width: 620px;
            margin: 12px 0 0;
            color: #6b7280;
            font-size: 14px;
            line-height: 1.7;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 28px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group-full {
            grid-column: 1 / -1;
        }

        .form-label {
            margin-bottom: 10px;
            font-size: 9px;
            font-weight: 600;
            letter-spacing: .23em;
            text-transform: uppercase;
            color: #6b7280;
        }

        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            border: 1px solid #d8d0c3;
            background: #faf8f3;
            color: #171715;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            outline: none;
        }

        .form-input,
        .form-select {
            height: 52px;
            padding: 0 16px;
        }

        .form-textarea {
            min-height: 150px;
            padding: 16px;
            resize: vertical;
            line-height: 1.6;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            border-color: #171715;
            background: #ffffff;
        }

        .form-file {
            width: 100%;
            padding: 18px;
            border: 1px dashed #cfc7ba;
            background: #faf8f3;
            font-size: 13px;
            color: #6b7280;
        }

        .form-help {
            margin-top: 8px;
            font-size: 11px;
            line-height: 1.5;
            color: #9ca3af;
        }

        .form-error {
            margin-top: 8px;
            font-size: 11px;
            color: #b91c1c;
        }

        .current-image {
            margin-bottom: 18px;
        }

        .current-image img {
            display: block;
            width: 220px;
            height: 160px;
            object-fit: cover;
            border: 1px solid #e5e1da;
        }

        .current-image-empty {
            display: flex;
            width: 220px;
            height: 120px;
            align-items: center;
            justify-content: center;
            border: 1px solid #e5e1da;
            background: #f4f0e8;
            color: #9ca3af;
            font-size: 9px;
            letter-spacing: .2em;
            text-transform: uppercase;
        }

        .form-options {
            grid-column: 1 / -1;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 8px;
        }

        .form-option {
            display: flex;
            align-items: flex-start;
            gap: 13px;
            padding: 20px;
            border: 1px solid #e5e1da;
            background: #faf8f3;
        }

        .form-option input {
            width: 17px;
            height: 17px;
            margin-top: 2px;
            accent-color: #171715;
        }

        .form-option-title {
            display: block;
            margin-bottom: 4px;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: #171715;
        }

        .form-option-description {
            display: block;
            font-size: 11px;
            line-height: 1.5;
            color: #8a847b;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 25px;
            margin-top: 42px;
            padding-top: 32px;
            border-top: 1px solid #e5e1da;
        }

        .button-cancel {
            font-size: 10px;
            letter-spacing: .22em;
            text-transform: uppercase;
            color: #6b7280;
            text-decoration: none;
        }

        .button-submit {
            border: 0;
            min-width: 220px;
            min-height: 54px;
            padding: 0 28px;
            background: #171715;
            color: #ffffff;
            cursor: pointer;
            font-size: 10px;
            letter-spacing: .25em;
            text-transform: uppercase;
        }

        .button-submit:hover {
            background: #383630;
        }

        @media (max-width: 700px) {
            .product-form-container {
                padding: 35px 18px 70px;
            }

            .product-form-card {
                padding: 28px 20px;
            }

            .form-grid,
            .form-options {
                grid-template-columns: 1fr;
            }

            .form-actions {
                align-items: stretch;
                flex-direction: column-reverse;
            }

            .button-submit {
                width: 100%;
            }
        }
    </style>

    <div class="product-form-container">

        <div class="product-form-top">
            <a
                href="{{ route('productos.index') }}"
                class="product-form-back"
            >
                ← Volver a productos
            </a>
        </div>

        <div class="product-form-card">

            <div class="product-form-intro">
                <p class="product-form-eyebrow">
                    InteOffice · Inventario
                </p>

                <h3 class="product-form-title">
                    {{ $producto->nombre }}
                </h3>

                <p class="product-form-description">
                    Modifica la información comercial, inventario o fotografía
                    de este producto.
                </p>
            </div>

            <form
                action="{{ route('productos.update', $producto) }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                @method('PUT')

                <div class="form-grid">

                    {{-- Nombre --}}
                    <div class="form-group">
                        <label for="nombre" class="form-label">
                            Nombre del producto
                        </label>

                        <input
                            id="nombre"
                            name="nombre"
                            type="text"
                            value="{{ old('nombre', $producto->nombre) }}"
                            class="form-input"
                            required
                        >

                        @error('nombre')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Categoría --}}
                    <div class="form-group">
                        <label for="categoria" class="form-label">
                            Categoría
                        </label>

                        <select
                            id="categoria"
                            name="categoria"
                            class="form-select"
                            required
                        >
                            @foreach (
                                [
                                    'Escritorios',
                                    'Sillas',
                                    'Almacenamiento',
                                    'Iluminación',
                                    'Accesorios'
                                ] as $categoria
                            )
                                <option
                                    value="{{ $categoria }}"
                                    @selected(
                                        old('categoria', $producto->categoria)
                                        === $categoria
                                    )
                                >
                                    {{ $categoria }}
                                </option>
                            @endforeach
                        </select>

                        @error('categoria')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Precio --}}
                    <div class="form-group">
                        <label for="precio" class="form-label">
                            Precio
                        </label>

                        <input
                            id="precio"
                            name="precio"
                            type="number"
                            min="0"
                            step="0.01"
                            value="{{ old('precio', $producto->precio) }}"
                            class="form-input"
                            required
                        >

                        @error('precio')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Stock --}}
                    <div class="form-group">
                        <label for="stock" class="form-label">
                            Stock
                        </label>

                        <input
                            id="stock"
                            name="stock"
                            type="number"
                            min="0"
                            step="1"
                            value="{{ old('stock', $producto->stock) }}"
                            class="form-input"
                            required
                        >

                        @error('stock')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Descripción --}}
                    <div class="form-group form-group-full">
                        <label for="descripcion" class="form-label">
                            Descripción
                        </label>

                        <textarea
                            id="descripcion"
                            name="descripcion"
                            class="form-textarea"
                        >{{ old('descripcion', $producto->descripcion) }}</textarea>

                        @error('descripcion')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Fotografía --}}
                    <div class="form-group form-group-full">

                        <label class="form-label">
                            Fotografía actual
                        </label>

                        <div class="current-image">
                            @if ($producto->imagen)
                                <img
                                    src="{{ asset('storage/' . $producto->imagen) }}"
                                    alt="{{ $producto->nombre }}"
                                >
                            @else
                                <div class="current-image-empty">
                                    Sin imagen
                                </div>
                            @endif
                        </div>

                        <label for="imagen" class="form-label">
                            Reemplazar fotografía
                        </label>

                        <input
                            id="imagen"
                            name="imagen"
                            type="file"
                            accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                            class="form-file"
                        >

                        <span class="form-help">
                            Si no seleccionas un archivo, se conservará la
                            fotografía actual. JPG, PNG o WEBP. Máximo 4 MB.
                        </span>

                        @error('imagen')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Opciones --}}
                    <div class="form-options">

                        <label class="form-option">
                            <input
                                type="checkbox"
                                name="destacado"
                                value="1"
                                @checked(
                                    old(
                                        'destacado',
                                        $producto->destacado
                                    )
                                )
                            >

                            <span>
                                <span class="form-option-title">
                                    Producto destacado
                                </span>

                                <span class="form-option-description">
                                    Permite mostrar este producto en secciones
                                    destacadas de InteOffice.
                                </span>
                            </span>
                        </label>

                        <label class="form-option">
                            <input
                                type="checkbox"
                                name="activo"
                                value="1"
                                @checked(
                                    old(
                                        'activo',
                                        $producto->activo
                                    )
                                )
                            >

                            <span>
                                <span class="form-option-title">
                                    Producto activo
                                </span>

                                <span class="form-option-description">
                                    Mantiene el producto habilitado para el
                                    catálogo público.
                                </span>
                            </span>
                        </label>

                    </div>

                </div>

                <div class="form-actions">
                    <a
                        href="{{ route('productos.index') }}"
                        class="button-cancel"
                    >
                        Cancelar
                    </a>

                    <button
                        type="submit"
                        class="button-submit"
                    >
                        Guardar cambios
                    </button>
                </div>

            </form>

        </div>

    </div>

</x-app-layout>