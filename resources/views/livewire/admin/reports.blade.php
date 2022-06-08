<div>
    {{-- Alert cuando se genera una copia de seguridad --}}
    <x-jet-action-message class="" on="saved">
        <div class="mt-4 mb-4 flex w-full max-w-lg mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="flex items-center justify-center w-12 bg-emerald-500">
                <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z" />
                </svg>
            </div>
            <div class="px-4 py-2 -mx-3">
                <div class="mx-3">
                    <span class="font-semibold text-emerald-500 dark:text-emerald-400">Exito</span>
                    <p class="text-sm text-gray-600 dark:text-gray-200">Copia de seguridad de la base de datos generada satisfactoriamente!</p>
                </div>
            </div>
        </div>
    </x-jet-action-message>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Reportes 
    </h2>   
    @role('admin')
    {{-- Reportes de venta diario, semanal y mensual --}}
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
    {{-- Reportes de ventas en un rango de fechas --}}
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
    {{-- Reporte de Productos --}}
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
    {{-- Reporte de productos a vencer --}}
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
    <div class="grid grid-cols-3 gap-8">
        {{-- Reportes de farmacias registradas --}}
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
        {{-- Reportes de usuarios --}}
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
    {{-- Copias de Seguridad --}}
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Copias de Seguridad  
    </h2>  
    <div class="grid grid-cols-2 gap-8">
        <div class=" mt-4  min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                Generar copia de seguridad
            </h4>
            <div class="justify-self-start">
                <div class="justify-self-start">
                    <x-jet-button class="text-center cursor-pointer" wire:click='backUp'>
                        Generar copia
                    </x-jet-button>
                </div>
            </div>
        </div>
    </div>
    @endrole
</div>
