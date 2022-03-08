<div>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Laboratorios
    </h2>
    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nombre</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    wire:model='name' />
                    {{-- Validacion de Nombre --}}
                    <x-jet-input-error for="name" />
            </label>
        </div>
        <div>
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Descripción</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    wire:model='description' />
                    {{-- Validacion de Descripcion --}}
                    <x-jet-input-error for="description" />
            </label>
        </div>
        <div>
            <label class="block text-sm">
                <input type="hidden"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    wire:model='num' />
            </label>
        </div>
    </div>
    {{-- Botones para registrar y actualizar laboratorio --}}
    <div class="py-3">
        <button wire:click='save'
            class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-700 dark:bg-green-700 border border-transparent rounded-lg active:bg-green-800 hover:bg-green-800 focus:outline-none focus:shadow-outline-purple">
            Registrar Laboratorio
        </button>
        @if ($true == true)
            <button wire:click="update('{{ $num }}', '{{ $name }}', '{{ $description }}')"
                class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 dark:bg-green-700 border border-transparent rounded-lg active:bg-green-700 hover:bg-green-700 focus:outline-none focus:shadow-outline-purple">
                Actualizar Laboratorio
            </button>
        @endif
    </div>
    {{-- Mensaje que aparece despues de registrar un laboratorio --}}
    <x-jet-action-message class="mr-3" on="saved">
        <div class="alert alert-success">
            <div class="flex-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-2 stroke-current" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                </svg>
                <label>Registro exitoso</label>
            </div>
        </div>
    </x-jet-action-message>
    {{-- Lista donde se muestran los laboratorios registrados --}}
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300 py-3 my-3">
        Lista de Laboratorios 
    </h4>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left bg-green-600 dark:bg-green-700 text-gray-50 uppercase border-b dark:border-gray-700 dark:text-gray-50 ">
                        <th class="px-4 py-3">Nombre</th>
                        <th class="px-4 py-3">Descripción</th>
                        <th class="px-4 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($laboratories as $laboratory)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div
                                    class="flex items-center text-sm  dark:bg-green-700 rounded-full px-2 py-1 dark:text-green-100">
                                    <p class="font-semibold">{{ $laboratory->name }}</p>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $laboratory->description }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    {{-- Accion de editar dentro de la lista --}}
                                    <button
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-green-600 rounded-lg dark:text-green-700 focus:outline-none focus:shadow-outline-gray
                                        aria-label="Edit" wire:click="edit('{{ $laboratory->id }}','true')">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </button>
                                    {{-- Accion de eliminar dentro de la lista --}}
                                    <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-green-600 rounded-lg dark:text-green-700 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Delete" wire:click="$emit('deleteLaboratory', {{ $laboratory }})">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- Paginación para Lista de Laboratorios --}}
        <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
            <span class="flex items-center col-span-3">
                {!! $laboratories->links('pagination::message') !!}
            </span>
            <span class="col-span-2"></span>
            <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                <nav aria-label="Table navigation">
                    {{$laboratories->links()}}
                </nav>
            </span>
        </div>
    </div>
    {{-- Sweetalert para eliminar laboratorio --}}
    @push('script')
        <script>
            Livewire.on('deleteLaboratory', Laboratory => {
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
                        Livewire.emit('delete', Laboratory)
                        Swal.fire(
                            '¡Eliminado!',
                            'Laboratorio eliminado.',
                            'success'
                        )
                    }
                })
            })
        </script>
    @endpush
</div>
