<div>
    {{-- Movil nav --}}
    <nav class="bg-white shadow dark:bg-gray-800 md:hidden" x-data="{ open: false }">
        <div class="container px-6 py-3 mx-auto md:flex">
            <div class="flex items-center justify-between">
                <div>
                    <a class="text-2xl font-bold text-gray-800 transition-colors duration-200 transform dark:text-white lg:text-3xl hover:text-gray-700 dark:hover:text-gray-300"
                        href="#">Brand</a>
                </div>
                <!-- Mobile menu button -->
                <div class="flex md:hidden">
                    <button type="button"
                        class="text-gray-500 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400"
                        aria-label="toggle menu" x-on:click="open = ! open">
                        <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                            <path fill-rule="evenodd"
                                d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
            <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
            <div class="w-full md:flex md:items-center md:justify-between">
                <div class="flex flex-col px-2 py-3 -mx-4 md:flex-row md:mx-0 md:py-0" x-show="open">
                    <a href="#"
                        class="px-2 py-1 text-sm font-medium text-gray-700 transition-colors duration-200 transform rounded dark:text-gray-200 hover:bg-gray-900 hover:text-gray-100 md:mx-2">Home</a>
                    <a href="#"
                        class="px-2 py-1 text-sm font-medium text-gray-700 transition-colors duration-200 transform rounded dark:text-gray-200 hover:bg-gray-900 hover:text-gray-100 md:mx-2">About</a>
                    <a href="#"
                        class="px-2 py-1 text-sm font-medium text-gray-700 transition-colors duration-200 transform rounded dark:text-gray-200 hover:bg-gray-900 hover:text-gray-100 md:mx-2">Contact</a>
                    @if (Route::has('login'))
                        @auth
                            <div class="mt-3 md:pl-4 md:mt-0 flex items-center py-2 -mx-1 md:mx-0">
                                {{-- <a class="block w-1/2 px-3 py-2 mx-1 text-sm font-medium leading-5 text-center text-white transition-colors duration-200 transform bg-gray-500 rounded-md hover:bg-blue-600 md:mx-2 md:w-auto" href="/login">Panel de Control</a> --}}
                                <a href="{{ url('/dashboard') }}"
                                    class="text-sm text-gray-700 dark:text-gray-500 underline">Panel de Control</a>
                            </div>
                        @else
                            <a href="/login"
                                class="px-2 py-1 text-sm font-medium text-gray-700 transition-colors duration-200 transform rounded dark:text-gray-200 hover:bg-gray-900 hover:text-gray-100 md:mx-2">Iniciar
                                sesi??n</a>
                            <a href="{{ route('logout') }}"
                                class="px-2 py-1 text-sm font-medium text-gray-700 transition-colors duration-200 transform rounded dark:text-gray-200 hover:bg-gray-900 hover:text-gray-100 md:mx-2">Cerrar
                                sesi??n</a>

                        @endauth
                    @endif
                </div>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                            <path  d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                    </span>
                    <input type="text"
                        class="w-full py-3 pl-10 pr-4 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                        placeholder="Buscar medicamento">
                </div>
            </div>
        </div>
    </nav>
    {{-- Web nav --}}
    <nav class="bg-green-700 dark:bg-green-700 hidden md:block">
        <div class="container px-6 py-3 mx-auto md:flex">
            <div class="flex items-center justify-between">
                <div>
                    <a a href="{{route('home')}}" class="text-2xl font-bold text-gray-200 transition-colors duration-200 transform dark:text-white lg:text-3xl hover:text-gray-700 dark:hover:text-gray-300"
                        href="#">San Lorenzo</a>
                </div>
                <!-- Mobile menu button -->
                <div class="flex md:hidden">
                    <button type="button"
                        class="text-gray-500 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400"
                        aria-label="toggle menu" x-on:click="open = ! open">
                        <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                            <path fill-rule="evenodd"
                                d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
            <!-- web Menu open: "block", Menu closed: "hidden" -->
            <div class="w-full md:flex md:items-center md:justify-between">
                <div class="flex flex-col px-2 py-3 -mx-4 md:flex-row md:mx-0 md:py-0">
                    <a href="{{route('home')}}"
                        class=" px-2 py-1 h1 font-medium text-gray-200 transition-colors duration-200 transform rounded dark:text-gray-200 hover:bg-gray-900 hover:text-gray-100 md:mx-2">
                        Inicio
                    </a>
                    <a href="{{route('pharmacies')}}"
                        class=" px-2 py-1 h1 font-medium text-gray-200 transition-colors duration-200 transform rounded dark:text-gray-200 hover:bg-gray-900 hover:text-gray-100 md:mx-2">
                        Farmacias
                    </a>
                    <a href="{{route('products')}}"
                        class=" px-2 py-1 h1 font-medium text-gray-200 transition-colors duration-200 transform rounded dark:text-gray-200 hover:bg-gray-900 hover:text-gray-100 md:mx-2">
                        Productos
                    </a>
                    <a href="{{route('about')}}"
                        class=" px-2 py-1 h1 font-medium text-gray-200 transition-colors duration-200 transform rounded dark:text-gray-200 hover:bg-gray-900 hover:text-gray-100 md:mx-2">
                        Qui??nes Somos
                    </a>
                    <a href="{{route('contacts')}}"
                        class="px-2 py-1 h1 font-medium text-gray-200 transition-colors duration-200 transform rounded dark:text-gray-200 hover:bg-gray-900 hover:text-gray-100 md:mx-2">
                        Contacto
                    </a>
                </div>
            </div>
            @if (Route::has('login'))
                @auth
                    @if (auth()->user()->getRoleNames()->first() == 'vendedor')
                        <div class="mt-3 md:pl-4 md:mt-0 flex items-center py-2 -mx-1 md:mx-0">
                            <a href="{{ route('admin.sales') }}"
                                class="text-sm text-gray-700 dark:text-gray-500 underline">Panel de Control</a>
                        </div>
                    @elseif (auth()->user()->getRoleNames()->first() == 'Super-Admin')
                    <div class="mt-3 md:pl-4 md:mt-0 flex items-center py-2 -mx-1 md:mx-0">
                        <a href="{{ route('admin.branches') }}"
                            class="text-sm text-gray-700 dark:text-gray-500 underline">Panel de Control</a>
                    </div>
                    @else
                        <div class="mt-3 md:pl-4 md:mt-0 flex items-center py-2 -mx-1 md:mx-0">
                            <a href="{{ route('admin.dashboard') }}"
                                class="text-sm text-gray-700 dark:text-gray-500 underline">Panel de Control</a>
                        </div>
                    @endif
                @else
                    <div class="mt-3 md:pl-4 md:mt-0 flex items-center py-2 -mx-1 md:mx-0">
                        <a class="block w-1/2 px-10 py-2 mx-1 text-sm font-medium leading-5 text-center text-white transition-colors duration-200 transform bg-green-600 rounded-md hover:bg-gray-700 md:mx-2 md:w-auto"
                            href="{{ route('login') }}">Iniciar Sesi??n</a>
                    </div>
                @endauth
            @endif
        </div>
    </nav>
</div>
