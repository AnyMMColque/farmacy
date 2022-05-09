<div>
    <h1 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Lista de productos por lotes
    </h2>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        {{-- Lista que muestra productos registrados --}}
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left bg-green-600 dark:bg-green-700 text-gray-50 uppercase border-b dark:border-gray-700 dark:text-gray-50 ">
                        <th class="px-4 py-3">Lote</th>
                        <th class="px-4 py-3">Producto</th>
                        <th class="px-4 py-3">Stock</th>              
                        <th class="px-4 py-3">Precio de compra</th>               
                        <th class="px-4 py-3">Precio de venta</th>               
                        <th class="px-4 py-3">Vencimiento</th>
                        <th class="px-4 py-3">Estado</th>
                        <th class="px-4 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($inventories as $inventory)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm  dark:bg-green-700 rounded-full px-2 py-1 dark:text-green-100">
                                    <p class="font-semibold">{{ $inventory->lot }}</p>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $inventory->product->name }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $inventory->stock }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $inventory->price}}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $inventory->sale_price}}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $inventory->exp_date }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $inventory->status }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <button @click="open2 = true"
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-green-600 rounded-lg dark:text-green-700 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit" wire:click="edit({{ $inventory->id }})">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- Paginación para Lista de inventario por lotes --}}
        <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
            <span class="flex items-center col-span-3">
                {!! $inventories->links('pagination::message') !!}
            </span>
            <span class="col-span-2"></span>
            <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                <nav aria-label="Table navigation">
                    {{ $inventories->links() }}
                </nav>
            </span>
        </div>
    </div>
</div>
