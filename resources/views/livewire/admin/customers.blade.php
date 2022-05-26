<div x-data="{ open: false }">
    @push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endpush
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Clientes {{$message}}
    </h2>
    {{-- Alert despues de actualizar cliente --}}
    <x-jet-action-message class="mr-3" on="updated">
        <div class="mb-4 flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="flex items-center justify-center w-12 bg-emerald-500">
                <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z" />
                </svg>
            </div>
            <div class="px-4 py-2 -mx-3">
                <div class="mx-3">
                    <span class="font-semibold text-emerald-500 dark:text-emerald-400">Exito</span>
                    <p class="text-sm text-gray-600 dark:text-gray-200">Cliente Actualizado!</p>
                </div>
            </div>
        </div>
    </x-jet-action-message>
    <div class="grid grid-cols-3 gap-4">
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
                <span class="text-gray-700 dark:text-gray-400">CI / NIT</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    wire:model='ci' />
                {{-- Validacion de Descripcion --}}
                <x-jet-input-error for="ci" />
            </label>
        </div>
        <div>
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">E-mail</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    wire:model='email' />
                {{-- Validacion de Descripcion --}}
                <x-jet-input-error for="email" />
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
    {{-- Botones para registrar y actualizar cliente --}}
    <div class="py-3">
        <button wire:click='save'
            class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-700 dark:bg-green-700 border border-transparent rounded-lg active:bg-green-800 hover:bg-green-800 focus:outline-none focus:shadow-outline-purple">
            Registrar Cliente
        </button>
        @if ($true == true)
            <button
                wire:click="update('{{ $num }}', '{{ $name }}','{{ $ci }}', '{{ $email }}')"
                class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-700 dark:bg-green-700 border border-transparent rounded-lg active:bg-green-700 hover:bg-green-700 focus:outline-none focus:shadow-outline-purple">
                Actualizar Cliente
            </button>
        @endif
    </div>
    {{-- Sweet Alert despues de registrar Cliente --}}
    <x-jet-action-message class="mr-3" on="saved">
        <div class="alert alert-success bg-green-600 dark:bg-green-700 text-white">
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
    {{-- Lista donde se muestran los clientes registrados --}}
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300 py-3 my-3">
        Lista de Clientes
    </h4>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left bg-green-600 dark:bg-green-700 text-gray-50 uppercase border-b dark:border-gray-700 dark:text-gray-50 ">
                        <th class="px-4 py-3">Nombre</th>
                        <th class="px-4 py-3">CI / NIT</th>
                        <th class="px-4 py-3">E-mail</th>
                        <th class="px-4 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($customers as $customer)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div
                                    class="flex items-center text-sm  dark:bg-green-700 rounded-full px-2 py-1 dark:text-green-100">
                                    <p class="font-semibold">{{ $customer->name }}</p>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <div
                                    class="flex items-center text-sm  dark:bg-green-700 rounded-full px-2 py-1 dark:text-green-100">
                                    <p class="font-semibold">{{ $customer->ci }}</p>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $customer->email }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    {{-- Accion de editar dentro de la lista --}}
                                    <button wire:click="selectUser({{$customer->id}})" @click="open = true"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-green-600 rounded-lg dark:text-green-700 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                        </svg>
                                    </button>
                                    {{-- Accion de editar dentro de la lista --}}
                                    <button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-green-600 rounded-lg dark:text-green-700 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit" wire:click="edit('{{ $customer->id }}','true')">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </button>
                                    {{-- Accion de eliminar dentro de la lista --}}
                                    <button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-green-600 rounded-lg dark:text-green-700 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Delete" wire:click="$emit('deleteCustomer', {{ $customer }})">
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
        {{-- Paginacion para presentaciones --}}
        <div
            class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
            <span class="flex items-center col-span-3">
                {!! $customers->links('pagination::message') !!}
            </span>
            <span class="col-span-2"></span>
            <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                <nav aria-label="Table navigation">
                    {{ $customers->links() }}
                </nav>
            </span>
        </div>
    </div>
    {{-- Modal para registrar productos --}}
    <div x-show="open" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
        <!-- Modal -->
        <div x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0  transform translate-y-1/2"
            @click.away="open = false, Livewire.emit('resetVariables')"
            @keydown.escape="open = false, Livewire.emit('resetVariables')" {{-- Esto hace que el modal no se abra ni bien se entra en la pagina --}}
            :class="{ 'block': open, 'hidden': !open }"
            class="hidden w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
            role="dialog" id="modal">
            <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
            <header class="flex justify-end">
                <button
                    class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                    aria-label="close" @click="open = false, Livewire.emit('resetVariables')">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                        <path
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" fill-rule="evenodd">
                        </path>
                    </svg>
                </button>
            </header>
            <!-- Modal body -->
            <div class="mt-4 mb-6">
                <!-- Modal title -->
                <p class="mb-2 text-lg font-semibold text-green-700 dark:text-green-700">
                    Enviar recetario
                </p>
                <!-- Modal description -->
                {{-- <div wire:model="message" id="editor">This is some sample content.</div> --}}
                <textarea wire:model="message" class=" w-full h-40"></textarea>
                <x-jet-input-error for="message" />
                {{-- <label class="block text-sm">
                </label> --}}
            </div>
            <footer
                class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                {{-- Modal Registrar: Boton Cancelar --}}
                <button @click="open = false, Livewire.emit('resetVariables')"
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-green-700 transition-colors duration-150 border border-green-400 rounded-lg dark:text-green-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-green-500 focus:border-green-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                    Cancelar
                </button>
                {{-- Modal Registrar: Boton Registrar --}}
                <button
                    class="w-full px-5 py-3 text-sm font-medium leading-5 bg-green-700 text-white transition-colors duration-150 dark:bg-green-700 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-green-900 hover:bg-green-900 focus:outline-none focus:shadow-outline-purple"
                    wire:click="send" @click="Livewire.on('saved', Id => {open = false; })">
                    Enviar
                </button>
            </footer>
        </div>
    </div>
    {{-- Sweetalert cuando se eliminan clientes --}}
    @push('script')
        <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
        <script>
            Livewire.on('deleteCustomer', Customer => {
                Swal.fire({
                    title: '¿Estas seguro?',
                    text: "No podras revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#15803c',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, borralo!',
                    cancelButtonText: 'Cancelar',
                    iconColor: '#15803c'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // emitir evento al componente
                        Livewire.emit('delete', Customer)
                        Swal.fire(
                            'Eliminado!',
                            'Cliente eliminado.',
                            'success'
                        )
                    }
                })
            })
        </script>
    @endpush
</div>
