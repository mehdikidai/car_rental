<x-layout-frontend>
    <x-slot:title>
        Page Profile
    </x-slot:title>

    <x-navbar />
    <x-space h="80" />
    <div style="min-height: calc(100vh - 80px)">

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

        <x-container>

            <div class="profile-page-card">
                <div class="user_profile">
                    <div class="photo"><img src="{{ asset('images/avatar/49.png') }}" alt="user"></div>
                    <span class="name">{{ auth()->user()->name }} <i
                            class="material-symbols-outlined">check_circle</i></span>

                </div>
                <div class="info_user">
                    <div class="box">
                        <i class="material-symbols-outlined icon">drafts</i>
                        <small>{{ auth()->user()->email }}</small>
                    </div>
                    <div class="box">
                        <i class="material-symbols-outlined icon">home</i>
                        <small>{{ $user->customer->address }}</small>
                    </div>
                    <div class="box">
                        <i class="material-symbols-outlined icon">phone_in_talk</i>
                        <small>{{ $user->customer->phone }}</small>
                    </div>
                </div>
            </div>

            <x-space h="40" />
            @if ($my_cars->isEmpty())
                <p>No car reservations found.</p>
            @else
                <table id="customers">
                    <tr>
                        <th>Car</th>
                        <th>Model</th>
                        <th>Booking Date</th>
                        <th>Pickup Date</th>
                        <th>Return Date</th>
                        <th>Duration</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>#</th>

                    </tr>
                    @foreach ($my_cars as $car)
                        <tr>
                            <td>{{ $car->car->company->name }}</td>
                            <td>{{ $car->car->model->name }}</td>
                            <td>{{ $car->created_at->diffForHumans() }}</td>
                            <td>{{ $car->rental_date }}</td>
                            <td>{{ $car->return_date }}</td>
                            <td>{{ $car->days }}</td>
                            <td>{{ $car->total_price . ' Dh' }}</td>
                            <td>{{ !true ? 'Confirmed' : 'Pending' }}</td>
                            <td>
                                <form action="{{ route('rental.destroy', $car->id) }}" method="post" class="form_delete_rental">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"><i class="material-symbols-outlined">delete</i></button>
                                </form>
                                
                            </td>
                        </tr>
                    @endforeach



                </table>
            @endif
            <x-space h="60" />

        </x-container>



    </div>
    <x-footer />


</x-layout-frontend>
