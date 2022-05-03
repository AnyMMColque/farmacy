<div class="container">
    @push('styles')
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
            integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
            crossorigin="" />
        <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder/dist/esri-leaflet-geocoder.css" />
    @endpush
    <h1 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Farmacias
    </h1>

    @foreach ($branches as $key => $branch)
        <div class="card lg:card-side bg-base-100 shadow-xl mb-5">
            <div class="grid grid-cols-3 gap-4">
                <div class="col-span-2 h-80 mt-10 m-10" id="{{ $nameId[$key] }}" wire:ignore></div>
                <div class="mt-10">
                    <h2 class="card-title">{{$branch->name}}</h2>
                    <p> <span class="font-bold">Dirección: </span>{{$branch->address}}</p>
                    <p> <span class="font-bold">Teléfono: </span>{{$branch->telephone}}</p>
                </div>
            </div>
        </div>
    @endforeach


    @push('scripts')
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
                integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
                crossorigin=""></script>
        <script src="https://unpkg.com/esri-leaflet"></script>
        <script src="https://unpkg.com/esri-leaflet-geocoder"></script>

        <script>
            setTimeout(render, 500);
            function render() {
                Livewire.emit('renderMap')
                // console.log('😁');
            }
        </script>
    @endpush
</div>
