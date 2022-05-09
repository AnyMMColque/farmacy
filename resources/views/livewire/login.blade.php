<div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2 ">
    <div class="w-full ">
        <h1 class="mb-4 text-xl font-semibold text-green-700 dark:text-green-200 ">
            Iniciar Sesión
        </h1>
        <form method="POST" action="/login">
            @csrf           
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nombre de usuario</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="username" placeholder="Numero de CI" />
                <x-jet-input-error for="username" />
            </label>
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Contraseña</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="password" placeholder="***************" type="password" />
                <x-jet-input-error for="password" />
            </label>
            <!-- You should use a button here, as the anchor is only used for the example  -->
            <button class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                type="submit">
                Ingresar
            </button>
        </form>
    </div>
</div>
