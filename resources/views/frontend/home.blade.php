<x-layout-frontend>
    <x-slot:title>
        Page Home
    </x-slot:title>
    <div class="cover">


        <x-navbar></x-navbar>
        <img src="{{ asset('images/bg_cover.jpg') }}" alt="a" class="photo_cover">
        <x-container>
            <div class="cover-content">
                <h1 id="text_cover">{{ __('t.Rent the Perfect Car Easily and Quickly') }}</h1>
                {{-- <p>{{ Str::of( __('t.cover text'))->words(35, ' ...')  }}</p> --}}
                <div class="booking-section">
                    <form action="{{  route('search.frontend.home') }}" method="get">
                        
                        <div class="box-form">
                            <label for="picktime">
                                <i class="material-symbols-outlined">directions_car</i>
                                @lang('t.select brand')
                            </label>
                            <span>
                                <select id="cars" name="company_id">
                                    <option value="">all</option>
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
                                @lang('t.Booking date')
                            </label>
                            <input type="text" name="start_date" id="date_star" placeholder="{{ __('t.Booking date') }}">
                        </div>

                        <div class="box-form">
                            <label for="picktime">
                                <i class="material-symbols-outlined">calendar_month</i>
                                @lang('t.Return date')
                            </label>
                            <input type="text" name="end_date" id="date_end" placeholder="{{ __('t.Return date') }}">
                        </div>

                        <div class="box-form">
                            <button>@lang('t.research')</button>
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
        <x-tit :txt="__('t.titles.available cars')"></x-tit>
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
        <x-tit :txt=" __('t.titles.Quick and easy car rental')"></x-tit>
    </x-container>
    <x-space h="20" />
    <x-container>
        <x-promises></x-promises>
    </x-container>
    <x-space h="100" />
    <x-footer />
</x-layout-frontend>
