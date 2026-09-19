<x-app-layout>
    <div class="inteoffice-dashboard">

        {{-- Encabezado --}}
        <section class="dashboard-hero">
            <div>
                <p class="dashboard-eyebrow">GESTIÓN DE CLIENTES</p>

                <h1>
                    Usuarios
                    <span>InteOffice</span>
                </h1>

                <p class="dashboard-intro">
                    Consulta las cuentas registradas dentro de la plataforma
                    y la información básica de cada usuario.
                </p>
            </div>

            <div class="dashboard-date">
                <span>INTEOFFICE</span>
                <p>ESPACIOS QUE INSPIRAN</p>
            </div>
        </section>

        {{-- Listado de usuarios --}}
        <section class="dashboard-section">

            <div class="section-heading">
                <span>01</span>
                <h2>Usuarios registrados</h2>
            </div>

            @if ($usuarios->count())

                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">

                        <thead>
                            <tr class="border-b border-[#c9c2b7] text-left">
                                <th class="py-4 pr-6 text-xs tracking-widest font-medium">
                                    USUARIO
                                </th>

                                <th class="py-4 px-6 text-xs tracking-widest font-medium">
                                    CORREO
                                </th>

                                <th class="py-4 px-6 text-xs tracking-widest font-medium">
                                    REGISTRO
                                </th>

                                <th class="py-4 pl-6 text-xs tracking-widest font-medium text-right">
                                    ESTADO
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($usuarios as $usuario)

                                <tr class="border-b border-[#d8d2c8]">

                                    <td class="py-6 pr-6">
                                        <strong class="font-medium">
                                            {{ $usuario->name }}
                                        </strong>

                                        <p class="mt-1 text-xs text-[#8c867d]">
                                            ID {{ str_pad($usuario->id, 3, '0', STR_PAD_LEFT) }}
                                        </p>
                                    </td>

                                    <td class="py-6 px-6">
                                        {{ $usuario->email }}
                                    </td>

                                    <td class="py-6 px-6">
                                        {{ $usuario->created_at->format('d/m/Y') }}
                                    </td>

                                    <td class="py-6 pl-6 text-right">
                                        <span class="text-xs tracking-widest uppercase">
                                            Registrado
                                        </span>
                                    </td>

                                </tr>

                            @endforeach
                        </tbody>

                    </table>
                </div>

                <div class="mt-10">
                    {{ $usuarios->links() }}
                </div>

            @else

                <div class="border-t border-b border-[#c9c2b7] py-20 text-center">

                    <p class="dashboard-eyebrow">
                        SIN USUARIOS
                    </p>

                    <h3
                        class="mt-4 text-3xl font-normal"
                        style="font-family: Georgia, 'Times New Roman', serif;"
                    >
                        Aún no hay usuarios registrados.
                    </h3>

                    <p class="mt-4 text-[#777168]">
                        Las nuevas cuentas aparecerán aquí
                        cuando sean registradas en la plataforma.
                    </p>

                </div>

            @endif

        </section>

        {{-- Pie --}}
        <footer class="dashboard-footer">
            <span>INTEOFFICE</span>
            <p>MOBILIARIO · DISEÑO · ESPACIOS</p>
        </footer>

    </div>
</x-app-layout>