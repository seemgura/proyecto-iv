<x-app-layout>
    <div class="inteoffice-dashboard">

        {{-- Encabezado --}}
        <section class="dashboard-hero">
            <div>
                <p class="dashboard-eyebrow">GESTIÓN DE VENTAS</p>

                <h1>
                    Pedidos
                    <span>InteOffice</span>
                </h1>

                <p class="dashboard-intro">
                    Consulta y administra los pedidos realizados
                    por los clientes de InteOffice.
                </p>
            </div>

            <div class="dashboard-date">
                <span>INTEOFFICE</span>
                <p>ESPACIOS QUE INSPIRAN</p>
            </div>
        </section>

        {{-- Listado de pedidos --}}
        <section class="dashboard-section">

            <div class="section-heading">
                <span>01</span>
                <h2>Pedidos registrados</h2>
            </div>

            @if ($pedidos->count())

                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">

                        <thead>
                            <tr class="border-b border-[#c9c2b7] text-left">
                                <th class="py-4 pr-6 text-xs tracking-widest font-medium">
                                    PEDIDO
                                </th>

                                <th class="py-4 px-6 text-xs tracking-widest font-medium">
                                    CLIENTE
                                </th>

                                <th class="py-4 px-6 text-xs tracking-widest font-medium">
                                    TOTAL
                                </th>

                                <th class="py-4 px-6 text-xs tracking-widest font-medium">
                                    ESTADO
                                </th>

                                <th class="py-4 pl-6 text-xs tracking-widest font-medium text-right">
                                    ACCIONES
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($pedidos as $pedido)

                                <tr class="border-b border-[#d8d2c8]">

                                    <td class="py-6 pr-6">
                                        <strong class="font-medium">
                                            {{ $pedido->numero_pedido }}
                                        </strong>

                                        <p class="mt-1 text-xs text-[#8c867d]">
                                            {{ $pedido->created_at->format('d/m/Y') }}
                                        </p>
                                    </td>

                                    <td class="py-6 px-6">
                                        <p class="font-medium">
                                            {{ $pedido->cliente }}
                                        </p>

                                        <p class="mt-1 text-xs text-[#8c867d]">
                                            {{ $pedido->email }}
                                        </p>
                                    </td>

                                    <td class="py-6 px-6">
                                        ${{ number_format($pedido->total, 2) }}
                                    </td>

                                    <td class="py-6 px-6">
                                        <span class="text-xs tracking-widest uppercase">
                                            {{ $pedido->estado }}
                                        </span>
                                    </td>

                                    <td class="py-6 pl-6 text-right">
                                        <a
                                            href="{{ route('pedidos.show', $pedido) }}"
                                            class="text-xs tracking-widest uppercase hover:underline"
                                        >
                                            Ver →
                                        </a>
                                    </td>

                                </tr>

                            @endforeach
                        </tbody>

                    </table>
                </div>

                <div class="mt-10">
                    {{ $pedidos->links() }}
                </div>

            @else

                <div class="border-t border-b border-[#c9c2b7] py-20 text-center">

                    <p class="dashboard-eyebrow">
                        SIN PEDIDOS
                    </p>

                    <h3
                        class="mt-4 text-3xl font-normal"
                        style="font-family: Georgia, 'Times New Roman', serif;"
                    >
                        Aún no hay pedidos registrados.
                    </h3>

                    <p class="mt-4 text-[#777168]">
                        Los nuevos pedidos aparecerán aquí cuando
                        sean registrados en la plataforma.
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