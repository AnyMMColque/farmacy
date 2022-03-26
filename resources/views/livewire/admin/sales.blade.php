<div>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Ventas
    </h2>
    {{-- Boton para registrar nueva venta --}}
    <div>
        <button
            class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-700 dark:bg-green-700 border border-transparent rounded-lg active:bg-green-800 hover:bg-green-800 focus:outline-none focus:shadow-outline-purple"
            wire:click="new">
            Nuevo
        </button>
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300 py-3 my-3">
            Lista de Ventas
        </h4>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">

            {{-- Lista que muestra ventas registradas --}}
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left bg-green-600 dark:bg-green-700 text-gray-50 uppercase border-b dark:border-gray-700 dark:text-gray-50 ">
                            <th class="px-4 py-3">ID</th>
                            <th class="px-4 py-3">Usuario</th>
                            <th class="px-4 py-3">Cliente</th>
                            <th class="px-4 py-3">C.I./NIT</th>
                            <th class="px-4 py-3">Total</th>
                            <th class="px-4 py-3">Acciones</th>
                            <th class="px-4 py-3">Estado</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($orders as $order)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <div
                                        class="flex items-center text-sm  dark:bg-green-700 rounded-full px-2 py-1 dark:text-green-100">
                                        <p class="font-semibold">{{ $order->id }}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $order->user->name }}
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    <span class="px-2 py-1">
                                        {{ $order->customer->name }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $order->customer->ci }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $order->total }}
                                </td>
                                <td class="px-4 py-3" Width="20px;">
                                    <div class="flex items-center space-x-4 text-sm">
                                        {{-- Accion de editar dentro de la lista --}}
                                        <a href="{{ route('pdf.pdfInvoice', [ 'id' => $order->id ]) }}" target="_blank" rel="noopener noreferrer">
                                            <button
                                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-green-600 rounded-lg dark:text-green-700 focus:outline-none focus:shadow-outline-gray"
                                                aria-label="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                                </svg>
                                            </button>
                                        </a>
                                        {{-- Accion de eliminar dentro de la lista --}}
                                        <button
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg dark:text-red-700 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Delete" wire:click="status('{{ $order->id }}')">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                                <td class="px-4 py-3" Width="5px;">
                                    @if ($order->status == 0)
                                    @else
                                        <div class="-m-2 text-center">
                                            <div class="p-2">
                                                <div
                                                    class="inline-flex items-center leading-none text-red-600 rounded-full p-2 shadow text-teal text-sm">
                                                    <span
                                                        class="inline-flex bg-red-600 text-white rounded-full h-6 px-3 justify-center items-center">Anulado</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                </table>
            </div>
            {{-- Paginación para Lista de Sucursales --}}
            {{-- <div
                    class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                    <span class="flex items-center col-span-3">
                        {!! $branches->links('pagination::message') !!}
                    </span>
                    <span class="col-span-2"></span>
                    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                        <nav aria-label="Table navigation">
                            {{ $branches->links() }}
                        </nav>
                    </span>
                </div> --}}
        </div>
    </div>
</div>
