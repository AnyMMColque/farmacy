<div class="container">
    <x-jet-action-message class="mr-3" on="saved">
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
                    <p class="text-sm text-gray-600 dark:text-gray-200">Mensaje enviado.</p>
                </div>
            </div>
        </div>
    </x-jet-action-message>
    <h1 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"></h1>
    <header class="bg-white dark:bg-gray-800">
        <div class="container px-6 py-16 mx-auto">
            <div class="items-center lg:flex">
                <div class="w-full lg:w-1/2">
                    <div class="lg:max-w-lg">
                        <h1 class="text-2xl font-semibold text-gray-800 dark:text-white lg:text-3xl">Contáctenos</h1>
                        <p class="mt-4 text-gray-600 dark:text-gray-400">
                            Bienvenido, gracias por su tiempo para ponerse en contacto.
                            Esta página es un medio de contacto con nosotros y no pretende sustituir el consejo de
                            un médico.
                            Si tiene alguna pregunta con respecto a su salud personal, consulte a su médico.</p>
                        {{-- Introducir nombre --}}
                        <div class="flex flex-col mt-8 space-y-3 lg:space-y-0 lg:flex-row">
                            <input wire:model='name' type="text"
                                class="px-40 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-opacity-40 focus:ring-blue-300"
                                placeholder="Nombre">
                        </div>
                        {{-- Introducir correo electronico --}}
                        <div wire:model='mail' class="flex flex-col mt-8 space-y-3 lg:space-y-0 lg:flex-row">
                            <input type="text"
                                class="px-40 py-2  text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-opacity-40 focus:ring-blue-300"
                                placeholder="Correo Electrónico">
                        </div>
                        {{-- Introducir asunto --}}
                        <div class="flex flex-col mt-8 space-y-3 lg:space-y-0 lg:flex-row">
                            <input wire:model='message' type="textarea"
                                class="px-40 py-40 border-gray-500 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-opacity-40 focus:ring-blue-300"
                                placeholder="Asunto">
                        </div>
                        {{-- Boton Enviar --}}
                        <div class=" mt-6">
                            <button wire:click='send' class="w-full px-10 py-2 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-green-500 rounded-lg lg:w-auto lg:mx-4 hover:bg-green-400 focus:outline-none focus:bg-green-400">
                                Enviar
                            </button>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center w-full mt-6 lg:mt-0 lg:w-1/2">
                    <img class="w-full h-full max-w-md"
                        src="https://st.depositphotos.com/1257064/4066/v/600/depositphotos_40661525-stock-illustration-medicines.jpg"
                        alt="#">
                </div>
            </div>
        </div>
    </header>
</div>
