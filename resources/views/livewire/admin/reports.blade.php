<div>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Reportes Ventas
    </h2>
    <div class="grid grid-cols-3 gap-8">
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                Reporte diario
            </h4>
            <a href="{{ route('today') }}"
                class="px-10 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-green-700 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-800 focus:outline-none focus:shadow-outline-purple">
                Generar excel
            </a>
        </div>
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                Reporte Semanal
            </h4>
            <a href="{{ route('week') }}"
                class="px-10 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-green-700 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-800 focus:outline-none focus:shadow-outline-purple">
                Generar excel
            </a>
        </div>
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                Reporte mensual
            </h4>
            <a href="{{ route('month') }}"
                class="px-10 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-green-700 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-800 focus:outline-none focus:shadow-outline-purple">
                Generar excel
            </a>
        </div>
    </div>
</div>
