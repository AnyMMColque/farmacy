<div>
    {{-- Carrousel de imagenes--}}
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
                <img :src="image" alt="Image" class="absolute inset-0 z-10 h-full w-full object-cover opacity-70" />
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
                    <div class="relative flex p-1 rounded-full bg-white border border-yellow-200 shadow-md md:p-2">
                        <input placeholder="Nombre medicamento" class="w-full p-4 m-2 rounded-full" type="text">
                        <input placeholder="Cantidad solicitada" class="w-full p-4 m-2 rounded-full" type="text">
                        <button type="button" title="Start buying"
                            class="ml-auto py-3 px-6 rounded-full text-center transition bg-gradient-to-b from-green-700 to-yellow-300 hover:to-yellow-300 active:from-green-700 focus:from-green-600 md:px-12">
                            <span class="hidden text-gray-900 font-semibold md:block">
                                Buscar
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 mx-auto text-yellow-900 md:hidden"
                                fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </button>
                    </div>
                </form>
                <p class="mt-8 text-gray-700 lg:w-10/12">Introduce el nombre del medicamento y la cantidad que buscas para 
                    mostrarte todas las farmacias que lo tienen disponible. O busca en nuestra 
                    <a href="#"
                    class="text-yellow-700">lista de medicamentos </a>lo que tu necesites.
                </p>
            </div>
            <div class="ml-auto -mb-24 lg:-mb-12 lg:w-6/12 px-36">
                <img src="https://cdn-icons-png.flaticon.com/512/883/883356.png" class="relative" alt="food illustration" loading="lazy" width="400" height="4500">
            </div>
        </div>
    </div>
</div>
