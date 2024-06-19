<x-layout-login>

    <x-slot:title>
        Page Sign up.
    </x-slot:title>

    <h1>Sign up.</h1>
    <p>Lorem ipsum dolor sit.</p>
    <form action="{{ route('user.store') }}" method="post">
        @csrf
        <div class="form_box">
            <div class="box">
                
                <input type="text" name="f_name" id="f_name" placeholder="First Name" value="{{ old('f_name') }}">
            </div>
            <div class="box">
                
                <input type="text" name="l_name" id="l_name" placeholder="Last Name" value="{{ old('l_name') }}">
            </div>
            <div class="box column_2">
                
                <input type="text" name="email" id="input_email" placeholder="Email" value="{{ old('email') }}">
            </div>
            <div class="box column_2">
                
                <input type="text" name="address" id="input_address" placeholder="Address" value="{{ old('address') }}">
            </div>
            <div class="box">
                <input type="text" name="city" id="f_name" placeholder="City" value="{{ old('city') }}">
            </div>
            <div class="box">
                <input type="text" name="phone" id="f_name" placeholder="Phone" value="{{ old('phone') }}">
            </div>
            <div class="box">
                <input type="password" name="password" id="f_name" placeholder="Password">
            </div>
            <div class="box">
                <input type="password" name="password_confirmation" id="f_name" placeholder="Confirm Password">
            </div>
            <div class="box column_2">
                <button type="submit">sing up</button>
            </div>
        </div>
    </form>
    <small>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est repellendus cupiditate quos, officiis totam aperiam dolor ipsam esse consequuntur suscipit.</small>
    <span class="line">
        
    </span>
    <div class="btns">
        <a href="{{ route('frontend.home') }}">home</a>
        <a href="{{  route('login') }}">Login</a>
    </div>

</x-layout-login>


