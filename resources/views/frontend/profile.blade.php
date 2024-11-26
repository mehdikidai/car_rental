<x-layout-frontend>
    <x-slot:title>
        Page Profile
    </x-slot:title>

    <x-navbar />

    <div style="min-height: calc(100dvh - 70px)">

        @if (session('ok'))
            <script>
                const notyf = new Notyf({
                    duration: 10000,
                    position: {
                        x: 'right',
                        y: 'top',
                    }
                });
                notyf.success('{{ session('ok') }}');
            </script>
        @endif
        <x-space h="80" />
        <x-container>

            <div class="profile-page-card">

                <a href="{{ route('profile.edit') }}" class="btn_update_profile">
                    <i class="material-symbols-outlined icon">edit</i>
                </a>

                <div class="user_profile">

                    <div class="photo"><img src="{{ asset('images/avatar/49.png') }}" alt="user"></div>
                    <span class="name">{{ $user->name }} <i class="material-symbols-outlined">check_circle</i></span>


                </div>
                <div class="info_user">
                    <div class="box">
                        <i class="material-symbols-outlined icon">drafts</i>
                        <small>{{ $user->email }}</small>
                    </div>
                    {{-- <div class="box">
                        <i class="material-symbols-outlined icon">home</i>
                        <small>{{ $user->customer->address }}</small>
                    </div> --}}
                    <div class="box">
                        <i class="material-symbols-outlined icon">phone_in_talk</i>
                        <small>{{ $user->customer->phone }}</small>
                    </div>
                    <div class="box">
                        <i class="material-symbols-outlined icon">local_taxi</i>
                        <small>{{ $my_cars->total() }}</small>
                    </div>
                </div>
            </div>

            <x-space h="20" />
            @if ($my_cars->isEmpty())
                <div class="no_cars">
                    <i class="material-symbols-outlined">car_tag</i>
                    <p>No car reservations found.</p>
                </div>
            @else
                <div class="bbx">
                    <table id="customers">
                        <tr>
                            <th>@lang('t.Car')</th>
                            <th>@lang('t.Model')</th>
                            <th>Booking date</th>
                            <th>Pickup Date</th>
                            <th>@lang('t.Return date')</th>
                            <th>@lang('t.Duration')</th>
                            <th>@lang('t.Price')</th>
                            <th>@lang('t.Status')</th>
                            <th>_</th>

                        </tr>
                        @foreach ($my_cars as $car)
                            <tr>
                                <td><a href="{{ route('car.show', $car->car->id) }}">{{ $car->car->company->name }}</a>
                                </td>
                                <td>{{ $car->car->model->name }}</td>
                                <td>{{ $car->created_at->isoFormat('dddd,D MMMM Y') }}</td>
                                <td>{{ $car->rental_date }}</td>
                                <td>{{ $car->return_date }}</td>
                                <td>{{ $car->days }}</td>
                                <td>{{ $car->total_price . ' Dh' }}</td>
                                <td>{{ !true ? 'Confirmed' : 'Pending' }}</td>
                                <td>
                                    <form action="{{ route('rental.destroy', $car->id) }}" method="post"
                                        class="form_delete_rental">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"><i class="material-symbols-outlined">delete</i></button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach



                    </table>
                </div>


                @if ($my_cars->hasPages())
                    <div class="paginate">
                        <ul>
                            @for ($i = -2; $i <= $my_cars->currentPage() + 2; $i++)
                                @if ($i > 0 && $i <= $my_cars->lastPage())
                                    @if ($i == $my_cars->currentPage())
                                        <li class="active"><a href="{{ $my_cars->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @else
                                        <li><a href="{{ $my_cars->url($i) }}">{{ $i }}</a></li>
                                    @endif
                                @endif
                            @endfor


                        </ul>
                    </div>
                @endif

            @endif
            <x-space h="60" />

        </x-container>



    </div>
    <x-footer />


</x-layout-frontend>
