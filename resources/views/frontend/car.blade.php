<x-layout-frontend>
    <x-slot:title>
        page car
    </x-slot:title>

    <x-navbar />
    <x-space h="40" />
    <div style="min-height: calc(100vh - 80px)">
        <x-container>

            <div class="checkout_box">
                <div class="form">
                    <div class="tit-checkout">
                        <h2>checkout</h2>
                    </div>

                    <form action="{{ route('rental.store') }}" method="POST">
                        @csrf
                        <div class="box">
                            <label for="picktime">
                                <i class="material-symbols-outlined">person</i> date de réservation
                            </label>
                            <input type="text" name="rental_date" id="rental_date" placeholder="date de réservation">
                            {{-- <input type="date" name="date_r" id="d"> --}}
                        </div>
                        <div class="box">
                            <label for="picktime">
                                <i class="material-symbols-outlined">person</i> date de réservation
                            </label>
                            <input type="text" name="return_date" id="return_date" placeholder="date de réservation">
                            {{-- <input type="date" name="date_r" id="d"> --}}
                        </div>
                        <input type="hidden" name="car_id" value="{{ '1' }}">
                        <div class="box box_details">
                            <span class="detail">
                                details
                            </span>
                            <table>
                                <tr>
                                    <td>Price</td>
                                    <td>{{$car->rental_price}}</td>
                                </tr>
                                <tr>
                                    <td>Days</td>
                                    <td data-price="{{$car->rental_price}}" id="total_days">-</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td id="rental_total">-</td>
                                </tr>
                            </table>
                        </div>
                        <div class="box">
                            <button type="submit">rent new</button>
                        </div>
                    </form>
                </div>
                <div class="info">
                    <x-box-car :carInfo="$car" />
                </div>
            </div>

        </x-container>

    </div>
    <x-footer />


</x-layout-frontend>
