<div class="container">
    @push('styles')
        <link rel="stylesheet" href="{{ asset('windmill/assets/css/tailwind.output.css') }}" />
    @endpush
    {{-- Chart para reportar el producto mas vendido --}}
    <div class="mt-8 h-100 min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <h1 class="my-6 text-2xl font-semibold text-green-800 dark:text-gray-200">
            Productos más vendidos
        </h1>
        <canvas id="pie" class="max-h-64">
        </canvas>
        <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
            <div class="flex items-center">
                <span class="inline-block w-3 h-3 mr-1 bg-blue-600 rounded-full"></span>
                <span>{{ $names[0] }}</span>
            </div>
            <div class="flex items-center">
                <span class="inline-block w-3 h-3 mr-1 bg-teal-500 rounded-full"></span>
                <span>{{ $names[1] }}</span>
            </div>
            <div class="flex items-center">
                <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
                <span>{{ $names[2] }}</span>
            </div>
        </div>
    </div>
    {{-- <div class="grid grid-cols-2 gap-8">
        <!-- Doughnut/Pie chart -->
        
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                Reporte estadistico semanal
            </h4>
            <canvas id="week"></canvas>
            <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
                <!-- Chart legend -->
                <div class="flex items-center">
                    <span class="inline-block w-3 h-3 mr-1 bg-teal-500 rounded-full"></span>
                    <span>Ventas</span>
                </div>
            </div>
        </div>
    </div> --}}
    <h1 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Productos
    </h1>
    {{-- Buscar un producto por nombre --}}
    <div x-data="{ message: '' }" class="mb-4 flex justify-start flex-1 lg:mr-32">
        <div class="relative w-full max-w-xl mr-6 focus-within:text-green-500">
            <div class="absolute inset-y-0 flex items-center pl-2">
                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <input
                class="w-full pl-8 pr-2 text-sm  text-gray-700 placeholder-gray-800 bg-white border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-700 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                type="text" placeholder="Buscar por nombre..." aria-label="Search" x-model="message"
                @input="Livewire.emit('updateSearch', message)" />
        </div>
    </div>
    {{-- Lista de productos --}}
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left bg-green-600 dark:bg-green-700 text-gray-50 uppercase border-b dark:border-gray-700 dark:text-gray-50 ">
                    <th class="px-4 py-3">Nombre</th>
                    <th class="px-4 py-3">Laboratorio</th>
                    <th class="px-4 py-3">Presentación</th>
                    <th class="px-4 py-3">Cantidad Disponible</th>
                    <th class="px-4 py-3">Farmacia</th>
                    <th class="px-4 py-3">Turno</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach ($products as $product)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <div
                                class="flex items-center text-sm  dark:bg-green-700 rounded-full px-2 py-1 dark:text-green-100">
                                <p class="font-semibold">{{ $product->name }}</p>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ $product->laboratory->name }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ $product->presentation->name }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ $product->stock }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ $product->branch->name }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ $product->branch->turn }}
                        </td>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- Script para el chart de producto mas vendido --}}
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"
                integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            const pieConfig = {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: @js($most),
                        /**
                         * These colors come from Tailwind CSS palette
                         * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
                         */
                        backgroundColor: ['#0694a2', '#1c64f2', '#7e3af2'],
                        label: 'Dataset 1',
                    }, ],
                    labels: @js($names),
                },
                options: {
                    responsive: true,
                    cutoutPercentage: 80,
                    /**
                     * Default legends are ugly and impossible to style.
                     * See examples in charts.html to add your own legends
                     *  */
                    legend: {
                        display: false,
                    },
                },
            }
            // change this to the id of your chart element in HMTL
            const pieCtx = document.getElementById('pie')
            window.myPie = new Chart(pieCtx, pieConfig)
        </script>
    @endpush
</div>
