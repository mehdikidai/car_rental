<x-layout-frontend>
    <x-slot:title>
        page frontend.home
    </x-slot:title>
    <div class="cover">


        <x-navbar></x-navbar>
        <img src="{{ asset('images/bg_cover.jpg') }}" alt="a" class="photo_cover">
        <x-container>
            <div class="cover-content">
                <h1>Lorem ipsum dolor sit amet, consectetur adipisicing ?</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad natus dolorem, eos vero quidem inventore
                    impedit necessitatibus nemo suscipit voluptate tempore eveniet error totam quo quisquam ea optio non
                    eius.</p>
                <div class="booking-section">
                    <form action="{{ route('search.frontend.home') }}" method="get">
                        
                        <div class="box-form">
                            <label for="picktime">
                                <i class="material-symbols-outlined">directions_car</i>
                                Date de réservation
                            </label>
                            <span>
                                <select id="cars" name="company_id">
                                    @foreach ($companies as $company)
                                        <option value="{{$company->id}}">{{$company->name}}</option>
                                    @endforeach


                                </select>
                                <i class="material-symbols-outlined">arrow_drop_down</i>
                            </span>



                        </div>
                        <div class="box-form">
                            <label for="picktime">
                                <i class="material-symbols-outlined">calendar_month</i>
                                Date de réservation
                            </label>
                            <input type="text" name="date_star" id="date_star" placeholder="date de réservation">
                        </div>

                        <div class="box-form">
                            <label for="picktime">
                                <i class="material-symbols-outlined">calendar_month</i>
                                Date de réservation
                            </label>
                            <input type="text" name="date_end" id="date_end" placeholder="date de réservation">
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
