<div>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Dashboard
        <br>
    </h2>  
    <div class="grid grid-cols-2 gap-8">
        {{-- Turno Farmacias --}}
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <p class="text-sm text-gray-600 dark:text-gray-400">
                ¿Farmacia de turno?
            </p>
            @if ($branch->turn == 'si')
                <button wire:click='no'
                    class="mt-6 px-10 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-green-700 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-purple">
                    Turno
                </button>
            @else
                <button wire:click='si'
                    class="mt-6 px-10 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple">
                    Turno
                </button>
            @endif
        </div>
        {{-- Abierto Farmacias --}}
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <p class="text-sm text-gray-600 dark:text-gray-400">
                ¿Farmacia abierta?
            </p>
            @if ($branch->open == 'si')
                <button wire:click='close'
                    class="mt-6 px-10 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-green-700 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-purple">
                    Abierto
                </button>
            @else
                <button wire:click='open'
                    class="mt-6 px-10 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple">
                    Cerrado
                </button>
            @endif
        </div>
    </div>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Reportes de Ventas
        <br>
    </h2>
    <!-- Reportes Estadisticos-->
    <div class="grid grid-cols-2 gap-8">
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                Reporte estadistico diario
            </h4>
            <canvas id="day"></canvas>
            <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
                <!-- Chart legend -->
                <div class="flex items-center">
                    <span class="inline-block w-3 h-3 mr-1 bg-green-800 rounded-full"></span>
                    <span>Ventas</span>
                </div>
            </div>
        </div>
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                Reporte estadistico semanal
            </h4>
            <canvas id="week"></canvas>
            <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
                <!-- Chart legend -->
                <div class="flex items-center">
                    <span class="inline-block w-3 h-3 mr-1 bg-green-800 rounded-full"></span>
                    <span>Ventas</span>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-10 min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
            Reporte estadistico mensual
        </h4>
        <canvas id="month"></canvas>
        <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
            <!-- Chart legend -->
            <div class="flex items-center">
                <span class="inline-block w-3 h-3 mr-1 bg-green-800 rounded-full"></span>
                <span>Ventas</span>
            </div>
        </div>
    </div>
    {{-- Script de reportes estadisticos  --}}
    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"
                integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        {{-- Script Semanal --}}
        <script>
            function day(days) {
                var date = new Date();
                date.setDate(date.getDate() - days);
                switch (date.getDay()) {
                    case 0:
                        return "Domingo";
                    case 1:
                        return "Lunes";
                    case 2:
                        return "Martes";
                    case 3:
                        return "Miércoles";
                    case 4:
                        return "Jueves";
                    case 5:
                        return "Viernes";
                    case 6:
                        return "Sabado";
                    default:
                        //console.log(date.getDay());
                }
            }
            const barConfig = {
                type: 'bar',
                data: {
                    labels: [day(6), day(5), day(4), day(3), day(2), day(1), day(0)],
                    datasets: [{
                        label: 'Ventas',
                        backgroundColor: '#064420',
                        // borderColor: window.chartColors.red,
                        borderWidth: 1,
                        data: [@js($sales[0]), @js($sales[1]), @js($sales[2]), @js($sales[3]), @js($sales[4]), @js(
                            $sales[5]), @js($sales[6])],
                    }, ],
                },
                options: {
                    responsive: true,
                    legend: {
                        display: false,
                    },
                },
            }
            const barsCtx = document.getElementById('week')
            window.myBar = new Chart(barsCtx, barConfig)
        </script>
        {{-- Script Mensual --}}
        <script>
            function day(days) {
                var date = new Date();
                date.setDate(date.getDate() - days);
                switch (date.getDay()) {
                    case 0:
                        return "Domingo " + date.getUTCDate();
                    case 1:
                        return "Lunes " + date.getUTCDate();
                    case 2:
                        return "Martes " + date.getUTCDate();
                    case 3:
                        return "Miércoles " + date.getUTCDate();
                    case 4:
                        return "Juevez " + date.getUTCDate();
                    case 5:
                        return "Viernes " + date.getUTCDate();
                    case 6:
                        return "Sabado " + date.getUTCDate();
                    default:
                        //console.log(date.getDay());
                }
            }
            let daysMonth = [];
            for (var i = 30; i >= 0; i--) {
                daysMonth.push(day(i))
            }
            const barConfig2 = {
                type: 'bar',
                data: {
                    labels: daysMonth,
                    datasets: [{
                        label: 'Ventas',
                        backgroundColor: '#064420',
                        // borderColor: window.chartColors.red,
                        borderWidth: 1,
                        data: @js($month),
                    }, ],
                },
                options: {
                    responsive: true,
                    legend: {
                        display: false,
                    },
                },
            }
            const barsCtx2 = document.getElementById('month')
            window.myBar = new Chart(barsCtx2, barConfig2)
        </script>
        {{-- Script Diario --}}
        <script>
            const dayConfig = {
                type: 'bar',
                data: {
                    labels: ['00:00', '04:00', '08:00', '12:00','16:00', '20:00', '23:59'],
                    datasets: [{
                        label: 'Ventas',
                        backgroundColor: '#064420',
                        // borderColor: window.chartColors.red,
                        borderWidth: 1,
                        data: @js($day),
                    }, ],
                },
                options: {
                    responsive: true,
                    legend: {
                        display: false,
                    },
                },
            }
            const dayCtx = document.getElementById('day')
            window.myBar = new Chart(dayCtx, dayConfig)
        </script>
    @endpush
</div>
