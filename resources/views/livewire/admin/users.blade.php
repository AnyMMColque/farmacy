<div x-data="{ open: false, open2: false, rol: false }">
    {{-- Alert despues de registrar un usuario --}}
    <x-jet-action-message class="" on="saved">
        <div
            class="mt-4 mb-4 flex w-full max-w-lg mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="flex items-center justify-center w-12 bg-emerald-500">
                <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z" />
                </svg>
            </div>
            <div class="px-4 py-2 -mx-3">
                <div class="mx-3">
                    <span class="font-semibold text-emerald-500 dark:text-emerald-400">Exito</span>
                    <p class="text-sm text-gray-600 dark:text-gray-200">Usuario Registrado!</p>
                </div>
            </div>
        </div>
    </x-jet-action-message>
    {{-- Alert despues de actualizar un usuario --}}
    <x-jet-action-message class="" on="updated">
        <div
            class="mt-4 mb-4 flex w-full max-w-lg mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="flex items-center justify-center w-12 bg-emerald-500">
                <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z" />
                </svg>
            </div>
            <div class="px-4 py-2 -mx-3">
                <div class="mx-3">
                    <span class="font-semibold text-emerald-500 dark:text-emerald-400">Exito</span>
                    <p class="text-sm text-gray-600 dark:text-gray-200">Usuario Actualizado!</p>
                </div>
            </div>
        </div>
    </x-jet-action-message>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Usuarios
    </h2>
    {{-- Boton para registrar nuevo usuario --}}
    <div>
        <button @click="open = true"
            class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-700 dark:bg-green-700 border border-transparent rounded-lg active:bg-green-800 hover:bg-green-800 focus:outline-none focus:shadow-outline-purple">
            Registrar Usuario
        </button>
        {{-- <button @click="rol = true"
            class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-700 dark:bg-green-700 border border-transparent rounded-lg active:bg-green-800 hover:bg-green-800 focus:outline-none focus:shadow-outline-purple">
            Registrar Roles
        </button> --}}
    </div>
    {{-- Tabla donde se muestran los usuarios registrados --}}
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300 py-3 my-3">
        Lista de Usuarios
    </h4>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left bg-green-600 dark:bg-green-700 text-gray-50 uppercase border-b dark:border-gray-700 dark:text-gray-50 ">
                        <th class="px-4 py-3">Nombre</th>
                        <th class="px-4 py-3">CI</th>
                        <th class="px-4 py-3">Dirección</th>
                        <th class="px-4 py-3">Telefono</th>
                        <th class="px-4 py-3">Nombre de Usuario</th>
                        <th class="px-4 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($users as $user)
                        @if ($user->id !== 1 && $user->id !== auth()->user()->id)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm  dark:bg-green-700 rounded-full px-2 py-1 dark:text-green-100">
                                        <p class="font-semibold">{{ $user->name }}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $user->ci }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $user->address }}
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    <span class="px-2 py-1">
                                        {{ $user->telephone }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $user->username }}
                                </td>
                                {{-- Accion de editar  --}}
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-green-600 rounded-lg dark:text-green-700 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Edit" wire:click="edit('{{ $user->username }}')"
                                            @click="open2 = !open2">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                </path>
                                            </svg>
                                        </button>
                                        {{-- Dar de Alta y Baja a los usuarios --}}
                                        @if ($user->email_verified_at)
                                            <div class="flex justify-center">
                                                <button wire:click="register('{{ $user->id }}')"
                                                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-purple">
                                                    Alta
                                                </button>
                                            </div>
                                        @else
                                            <div class="flex justify-center">
                                                <button wire:click="register('{{ $user->id }}')"
                                                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple">
                                                    Baja
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- Paginación para Lista de Usuarios --}}
        <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
            <span class="flex items-center col-span-3">
                {!! $users->links('pagination::message') !!}
            </span>
            <span class="col-span-2"></span>
            <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                <nav aria-label="Table navigation">
                    {{$users->links()}}
                </nav>
            </span>
        </div>
    </div>
    {{-- Modal para registrar Usuarios --}}
    <div x-show="open" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
        <!-- Modal -->
        <div x-show="open" x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="open = false"
            @keydown.escape="open = false"
            class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
            role="dialog" id="modal">
            <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
            <header class="flex justify-end">
                <button class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                    aria-label="close" @click="open = false">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                        <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>
            </header>
            <!-- Modal body -->
            <div class="mt-4 mb-6">
                <!-- Modal title -->
                <p class="mb-2 text-lg font-semibold text-green-700 dark:text-green-700">
                    Nuevo Usuario
                </p>
                <!-- Modal description -->
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Nombre</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        wire:model='name' />
                    <x-jet-input-error for="name" />
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">CI</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        wire:model='ci' />
                    <x-jet-input-error for="ci" />
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Dirección</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        wire:model='address' />
                    <x-jet-input-error for="address" />
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Teléfono</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        wire:model='telephone' />
                    <x-jet-input-error for="telephone" />
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Nombre de usuario</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        wire:model='username' disabled />
                    <x-jet-input-error for="username" />
                </label>
                {{-- Asignamos Roles --}}
                @role('Super-Admin')
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Asignar Rol</span>
                        <select wire:model="rol"
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            @foreach ($roles as $role)
                                <option value="{{ $role }}">{{ $role }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="username" />
                    </label>
                @endrole
                @if (auth()->user()->getRoleNames()->first() !== 'Super-Admin')
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Asignar Rol</span>
                        <select wire:model="rol"
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            @foreach ($roles as $role)
                                @if ($role !== 'Super-Admin')
                                    <option value="{{ $role }}">{{ $role }}</option>
                                @endif
                            @endforeach
                        </select>
                        <x-jet-input-error for="username" />
                    </label>
                @endif
                {{-- Asignar una farmacia --}}
                @role('Super-Admin')
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Designar Farmacia</span>
                        <select wire:model='branch'
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option value="">Seleccionar una farmacia</option>
                            @foreach ($branches as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="branch" />
                    </label>
                @endrole
            </div>
            <footer class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                <button @click="open = !open"
                class="w-full px-5 py-3 text-sm font-medium leading-5 text-green-700 transition-colors duration-150 border border-green-300 rounded-lg dark:text-green-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-green-500 focus:border-green-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                    Cancelar
                </button>
                <button class="w-full px-5 py-3 text-sm font-medium leading-5 bg-green-700 text-white transition-colors duration-150 dark:bg-green-700 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-green-900 hover:bg-green-900 focus:outline-none focus:shadow-outline-purple"
                    wire:click="save" @click="Livewire.on('saved', () => { open = !open })">
                    Registrar
                </button>
            </footer>
        </div>
    </div>
    <!-- End of modal backdrop -->
    {{-- Modal para Editar Usuarios --}}
    <div x-show="open2" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
        <!-- Modal -->
        <div x-show="open2" x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="open2 = false"
            @keydown.escape="open2 = false"
            class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
            role="dialog" id="modal">
            <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
            <header class="flex justify-end">
                <button class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                    aria-label="close" @click="open2 = false">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                        <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>
            </header>
            <!-- Modal body -->
            <div class="mt-4 mb-6">
                <!-- Modal title -->
                <p class="mb-2 text-lg font-semibold text-green-700 dark:text-green-700">
                    Actualizar Usuario
                </p>
                <!-- Modal description -->
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Nombre</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        wire:model='name' />
                    <x-jet-input-error for="name" />
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">CI</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        wire:model='ci' />
                    <x-jet-input-error for="ci" />
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Dirección</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        wire:model='address' />
                    <x-jet-input-error for="address" />
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Teléfono</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        wire:model='telephone' />
                    <x-jet-input-error for="telephone" />
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Nombre de usuario</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        wire:model='username' disabled />
                    <x-jet-input-error for="username" />
                </label>
                @role('Super-Admin')
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Asignar Rol</span>
                        <select wire:model="rol"
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            @foreach ($roles as $role)
                                <option value="{{ $role }}">{{ $role }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="rol" />
                    </label>
                @endrole
                @if (auth()->user()->getRoleNames()->first() !== 'Super-Admin')
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Asignar Rol</span>
                        <select wire:model="rol"
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            @foreach ($roles as $role)
                                @if ($role !== 'Super-Admin')
                                    <option value="{{ $role }}">{{ $role }}</option>
                                @endif
                            @endforeach
                        </select>
                        <x-jet-input-error for="rol" />
                    </label>
                @endif

                @role('Super-Admin')
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Designar sucursal</span>
                        <select wire:model='branch'
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option value="">Seleccionar una farmacia</option>
                            @foreach ($branches as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="branch" />
                    </label>
                @endrole
            </div>
            <footer
                class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                <button @click="open2 = !open"
                class="w-full px-5 py-3 text-sm font-medium leading-5 text-green-700 transition-colors duration-150 border border-green-300 rounded-lg dark:text-green-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-green-500 focus:border-green-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                    Cancelar
                </button>
                <button class="w-full px-5 py-3 text-sm font-medium leading-5 bg-green-700 text-white transition-colors duration-150 dark:bg-green-700 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-green-900 hover:bg-green-900 focus:outline-none focus:shadow-outline-purple"
                    wire:click="update('{{ $user->username }}')"
                    @click="Livewire.on('updated', () => { open2 = false })">
                    Registrar
                </button>
            </footer>
        </div>
    </div>
    <!-- End of modal backdrop -->
    {{-- Modal para Roles --}}
    <div x-show="rol" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
        <!-- Modal -->
        <div x-show="rol" x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="rol = false"
            @keydown.escape="rol = false"
            class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
            role="dialog" id="modal">
            <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
            <header class="flex justify-end">
                <button
                    class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                    aria-label="close" @click="rol = false">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                        <path
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>
            </header>
            <!-- Modal body -->
            <div class="mt-4 mb-6">
                <!-- Modal title -->
                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                    Nuevo Rol
                </p>
                <!-- Modal description -->
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Rol</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        wire:model='rol' />
                    <x-jet-input-error for="name" />
                </label>
                <p class="mt-8 mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                    Permisos
                </p>


                <div class="grid grid-cols-5 gap-6">
                    <div>
                        <span class="text-gray-700 dark:text-gray-400">Crear</span>
                        <input type="checkbox" wire:model="create"
                            class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        {{ var_dump($create) }}
                    </div>

                    <div>
                        <span class="text-gray-700 dark:text-gray-400">Leer</span>
                        <input type="checkbox" wire:model="read"
                            class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                    </div>

                    <div>
                        <span class="text-gray-700 dark:text-gray-400">Editar</span>
                        <input type="checkbox" wire:model="update"
                            class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                    </div>
                    <div>
                        <span class="text-gray-700 dark:text-gray-400">Eliminar</span>
                        <input type="checkbox" wire:model="delete"
                            class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                    </div>
                </div>

            </div>
            <footer
                class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                <x-jet-action-message class="mr-3" on="saved">
                    <div class="alert alert-success">
                        <div class="flex-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-2 stroke-current" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                            </svg>
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-6 h-6 mx-2 stroke-current">          
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>                
                </svg> --}}
                            <label>Registro exitoso</label>
                        </div>
                    </div>
                </x-jet-action-message>
                <button @click="rol = !rol"
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                    Cancelar
                </button>
                <button
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 dark:bg-green-700 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    wire:click="saveRole">
                    Registrar
                </button>
            </footer>
        </div>
    </div>
    <!-- End of modal backdrop -->
</div>
