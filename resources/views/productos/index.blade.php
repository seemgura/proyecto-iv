    <x-app-layout>

    <div class="catalog-page">
        @if (session('success'))
            <div class="success-message" role="status">{{ session('success') }}</div>
        @endif

        <div class="catalog-header">
            <div>
                <p class="catalog-eyebrow">{{ $esAdministrador ? 'Gestión del catálogo' : 'Nuestra colección' }}</p>
                <h1 class="catalog-title">Productos</h1>
                <p class="catalog-description">
                    {{ $esAdministrador
                        ? 'Administra el mobiliario, los precios y las existencias de InteOffice.'
                        : 'Descubre mobiliario contemporáneo diseñado para transformar tus espacios de trabajo.' }}
                </p>
            </div>

            <div class="catalog-header-right">
                <span class="catalog-count">
                    {{ $productos->total() }} {{ $productos->total() === 1 ? 'producto' : 'productos' }}
                </span>
                @if ($esAdministrador)
                    <a href="{{ route('productos.create') }}" class="button-new">+ Nuevo producto</a>
                @endif
            </div>
        </div>

        @if ($productos->count())
            <div class="product-list">
                @foreach ($productos as $producto)
                    <article class="product-row">
                        <a class="product-photo" href="{{ route('productos.show', $producto) }}" aria-label="Ver {{ $producto->nombre }}">
                            @if ($producto->imagen)
                                <img
                                    src="{{ str_starts_with($producto->imagen, 'images/') ? asset($producto->imagen) : asset('storage/' . $producto->imagen) }}"
                                    alt="{{ $producto->nombre }}"
                                    loading="lazy"
                                >
                            @else
                                <span class="product-no-image">Sin imagen</span>
                            @endif
                        </a>

                        <div class="product-main">
                            <div class="product-category">{{ $producto->categoria }}</div>
                            <h2 class="product-name">
                                <a href="{{ route('productos.show', $producto) }}">{{ $producto->nombre }}</a>
                            </h2>
                            @if ($producto->descripcion)
                                <p class="product-description">{{ $producto->descripcion }}</p>
                            @endif

                            @if ($esAdministrador)
                                <div class="product-badges">
                                    <span class="product-badge {{ $producto->activo ? 'badge-active' : 'badge-inactive' }}">
                                        {{ $producto->activo ? 'Activo' : 'Inactivo' }}
                                    </span>
                                    @if ($producto->destacado)
                                        <span class="product-badge">★ Destacado</span>
                                    @endif
                                </div>

                            @endif
                        </div>

                        <div class="product-side">
                            <div>
                                <div class="price-label">Precio</div>
                                <div class="product-price">${{ number_format($producto->precio, 2) }} MXN</div>
                            </div>

                            <div class="stock-block">
                                <div class="stock-label">{{ $esAdministrador ? 'Inventario' : 'Disponibilidad' }}</div>
                                <div class="product-stock">
                                    @if ($producto->stock > 0)
                                        {{ $producto->stock }} {{ $producto->stock == 1 ? 'unidad disponible' : 'unidades disponibles' }}
                                    @else
                                        Agotado
                                    @endif
                                </div>
                            </div>

                            <div class="product-actions">
                                <a href="{{ route('productos.show', $producto) }}" class="action-link">Ver producto</a>

                                @if ($esAdministrador)
                                    <a href="{{ route('productos.edit', $producto) }}" class="action-link">Editar</a>
                                    <form
                                        action="{{ route('productos.destroy', $producto) }}"
                                        method="POST"
                                        onsubmit="return confirm('¿Seguro que deseas eliminar este producto?');"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-delete">Eliminar</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            @if ($productos->hasPages())
                <div class="catalog-pagination">{{ $productos->links() }}</div>
            @endif
        @else
            <div class="empty-catalog">
                <p class="catalog-eyebrow">Catálogo</p>
                <h2 class="empty-title">Aún no hay productos disponibles</h2>
                <p class="empty-text">
                    {{ $esAdministrador
                        ? 'Agrega el primer producto para comenzar a construir el catálogo de InteOffice.'
                        : 'Pronto encontrarás nuevas piezas para tus espacios de trabajo.' }}
                </p>
                @if ($esAdministrador)
                    <a href="{{ route('productos.create') }}" class="button-new">Crear primer producto</a>
                @endif
            </div>

        @endif
    </div>
</x-app-layout>
