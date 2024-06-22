<x-layout-login>

    <x-slot:title>
        Page Login
    </x-slot:title>
    
    <h1>{{ __('t.login') }}</h1>
    <p>Lorem ipsum dolor sit.</p>
    <form action="{{ route('login.login') }}" method="post" id="form_login" autocomplete="off">
        @csrf
        <div class="form_box">
            <div class="box column_2">
                <input class="input_form" type="text" name="email_x" id="email_input" placeholder="Email" value="{{ session('email') ? session('email') : old('email') }}">
            </div>
            <div class="box column_2">

                <input class="input_form" type="password" name="password_x" id="password_input" placeholder="Password">
            </div>
            
            <div class="box column_2">
                <button type="submit">{{ __('t.login') }}</button>
            </div>
        </div>
    </form>
    <span class="line">
        
    </span>
    <div class="btns">
        <a href="{{ route('frontend.home') }}">home</a>
        <a href="{{  route('register') }}">Sign up</a>
    </div>

</x-layout-login>