<div>
    {{-- Carrousel de imagenes --}}
    <script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>
    <article x-data="slider" class="relative w-full flex flex-shrink-0 overflow-hidden shadow-2xl">
        <div class="rounded-full bg-gray-600 text-white absolute top-5 right-5 text-sm px-2 text-center z-10">
            <span x-text="currentIndex"></span>
            <span x-text="images.length"></span>
        </div>
        <template x-for="(image, index) in images">
            <figure class="h-96" x-show="currentIndex == index + 1"
                x-transition:enter="transition transform duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="transition transform duration-300"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                <img :src="image" alt="Image"
                    class="absolute inset-0 z-10 h-full w-full object-cover opacity-70" />
            </figure>
        </template>
        <button @click="back()"
            class="absolute left-14 top-1/2 -translate-y-1/2 w-11 h-11 flex justify-center items-center rounded-full shadow-md z-10 bg-gray-100 hover:bg-gray-200">
            <svg class=" w-8 h-8 font-bold transition duration-500 ease-in-out transform motion-reduce:transform-none text-gray-500 hover:text-gray-600 hover:-translate-x-0.5"
                fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>
        <button @click="next()"
            class="absolute right-14 top-1/2 translate-y-1/2 w-11 h-11 flex justify-center items-center rounded-full shadow-md z-10 bg-gray-100 hover:bg-gray-200">
            <svg class=" w-8 h-8 font-bold transition duration-500 ease-in-out transform motion-reduce:transform-none text-gray-500 hover:text-gray-600 hover:translate-x-0.5"
                fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    </article>
    {{-- Script carrousel de imagenes --}}
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('slider', () => ({
                currentIndex: 1,
                images: [
                    'https://www.angelinifarmacias.es/wp-content/uploads/2016/07/pastillas_c673cd36-1000x600.jpg',
                    'https://gacetamedica.com/wp-content/uploads/2020/09/Farmacia-hospital-1146454842-scaled.jpg',
                    'https://www.farmaciascatedral.com/wp-content/uploads/2021/04/farmacia.jpg',
                    'https://blog.iniciativasempresariales.com/wp-content/uploads/2020/02/Farmacologia_Auxiliares_Farmacia.jpg',
                    'https://s1.eestatic.com/2022/02/04/ciencia/salud/647696174_221630410_1024x576.jpg'
                ],
                back() {
                    if (this.currentIndex > 1) {
                        this.currentIndex = this.currentIndex - 1;
                    }
                },
                next() {
                    if (this.currentIndex < this.images.length) {
                        this.currentIndex = this.currentIndex + 1;
                    } else if (this.currentIndex <= this.images.length) {
                        this.currentIndex = this.images.length - this.currentIndex + 1
                    }
                },
            }))
        })
    </script>
    <!--Busqueda de medicamento-->
    <div class="container m-auto">
        <div class="flex items-center flex-wrap px-2 md:px-0">
            <div class="relative lg:w-6/12 lg:py-24 xl:py-10">
                <h1 class="font-bold text-4xl text-green-900 md:text-5xl lg:w-10/12">
                    Busca la disponibilidad del medicamento que tu necesites</h1>
                <form action="" class="w-full mt-12">
                    <div class="relative flex p-1 rounded-full bg-white dark:bg-gray-800 border border-yellow-200 shadow-md md:p-2">
                        <input placeholder="Nombre medicamento" class="w-full p-4 m-2 rounded-full dark:bg-gray-800" type="text"
                            wire:model="name">
                            <x-jet-input-error for="name" />
                        <input placeholder="Cantidad solicitada" class="w-full p-4 m-2 rounded-full dark:bg-gray-800" type="text"
                            wire:model="stock">
                            <x-jet-input-error for="stock" />
                        <button wire:click="ShowProducts" type="button" title="Start buying"
                            class="ml-auto py-3 px-6 p-4 m-2 rounded-full text-center transition bg-gradient-to-b from-green-700 to-yellow-300 hover:to-yellow-300 active:from-green-700 focus:from-green-600 md:px-12">
                            <span class="hidden text-gray-900 font-semibold md:block">
                                Buscar
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 mx-auto text-yellow-900 md:hidden"
                                fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </button>
                    </div>
                </form>
                @if (isset($products))
                <div class="mt-4 max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
                    <img class="object-cover object-center w-full h-56"
                        src="https://tevafarmacia.es/sites/default/files/styles/max_650x650/public/tv-post-images/2020-10/dibujos-para-pacientes.jpg?itok=CKQkGDW3"
                        alt="avatar">
                    <div class="flex items-center px-6 py-3 bg-green-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9 9a2 2 0 114 0 2 2 0 01-4 0z" />
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a4 4 0 00-3.446 6.032l-2.261 2.26a1 1 0 101.414 1.415l2.261-2.261A4 4 0 1011 5z" clip-rule="evenodd" />
                        </svg>
                        <h1 class="mx-3 text-lg font-semibold text-white">Buscando medicamento...</h1>
                    </div>
                    @foreach ($products as $product)
                        @if ($product->branch->turn == 'si')
                            <div class="max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
                                <div class="px-6 py-4">
                                    <div class="flex items-center mt-4 text-gray-700 dark:text-gray-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                        </svg>
                                        <h1 class="px-2 text-sm">Nombre: {{ $product->name }}</h1>
                                    </div>
                                    <div class="flex items-center mt-4 text-gray-700 dark:text-gray-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                        <h1 class="px-2 text-sm">Cantidad: {{ $product->stock }}</h1>
                                    </div>
                                    <div class="flex items-center mt-4 text-gray-700 dark:text-gray-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <h1 class="px-2 text-sm"><a href="{{route('pharmacies')}}">Farmacia: {{ $product->branch->name }}</a></h1>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endif
                    @endforeach
                </div>
                @else
                    <p class="mt-8 text-gray-700 lg:w-10/12">Introduce el nombre del medicamento y la cantidad que
                        buscas para
                        mostrarte todas las farmacias que lo tienen disponible. O busca en nuestra
                        <a href="#" class="text-yellow-700">lista de medicamentos </a>lo que tu necesites.
                    </p>
                @endif
            </div>
            <div class="ml-auto -mb-24 lg:-mb-12 lg:w-6/12 px-36">
                <img src="https://cdn-icons-png.flaticon.com/512/883/883356.png" class="relative"
                    alt="food illustration" loading="lazy" width="400" height="4500">
            </div>
        </div>
    </div>
</div>
