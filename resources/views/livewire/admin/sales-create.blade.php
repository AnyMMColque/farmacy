@php
use App\Models\Product;
@endphp
<div x-data="{
    open: true,
    open2: false,
    button: true
}">
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    @endpush
    {{-- Alert que se muestra si se introduce el mismo producto --}}
    <x-jet-action-message class="mt-4 mb-2" on="exist">
        <div class="flex w-full max-w-lg mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="flex items-center justify-center w-12 bg-red-500">
                <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z" />
                </svg>
            </div>
            <div class="px-4 py-2 -mx-3">
                <div class="mx-3">
                    <span class="font-semibold text-red-500 dark:text-red-400">Error</span>
                    <p class="text-sm text-gray-600 dark:text-gray-200">¡Este producto ya a sido agregado!</p>
                </div>
            </div>
        </div>
    </x-jet-action-message>
    {{-- Alert que se muestra cuando se registra un producto --}}
    <x-jet-action-message class="mt-4 mb-2" on="saved">
        <div class="flex w-full max-w-lg mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="flex items-center justify-center w-12 bg-emerald-500">
                <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z" />
                </svg>
            </div>
            <div class="px-4 py-2 -mx-3">
                <div class="mx-3">
                    <span class="font-semibold text-emerald-500 dark:text-emerald-400">Exito</span>
                    <p class="text-sm text-gray-600 dark:text-gray-200">¡Cliente resgistrado!</p>
                </div>
            </div>
        </div>
    </x-jet-action-message>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Nueva venta
        <div class="mt-4 px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            {{-- Seleccionar y agregar Productos --}}
            <div class="mt-4 grid grid-cols-5 gap-5">
                <div class="col-span-2">
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Seleccionar productos</span>
                        <div wire:ignore>
                            <select onchange="setProduct()" id="products"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                name="state">
                                <option value="0" disabled selected>Selecciona un producto</option>
                                @foreach ($products as $prod)
                                    <option value="{{ $prod->id }}" wire:key='{{ $prod->id }}'>
                                        {{ $prod->name . ' - ' . $prod->g_name }}
                                        ({{ $prod->presentation->name }})
                                    </option>
                                    {{-- <option value="{{ $prod->id }}" wire:key='{{ $prod->id }}'>{{ $prod->g_name }}
                                    ({{ $prod->presentation->name }})</option> --}}
                                @endforeach
                            </select>
                        </div>
                    </label>
                    <x-jet-input-error for="listProducts" />
                    <x-jet-input-error for="product" />
                </div>

                <div class="col-span-2">
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Seleccionar lote</span>
                        @if (!is_null($product))
                            <select wire:model="lot" id="lot"
                                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                <option value="" selected>Selecciona un producto</option>
                                @foreach ($product->inventories as $lote)
                                    @if ($lote->stock !== 0 && $lote->status == 0)
                                        <option value="{{ $lote->lot }}">{{ $lote->lot }}</option>
                                    @endif
                                @endforeach
                            </select>
                        @else
                            <select disabled
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                name="state">
                                <option value="" disabled selected>Selecciona un producto</option>
                            </select>
                        @endif

                    </label>
                    <x-jet-input-error for="lot" />
                </div>

                <div class="col-span-1">
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Cantidad</span>
                        <input wire:model="quantity" type="number" min="0" step="1"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="0" />
                    </label>
                    <x-jet-input-error for="quantity" />
                </div>
                <button
                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-700 dark:bg-green-700 border border-transparent rounded-lg active:bg-green-800 hover:bg-green-800 focus:outline-none focus:shadow-outline-purple"
                    wire:click="addProducts">
                    Agregar productos
                </button>
            </div>
            {{-- Seleccionar y agregar Clientes --}}
            <label class="mt-4 block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Seleccionar Cliente</span>
                <div wire:ignore>
                    <select onchange="setCustomer()" id="customer"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        name="state">
                        <option value="0" disabled selected>Selecciona un cliente</option>
                        @foreach ($customers as $cus)
                            <option value="{{ $cus->id }}" wire:key='{{ $cus->id }}'>{{ $cus->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </label>
            <x-jet-input-error for="customer" />
            {{-- Boton para registrar a un nuevo cliente desde ventas --}}
            <template x-if="open">
                <button
                    class="mt-3 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-700 dark:bg-green-700 border border-transparent rounded-lg active:bg-green-800 hover:bg-green-800 focus:outline-none focus:shadow-outline-purple"
                    @click="open = !open">
                    Registrar nuevo cliente
                </button>
            </template>
            {{-- Aqui registramos la informacion del nuevo cliente --}}
            <div :class="{ 'block': !open, 'hidden': open }" class="hidden grid grid-cols-3 gap-5">
                <div>
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Nombre</span>
                        <input wire:model="name"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                    </label>
                    <x-jet-input-error for="name" />
                </div>
                <div>
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">CI / NIT</span>
                        <input wire:model="ci"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                    </label>
                    <x-jet-input-error for="ci" />
                </div>
                <div>
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">E-mail</span>
                        <input wire:model="email"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                    </label>
                    <x-jet-input-error for="email" />
                </div>
                <div>
                    <button
                        class="mt-3 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-700 dark:bg-green-700 border border-transparent rounded-lg active:bg-green-800 hover:bg-green-800 focus:outline-none focus:shadow-outline-purple"
                        wire:click="registerCustomer" @click="Livewire.on('saved', () => { open = true; })">
                        Registar cliente
                    </button>
                </div>

            </div>
        </div>
        {{-- Lista que muestra productos registrados --}}
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left bg-green-600 dark:bg-green-700 text-gray-50 uppercase border-b dark:border-gray-700 dark:text-gray-50 ">
                        <th class="px-4 py-3">Producto</th>
                        <th class="px-4 py-3">Lote</th>
                        <th class="px-4 py-3">Precio</th>
                        <th class="px-4 py-3">Cantidad</th>
                        <th class="px-4 py-3">Subtotal</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                {{-- Aqui introducimos la informacion de los productos que seran vendidos --}}
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($input as $key => $product)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div
                                    class="flex items-center text-sm  dark:bg-green-700 rounded-full px-2 py-1 dark:text-green-100">
                                    <p class="font-semibold">{{ $product->name }}</p>
                                </div>
                            </td>
                            @php
                                $lot1 = $product->inventories->where('lot', $lots[$key])->first();
                            @endphp
                            <td class="px-4 py-3 text-sm">
                                {{ $lot1->lot }}
                            </td>
                            <td class="px-4 py-3 text-sm">

                                {{ $lot1->sale_price }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <span class="px-2 py-1">
                                    {{ $subtotal[$key] }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $lot1->sale_price * $subtotal[$key] }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    {{-- Accion de eliminar dentro de la lista --}}
                                    <button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-green-600 rounded-lg dark:text-green-700 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Delete"
                                        wire:click="removeProduct({{ $product->id }}, {{ $key }}, {{ $lot1->lot }})">
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
        <div class="grid justify-items-stretch grid-cols-10 gap-5">
            {{-- Total --}}
            <div class="justify-items-stretch">
                <div class="mt-4 mb-4">
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Total</span>
                        <input wire:model="total" disabled min="0" max="10" step="1"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="0" />
                    </label>
                    <x-jet-input-error for="total" />
                </div>
            </div>
            {{-- Descuento --}}
            <div class="justify-items-stretch">
                <div class="mt-4 mb-4">
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Descuento</span>
                        <input wire:model.lazy="discount" type="number" min="0" max="10" step="1"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="0" />
                    </label>
                    <x-jet-input-error for="discount" />
                </div>
            </div>
            {{-- Total a Pagar --}}
            <div class="justify-items-stretch">
                <div class="mt-4 mb-4">
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Total a pagar</span>
                        <input wire:model.lazy="pay"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="0" />
                        <x-jet-input-error for="pay" />
                    </label>
                    <x-jet-action-message class="mt-4 mb-2" on="pay">
                        Incorrecto
                    </x-jet-action-message>
                </div>
            </div>
            {{-- Cambio --}}
            <div class="justify-items-stretch">
                @if ($change)
                    <div class="mt-4 mb-4">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Cambio</span>
                            <input value="{{ $pay - ($total - $discount) }}" disabled type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="0" />
                        </label>
                        <x-jet-input-error for="discount" />
                    </div>
                @endif
            </div>
        </div>
        <div>
            <button wire:click="saveOrder" wire:loading.attr="disabled"
                class="mt-3 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-700 dark:bg-green-700 border border-transparent rounded-lg active:bg-green-800 hover:bg-green-800 focus:outline-none focus:shadow-outline-purple">
                Registrar venta
            </button>
            <a href="{{ route('admin.sales') }}"
                class="cursor-pointer mt-3 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-700 dark:bg-red-700 border border-transparent rounded-lg active:bg-red-800 hover:bg-red-800 focus:outline-none focus:shadow-outline-purple">
                Cancelar
            </a>
        </div>
</div>

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"
        integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
            $('.js-products-basic-single').select2();
            $('#products').select2();
            $('#customer').select2();
        });
    </script>
    <script>
        function setCustomer() {
            var customer = document.getElementById('customer');
            var selectedCustomer = customer.options[customer.selectedIndex].value;
            console.log(selectedCustomer)
            Livewire.emit('selectCustomer', selectedCustomer)
        }

        /* ubica al usuario creado en el select */
        Livewire.on('select', (name, id) => {
            // console.log(name)
            $('#customer option:first').text(name);
            $('#customer').val(0);
            $('#customer option:selected').prop('disabled', false);
            $('#customer').select2();
            var customer = document.getElementById('customer');
            customer.options[customer.selectedIndex].value = id;
            // console.log(id)
        })

        Livewire.on('clearProduct', () => {
            // Set selected 
            $('#products').val(0);
            $('#products').select2();
        })

        function setProduct() {
            var product = document.getElementById('products');
            var selectedProduct = product.options[product.selectedIndex].value;
            // console.log(selectedProduct)
            Livewire.emit('selectProduct', selectedProduct)
        }
    </script>
@endpush
</div>
