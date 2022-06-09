<div x-data="{ open: false, open2: false, inventory: false }">
    {{-- Alert despues de registrar un producto --}}
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
                    <p class="text-sm text-gray-600 dark:text-gray-200">Producto Registrado!</p>
                </div>
            </div>
        </div>
    </x-jet-action-message>
    {{-- Alert despues de actualizar un producto --}}
    <x-jet-action-message class="" on="updated">
        <div class="mt-4 mb-4 flex w-full max-w-lg mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="flex items-center justify-center w-12 bg-emerald-500">
                <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z" />
                </svg>
            </div>
            <div class="px-4 py-2 -mx-3">
                <div class="mx-3">
                    <span class="font-semibold text-emerald-500 dark:text-emerald-400">Exito</span>
                    <p class="text-sm text-gray-600 dark:text-gray-200">Producto Actualizado!</p>
                </div>
            </div>
        </div>
    </x-jet-action-message>
    <h1 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Productos
    </h2>   
    <div>
        <label class="block text-sm">
            <input type="hidden"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                wire:model='num' />
        </label>
    </div>
    {{-- Boton para registrar nuevo producto y ver lotes--}}
    <div>
        <button @click="open = true"
        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-700 dark:bg-green-700 border border-transparent rounded-lg active:bg-green-800 hover:bg-green-800 focus:outline-none focus:shadow-outline-purple">
            Registrar Producto
        </button>
        <a href="{{route('admin.inventory')}}"
        class="px-5 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-700 dark:bg-green-700 border border-transparent rounded-lg active:bg-green-800 hover:bg-green-800 focus:outline-none focus:shadow-outline-purple">
            Ver lotes
        </a>
    </div>
    {{-- Tabla donde se muestran los productos --}}
    <h4 class="mb-4 mt-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Lista de Productos
    </h4>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        {{-- Modal para registrar productos --}}
        <div x-show="open" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
            <!-- Modal -->
            <div x-transition:enter="transition ease-out duration-150"
                x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="open = false, Livewire.emit('resetVariables')"
                @keydown.escape="open = false, Livewire.emit('resetVariables')"
                {{-- Esto hace que el modal no se abra ni bien se entra en la pagina --}}
                :class="{'block':open, 'hidden': !open}"
                class="hidden w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
                role="dialog" id="modal">
                <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
                <header class="flex justify-end">
                    <button class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                        aria-label="close" @click="open = false, Livewire.emit('resetVariables')">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                            <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" fill-rule="evenodd">
                            </path>
                        </svg>
                    </button>
                </header>
                <!-- Modal body -->
                <div class="mt-4 mb-6">
                    <!-- Modal title -->
                    <p class="mb-2 text-lg font-semibold text-green-700 dark:text-green-700">
                        Nuevo Producto
                    </p>
                    <!-- Modal description -->
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400 ">Nombre Comercial</span>
                        <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Nombre medicamento" wire:model='name' />
                    </label>
                    <x-jet-input-error for="name" />
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400 ">Nombre Genérico</span>
                    </label>
                    <div>
                        <x-lwa::autocomplete
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="generic-name"
                            wire:model-text="gname"
                            wire:model-id="gnameId"
                            wire:model-results="gnames"
                            :options="[
                                'text'=> 'gname',
                                'allow-new'=> 'false',
                            ]" />
                    </div>
                    <x-jet-input-error for="pro" />
  
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Laboratorio
                        </span>
                        <select wire:model='laboratory_id'
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            wire:model='laboratory_id'>
                            <option selected>Seleccione un Laboratorio</option>
                            @foreach ($laboratories as $laboratory)
                                <option value="{{$laboratory->id}}">{{ $laboratory->name }}</option>                        
                            @endforeach
                        </select> 
                    </label>   
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Presentación
                        </span>
                        <select
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            wire:model='presentation_id'>
                            <option selected>Seleccione una Presentación</option>
                            @foreach ($presentations as $presentation)
                                <option value="{{ $presentation->id }}">{{ $presentation->name }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
                <footer
                    class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                    {{-- Modal Registrar: Boton Cancelar --}}
                    <button @click="open = false, Livewire.emit('resetVariables')"
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-green-700 transition-colors duration-150 border border-green-400 rounded-lg dark:text-green-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-green-500 focus:border-green-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                        Cancelar
                    </button>
                    {{-- Modal Registrar: Boton Registrar --}}
                    <button class="w-full px-5 py-3 text-sm font-medium leading-5 bg-green-700 text-white transition-colors duration-150 dark:bg-green-700 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-green-900 hover:bg-green-900 focus:outline-none focus:shadow-outline-purple"
                        wire:click="save" 
                        @click="Livewire.on('saved', Id => {open = false; })">
                        Registrar
                    </button>
                </footer>
            </div>
        </div>
        {{-- Modal para actualizar productos --}}
        <div x-show="open2" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
            <!-- Modal -->
            <div x-show="open2" x-transition:enter="transition ease-out duration-150"
                x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="open2 = false, Livewire.emit('resetVariables')"
                @keydown.escape="open2 = false, Livewire.emit('resetVariables')"
                {{-- Esto hace que el modal no se abra ni bien se entra en la pagina --}}
                :class="{'block':open2, 'hidden': !open2}"
                class="hidden w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
                role="dialog" id="modal">
                <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
                <header class="flex justify-end">
                    <button
                        class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                        aria-label="close" @click="open2 = false, Livewire.emit('resetVariables')">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                            <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" fill-rule="evenodd">
                            </path>
                        </svg>
                    </button>
                </header>
                <!-- Modal body -->
                <div class="mt-4 mb-6">
                    <!-- Modal title -->
                    <p class="mb-2 text-lg font-semibold text-green-700 dark:text-green-700">
                        Actualizar Producto
                    </p>
                    <!-- Modal description -->
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Nombre Comercial</span>
                        <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Nombre medicamento" wire:model='name' />
                    </label>
                    <x-jet-input-error for="name" />
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Nombre Genérico</span>
                    </label>
                    <div>
                        <x-lwa::autocomplete
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="generic-name"
                            wire:model-text="gname"
                            wire:model-id="gnameId"
                            wire:model-results="gnames"
                            :options="[
                                'text'=> 'gname',
                                'allow-new'=> 'false',
                            ]" />
                    </div>
                    <x-jet-input-error for="pro" />
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Laboratorio
                        </span>
                        <select wire:model='laboratory_id'
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            wire:model='laboratory_id'>
                            <option selected>Seleccione un Laboratorio</option>
                            @foreach ($laboratories as $laboratory)
                                <option value="{{$laboratory->id}}">{{ $laboratory->name }}</option>                        
                            @endforeach
                        </select>
                    </label>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Presentación
                        </span>
                        <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            wire:model='presentation_id'>
                            <option selected>Seleccione una Presentación</option>
                            @foreach ($presentations as $presentation)
                                <option value="{{ $presentation->id }}">{{ $presentation->name }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
                <footer class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                    {{-- Modal Actualizar: Boton Cancelar --}}
                    <button @click="open2 = false, Livewire.emit('resetVariables')"
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-green-700 transition-colors duration-150 border border-green-400 rounded-lg dark:text-green-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-green-500 focus:border-green-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                        Cancelar
                    </button>
                    {{-- Modal Actualizar: Boton Registrar --}}
                    <button class="w-full px-5 py-3 text-sm font-medium leading-5 bg-green-700 text-white transition-colors duration-150 dark:bg-green-700 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-green-900 hover:bg-green-900 focus:outline-none focus:shadow-outline-purple"
                        wire:click="update({{ $num }})" 
                        @click="Livewire.on('updated', Id => {open2 = false;})">
                        Actualizar
                    </button>
                </footer>
            </div>
        </div>
        {{-- Modal para registrar inventario --}}
        <div x-show="inventory" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
            <!-- Modal -->
            <div x-transition:enter="transition ease-out duration-150"
                x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="inventory = false, Livewire.emit('resetVariables')"
                @keydown.escape="inventory = false, Livewire.emit('resetVariables')"
                {{-- Esto hace que el modal no se abra ni bien se entra en la pagina --}}
                :class="{'block':inventory, 'hidden': !inventory}"
                class="hidden w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
                role="dialog" id="modal">
                <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
                <header class="flex justify-end">
                    <button class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                        aria-label="close" @click="inventory = false, Livewire.emit('resetVariables')">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                            <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" fill-rule="evenodd">
                            </path>
                        </svg>
                    </button>
                </header>
                <!-- Modal body -->
                <div class="mt-4 mb-6">
                    <!-- Modal title -->
                    <p class="mb-2 text-lg font-semibold text-green-700 dark:text-green-700">
                        Agregar inventario
                    </p> 
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Stock</span>
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    wire:model='stock' />
                            </label>
                            <x-jet-input-error for="stock" />
                        </div>                        
                        <div>
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Lote</span>
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    wire:model='lot' />
                            </label>
                            <x-jet-input-error for="lot" />
                        </div>                        
                    </div>
                    <div class="grid grid-cols-2 gap-4">                     
                        <div>
                            <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Precio Compra</span>
                            <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                wire:model='price' />
                            </label>
                            <x-jet-input-error for="price" />
                        </div>  
                        <div>
                            <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Precio Venta</span>
                            <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                wire:model='sale_price' />
                            </label>
                            <x-jet-input-error for="sale_price" />
                        </div>                      
                    </div>
                    <div>
                        <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Fecha de Vencimiento</span>
                        <input type="date"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            wire:model='exp_date' />
                        </label>
                        <x-jet-input-error for="exp_date" />
                    </div>  
                </div>
                <footer
                    class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                    {{-- Modal Registrar: Boton Cancelar --}}
                    <button @click="inventory = false, Livewire.emit('resetVariables')"
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-green-700 transition-colors duration-150 border border-green-400 rounded-lg dark:text-green-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-green-500 focus:border-green-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                        Cancelar
                    </button>
                    {{-- Modal Registrar: Boton Registrar --}}
                    <button class="w-full px-5 py-3 text-sm font-medium leading-5 bg-green-700 text-white transition-colors duration-150 dark:bg-green-700 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-green-900 hover:bg-green-900 focus:outline-none focus:shadow-outline-purple"
                        wire:click="addInventory({{ $aux }})" 
                        @click="Livewire.on('saved', Id => {inventory = false; })">
                        Agregar
                    </button>
                </footer>
            </div>
        </div>
        {{-- Lista que muestra productos registrados --}}
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left bg-green-600 dark:bg-green-700 text-gray-50 uppercase border-b dark:border-gray-700 dark:text-gray-50 ">
                        <th class="px-4 py-3">Nombre Comercial</th>
                        <th class="px-4 py-3">Laboratorio</th>
                        <th class="px-4 py-3">Presentación</th>
                        <th class="px-4 py-3">Stock</th>              
                        <th class="px-4 py-3">Usuario</th>               
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($products as $product)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm  dark:bg-green-700 rounded-full px-2 py-1 dark:text-green-100">
                                    <p class="font-semibold">{{ $product->name }}</p>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $product->laboratory->name }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $product->presentation->name}}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $product->stock}}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $product->user->name }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    {{-- Accion de editar dentro de la lista --}}
                                    <button @click="inventory = true"
                                    class="flex items-center justify-between  text-sm font-medium leading-5 text-green-600 rounded-lg dark:text-green-700 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit" wire:click="selectProduct({{ $product->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                          </svg>
                                    </button>
                                    <button @click="open2 = true"
                                    class="flex items-center justify-between  text-sm font-medium leading-5 text-green-600 rounded-lg dark:text-green-700 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit" wire:click="edit({{ $product->id }})">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </button>
                                    {{-- Accion de eliminar dentro de la lista --}}
                                    <button class="flex items-center justify-between  text-sm font-medium leading-5 text-green-600 rounded-lg dark:text-green-700 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Delete" wire:click="$emit('deleteProduct', {{ $product }})">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd">
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
        {{-- Paginación para Lista de productos --}}
        <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
            <span class="flex items-center col-span-3">
                {!! $products->links('pagination::message') !!}
            </span>
            <span class="col-span-2"></span>
            <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                <nav aria-label="Table navigation">
                    {{ $products->links() }}
                </nav>
            </span>
        </div>
    </div>
    {{-- SweetAlet para Eliminar Producto --}}
    @push('script')
        <script>
            Livewire.on('deleteProduct', Product => {
                Swal.fire({
                    title: '¿Estas seguro?',
                    text: "¡No podras revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#15803c',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '!Sí, bórralo!',
                    cancelButtonText: 'Cancelar',
                    iconColor:'#15803c'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // emitir evento al componente
                        Livewire.emit('delete', Product)
                        Swal.fire(
                            '¡Eliminado!',
                            'Producto eliminado.',
                            'success'
                        )
                    }
                })
            })
        </script>
    @endpush
</div>
