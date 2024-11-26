<x-layout-frontend>
    <x-slot:title>
        page car
    </x-slot:title>

    <x-navbar />
    
    <div style="min-height: calc(100vh - 80px)">
        <x-space h="40" />
        <x-container>

            <div class="checkout_box">
                
                @if (session('error_rental'))
                    <script>
                        const notyf = new Notyf({
                            duration: 2000,
                            position: {
                                x: 'center',
                                y: 'bottom',
                            }
                        });
                        notyf.error('{{ session('error_rental') }}');
                    </script>
                @endif
                <div class="form">
                    <div class="tit-checkout">
                        <h2>@lang('t.checkout')</h2>
                    </div>

                    <form action="{{ route('rental.store') }}" method="POST">
                        @csrf
                        <div class="box">
                            <label for="picktime">
                                <i class="material-symbols-outlined">person</i>  @lang('t.Booking date')
                            </label>
                            <input type="text" name="rental_date" id="rental_date" placeholder="{{ __('t.Booking date') }}">
                            {{-- <input type="date" name="date_r" id="d"> --}}
                        </div>
                        <div class="box">
                            <label for="picktime">
                                <i class="material-symbols-outlined">person</i> @lang('t.Return date')
                            </label>
                            <input type="text" name="return_date" id="return_date" placeholder="{{ __('t.Return date') }}">
                            {{-- <input type="date" name="date_r" id="d"> --}}
                        </div>
                        <input type="hidden" name="car_id" value="{{ $car->id }}" id="input_car_id">
                        <div class="box box_details">
                            <span class="detail">
                                @lang('t.details')
                            </span>
                            <table>
                                <tr>
                                    <td>@lang('t.Price')</td>
                                    <td>{{ $car->rental_price . ' DH' }}</td>
                                </tr>
                                <tr>
                                    <td>@lang('t.days')</td>
                                    <td data-price="{{ $car->rental_price }}" id="total_days">-</td>
                                </tr>
                                <tr>
                                    <td>@lang('t.Total')</td>
                                    <td id="rental_total">-</td>
                                </tr>
                            </table>
                        </div>
                        <div class="box">
                            <button type="submit">@lang('t.rent new')</button>
                        </div>
                    </form>
                </div>
                <div class="info">
                    <x-box-car :carInfo="$car" />
                    <div class="info_txt">
                        <p>
                            {{ $car->description  }}
                        </p>
                        
                    </div>
                </div>
            </div>

        </x-container>

    </div>
    <x-footer />


</x-layout-frontend>
