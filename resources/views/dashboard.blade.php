<x-app-layout>
    <div class="inteoffice-dashboard">

        {{-- Encabezado editorial --}}
        <section class="dashboard-hero">
            <div>
                <p class="dashboard-eyebrow">ÁREA PRIVADA</p>

                <h1>
                    Bienvenido,
                    <span>{{ Auth::user()->name }}</span>
                </h1>

                <p class="dashboard-intro">
                    Gestiona el contenido y las operaciones de InteOffice
                    desde un solo espacio.
                </p>
            </div>

            <div class="dashboard-date">
                <span>INTEOFFICE</span>
                <p>ESPACIOS QUE INSPIRAN</p>
            </div>
        </section>

        {{-- Navegación principal --}}
        <section class="dashboard-section">
            <div class="section-heading">
                <h2>Gestión</h2>
            </div>

            <div class="dashboard-grid">

                {{-- Productos --}}
                <a href="{{ route('productos.index') }}" class="dashboard-card">
    

                    <div>
                        <p class="card-category">CATÁLOGO</p>
                        <h3>Productos</h3>
                        <p>
                            Administra el mobiliario y los accesorios
                            disponibles en la tienda.
                        </p>
                    </div>

                    <span class="card-arrow">→</span>
                </a>

                {{-- Pedidos --}}
                <a href="{{ route('pedidos.index') }}" class="dashboard-card">

                    <div>
                        <p class="card-category">VENTAS</p>
                        <h3>Pedidos</h3>
                        <p>
                            Consulta y administra los pedidos realizados
                            por los clientes.
                        </p>
                    </div>

                    <span class="card-arrow">→</span>
                </a>

                {{-- Usuarios --}}
<a href="{{ route('usuarios.index') }}" class="dashboard-card">

    <div>
        <p class="card-category">CLIENTES</p>
        <h3>Usuarios</h3>
        <p>
            Gestiona las cuentas registradas
            dentro de la plataforma.
        </p>
    </div>

    <span class="card-arrow">→</span>
</a>


{{-- Mensajes de contacto --}}
<a href="{{ route('admin.contactos.index') }}" class="dashboard-card">

    <div>
        <p class="card-category">ATENCIÓN AL CLIENTE</p>

        <h3>Mensajes</h3>

        <p>
            Consulta las solicitudes recibidas
            desde el formulario de contacto.
        </p>

        @if ($mensajesPendientes > 0)
            <p>
                <strong>{{ $mensajesPendientes }}</strong>
                {{ $mensajesPendientes === 1 ? 'mensaje pendiente' : 'mensajes pendientes' }}
            </p>
        @endif
    </div>

    <span class="card-arrow">→</span>
</a>


            </div>
        </section>

        {{-- Estado general --}}
        <section class="dashboard-status">

            <div class="status-heading">
                <p class="dashboard-eyebrow">ESTADO DEL SISTEMA</p>
                <h2>Vista general</h2>
            </div>

            <div class="status-grid">

                <div class="status-item">
                    <span>PRODUCTOS</span>
                    <strong>{{ $totalProductos }}</strong>
                    <p>Registrados</p>
                </div>

                <div class="status-item">
                    <span>PEDIDOS</span>
                    <strong>{{ $totalPedidos }}</strong>
                    <p>Recibidos</p>
                </div>

                <div class="status-item">
                    <span>USUARIOS</span>
                    <strong>{{ $totalUsuarios }}</strong>
                    <p>Registrados</p>
                </div>


<div class="status-item">
    <span>MENSAJES</span>
    <strong>{{ $totalMensajes }}</strong>
    <p>
        {{ $mensajesPendientes }} pendientes de lectura
    </p>
</div>

            </div>

        </section>

        {{-- Pie editorial --}}
        <footer class="dashboard-footer">
            <span>INTEOFFICE</span>
            <p>MOBILIARIO · DISEÑO · ESPACIOS</p>
        </footer>

    </div>
</x-app-layout>