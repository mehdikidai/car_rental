<x-layout-frontend>
    <x-slot:title>
        Page Profile
    </x-slot:title>

    <x-navbar />

    <div style="min-height: calc(100dvh - 80px)">

        <x-container>
            <x-space h="80"/>
            <div class="form_container">
                <h1>update profile</h1>
                <p>Lorem ipsum dolor sit.</p>
                <form action="{{ route('profile.update') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form_box">
                        <div class="box">

                            <input type="text" name="f_name" id="f_name" placeholder="First Name"
                                value="{{ old('f_name', explode(' ', $user->name)[0]) }}">
                        </div>
                        <div class="box">

                            <input type="text" name="l_name" id="l_name" placeholder="Last Name"
                                value="{{ old('l_name', explode(' ', $user->name)[1]) }}">
                        </div>
                        <div class="box column_2">

                            <input type="text" name="email" id="input_email" placeholder="Email"
                                value="{{ old('email', $user->email) }}">
                        </div>
                        <div class="box column_2">

                            <input type="text" name="address" id="input_address" placeholder="Address"
                                value="{{ old('address', $customer->address) }}">
                        </div>
                        <div class="box">
                            <input type="text" name="city" id="f_name" placeholder="City"
                                value="{{ old('city', $customer->city) }}">
                        </div>
                        <div class="box">
                            <input type="text" name="phone" id="f_name" placeholder="Phone"
                                value="{{ old('phone', $customer->phone) }}">
                        </div>
                        <div class="box">
                            <input type="password" name="password" id="f_name" placeholder="Password">
                        </div>
                        <div class="box">
                            <input type="password" name="password_confirmation" id="f_name"
                                placeholder="Confirm Password">
                        </div>
                        <div class="box column_2">
                            <button type="submit">update profile</button>
                        </div>
                    </div>
                </form>
            </div>



        </x-container>


    </div>

    <x-footer />


</x-layout-frontend>
