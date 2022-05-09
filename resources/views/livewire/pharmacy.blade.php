<div class="container">
    @push('styles')
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
            integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
            crossorigin="" />
        <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder/dist/esri-leaflet-geocoder.css" />
    @endpush
    {{-- Chart para Reportar Farmacias mas concurridas --}}
    <div class="mt-8 h-100 min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <h1 class="my-6 text-2xl font-semibold text-green-800 dark:text-gray-200">
            Farmacias más concurridas
        </h1>
        <canvas id="pie" class="max-h-64">
        </canvas>
        <div class="flex justify-center space-x-3 text-sm text-gray-600 dark:text-gray-400">
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
    <h1 class="my-6 text-2xl font-semibold text-green-700 dark:text-gray-200">
        Farmacias
    </h1>
    {{-- Aqui se muestra la informacion de todas las farmacias registradas --}}
    @foreach ($branches as $key => $branch)
        @if ($branch->id !== 1)
            <div class="card lg:card-side bg-base-100 shadow-xl mb-5">
                <div class="grid grid-cols-3 gap-4">
                    <div class="col-span-2 h-80 mt-10 m-10" id="{{ $nameId[$key] }}" wire:ignore></div>
                    <div class="mt-10">
                        <h2 class="card-title text-green-700">{{ $branch->name }}</h2>
                        <p> <span class="font-bold">Dirección: </span>{{ $branch->address }}</p>
                        <p> <span class="font-bold">Teléfono: </span>{{ $branch->telephone }}</p>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
    {{-- Script para dibujar los mapas dinamicamente --}}
    @push('scripts')
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
                integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
                crossorigin=""></script>
        <script src="https://unpkg.com/esri-leaflet"></script>
        <script src="https://unpkg.com/esri-leaflet-geocoder"></script>
        <script>
            setTimeout(render, 500);
            function render() {
                Livewire.emit('renderMap')
                // console.log('😁');
            }
        </script>
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
