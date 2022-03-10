<div>
    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endpush
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Nueva venta
    </h2>
    <button
        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-700 dark:bg-green-700 border border-transparent rounded-lg active:bg-green-800 hover:bg-green-800 focus:outline-none focus:shadow-outline-purple"
        @click="setCustomer()">
        cam
    </button>
    <div x-data="{ open: true }" class="mt-4 px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">


        <div wire:ignore>
            <select onchange="setCustomer()" id="customer"
                class="js-example-basic-single block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                name="state">
                <option value=""></option>
                @foreach ($customers as $cus)
                    <option value="{{ $cus->id }}">{{ $cus->name }}</option>
                @endforeach
            </select>
            <select onchange="setCustomer()" id="customer2"
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                name="state">
                <option value=""></option>
                @foreach ($customers as $cus)
                    <option value="{{ $cus->id }}">{{ $cus->name }}</option>
                @endforeach
            </select>
        </div>

        <button
            class="mt-3 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-700 dark:bg-green-700 border border-transparent rounded-lg active:bg-green-800 hover:bg-green-800 focus:outline-none focus:shadow-outline-purple"
            @click="open = !open">
            cam
        </button>

        <div :class="{'block':!open, 'hidden': open}" class="hidden grid grid-cols-3">
            <div>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Nombre</span>
                    <input wire:model="name"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Jane Doe" />
                </label>
                <x-jet-input-error for="name" />
            </div>

            <div>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">C.I.</span>
                    <input wire:model="ci"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Jane Doe" />
                </label>
                <x-jet-input-error for="ci" />
            </div>
            <div>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Teléfono</span>
                    <input wire:model="cellphone"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Jane Doe" />
                </label>
                <x-jet-input-error for="cellphone" />
            </div>
            <div>
                <button
                    class="mt-3 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-700 dark:bg-green-700 border border-transparent rounded-lg active:bg-green-800 hover:bg-green-800 focus:outline-none focus:shadow-outline-purple"
                    wire:click=registerCustomer
                    @click="open = !open">
                    Registar cliente
                </button>
            </div>

        </div>
    </div>
    {{ $search }}
    {{ $customer }}

    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"
                integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            // In your Javascript (external .js resource or <script> tag)
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
        </script>
        <script>
            function setCustomer() {
                var customer = document.getElementById("customer");
                $('#customer2 option:first').text('Month');
                $('#customer option:first').text('Month');
                $('.js-example-basic-single').select2();

                console.log($("#customer2 :selected").text())

                console.log($("#customer :selected").text())
                var selectedValue = customer.options[customer.selectedIndex].value;
                // console.log(selectedValue)
                Livewire.emit('selectCustomer', selectedValue)
            }
        </script>
    @endpush
</div>
