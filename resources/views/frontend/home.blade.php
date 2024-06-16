

<x-layout-frontend>
    <x-slot:title>
        page home
    </x-slot:title>
    <div class="cover">

        
            <x-navbar></x-navbar>
        
        <x-container>
            <div class="cover-content">
                <h1>Lorem ipsum dolor sit amet, consectetur adipisicing ?</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad natus dolorem, eos vero quidem inventore
                    impedit necessitatibus nemo suscipit voluptate tempore eveniet error totam quo quisquam ea optio non
                    eius.</p>
                <div class="booking-section">
                    <form action="#" method="post">
                        <div class="box-form">
                            <label for="picktime">
                                <i class="material-symbols-outlined">directions_car</i>
                                Date de réservation
                            </label>
                            <span>
                                <select id="cars">
                                    <option value="volvo">Volvo</option>
                                    <option value="saab">Saab</option>
                                    <option value="opel">Opel</option>
                                    <option value="audi">Audi</option>
                                </select>
                                <i class="material-symbols-outlined">arrow_drop_down</i>
                            </span>



                        </div>
                        <div class="box-form">
                            <label for="picktime">
                                <i class="material-symbols-outlined">calendar_month</i>
                                Date de réservation
                            </label>
                            <input type="text" name="t" id="my-element" placeholder="date de réservation">
                        </div>
                        <div class="box-form">
                            <button>recherche</button>
                        </div>
                    </form>
                </div>
            </div>

        </x-container>




    </div>
    <x-space h="100" />
    <x-container>
        <div class="splide" id="splide_home" role="group" aria-label="Splide Basic HTML Example">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide">
                        <img src="{{ asset('images/cars/c1.svg') }}" alt="car-1">
                    </li>
                    <li class="splide__slide">
                        <img src="{{ asset('images/cars/c2.svg') }}" alt="car-1">
                    </li>
                    <li class="splide__slide">
                        <img src="{{ asset('images/cars/c3.svg') }}" alt="car-1">
                    </li>
                    <li class="splide__slide">
                        <img src="{{ asset('images/cars/c4.svg') }}" alt="car-1">
                    </li>
                    <li class="splide__slide">
                        <img src="{{ asset('images/cars/c5.svg') }}" alt="car-1">
                    </li>
                    <li class="splide__slide">
                        <img src="{{ asset('images/cars/c3.svg') }}" alt="car-1">
                    </li>

                </ul>
            </div>
        </div>
    </x-container>


    <x-space h="20" />
    <x-container>
        <x-tit txt="available cars"></x-tit>
    </x-container>
    <x-space h="20" />
    <x-container>

        <div class="boxs">

            @forelse ($cars as $car)
                <x-box-car :carInfo="$car" />
            @empty
                <span>loding</span>
            @endforelse


        </div>
    </x-container>
    <x-space h="50" />
    <x-container>
        <x-tit txt="available cars"></x-tit>
    </x-container>
    <x-space h="20" />
    <x-container>
        <x-promises></x-promises>
    </x-container>
    <x-space h="50" />
    <x-footer />
</x-layout-frontend>
