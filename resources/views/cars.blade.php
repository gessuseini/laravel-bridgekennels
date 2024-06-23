<x-app-layout>
    @if($cars->count() > 0)
        <div class="row full-width gray page-header vertical-align-table">
            <div class="row mt-10 pt-5">
                <h2 style="font-family: 'Open Sans';" class="box-header">NEUESTE FAHRZEUGE</h2>
            </div>
            <div
                class="content-center m-9 md:m-32 lg:m-32 xl:m-24 grid gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-5 p-2"
            >
                @foreach($cars as $car)
                    <!-- Product Item -->
                    <div
                        class="border border-1 hover:border-purple-600 transition-colors bg-white lg:w-11/12"
                    >
                        <a style="text-decoration: none; align-content: center;" href="{{ route('car.view', $car->vehicle_slug) }}">
                            <img
                                src="{{ $car->vehicle_image }}"
                                alt=""
                                class=""
                            />
                            <div class="p-4">
                                <h3 class="text-lg text-center font-bold">
                                    {{ $car->vehicle_brand }} {{ $car->vehicle_model }}
                                </h3>
                                <hr style="background-color: mediumblue; height: 2px;"/>
                                <h5 class="pl-5 p-3">
                                    Kilometerstand: {{ $car->vehicle_mileage }}
                                    <br/>
                                    Erstzulassung: {{ $car->vehicle_year }}
                                    <br/>
                                    Getriebe: {{ $car->vehicle_transmission }}
                                    <br /><div class="pt-2 text-center">
                                        <span style="font-weight: bold; color: mediumblue;">Preis: {{ $car->vehicle_price }} €</span>
                                    </div>
                                </h5>
                            </div>
                        </a>
                    </div>
                    <!--/ Car Item -->
                @endforeach
            </div>
        </div>
    @else
        <div class="row full-width gray page-header vertical-align-table">
            <div class="row mt-10 pt-5">
                <h2 style="font-family: 'Open Sans';" class="box-header">NEUESTE FAHRZEUGE</h2>
            </div>
            <div
                class="content-center m-9 md:m-32 lg:m-32 xl:m-24 grid gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-5 p-2"
            >
                <p class="text-black text-center">There are no cars for sale at the moment!</p>
            </div>
        </div>
    @endif
</x-app-layout>
