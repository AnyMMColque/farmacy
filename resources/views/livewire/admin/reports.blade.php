<div>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Reportes Ventas
    </h2>
    @role('admin')
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

    <div class="mt-4 min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
            Reporte de ventas entre dos fechas
        </h4>
        <div class="justify-self-start">
            <x-jet-input class="mb-4 text-center" type="date" wire:model.defer='from'>
            </x-jet-input>
            <x-jet-input-error for="from" />

            <x-jet-input class="mb-4 text-center" type="date" wire:model.defer='to'>
            </x-jet-input>
            <x-jet-input-error for="to" />

            <div class="justify-self-start">
                <x-jet-button class="text-center cursor-pointer" wire:click='sendData'>
                    Generar reporte
                </x-jet-button>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-8">
        <div class="mt-4 min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                Reporte de productos
            </h4>
            <div class="justify-self-start">
                <div class="justify-self-start">
                    <x-jet-button class="text-center cursor-pointer" wire:click='sendBranch'>
                        Generar reporte
                    </x-jet-button>
                </div>
            </div>
        </div>

        <div class="mt-4 min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                Productos con stock mínimo
            </h4>
            <div class="justify-self-start">
                <div class="justify-self-start">
                    <x-jet-button class="text-center cursor-pointer" wire:click='sendBranchStock'>
                        Generar reporte
                    </x-jet-button>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-8">
        <div class="mt-4 min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                Reporte de productos a vencer
            </h4>
            <div class="justify-self-start">
                <div class="justify-self-start">
                    <x-jet-button class="text-center cursor-pointer" wire:click='expDate'>
                        Generar reporte
                    </x-jet-button>
                </div>
            </div>
        </div>
    </div>
    @endrole

    @role('Super-Admin')
    <div class="grid grid-cols-2 gap-8">
        <div class="mt-4 min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                Reporte de farmacias registradas
            </h4>
            <div class="justify-self-start">
                <div class="justify-self-start">
                    <x-jet-button class="text-center cursor-pointer" wire:click='reportBranches'>
                        Generar reporte
                    </x-jet-button>
                </div>
            </div>
        </div>

        <div class="mt-4 min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                Reporte de usuarios
            </h4>
            <div class="justify-self-start">
                <div class="justify-self-start">
                    <x-jet-button class="text-center cursor-pointer" wire:click='reportUsers'>
                        Generar reporte
                    </x-jet-button>
                </div>
            </div>
        </div>
    </div>
    @endrole
</div>
