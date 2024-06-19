@if (Route::currentRouteName() === 'frontend.home')
    <header class="route_home">
    @else
        <header>
@endif



<nav class="nav">
    <a href="{{ route('frontend.home') }}" class="logo">
        <x-logo/>
    </a>
    <ul class="links">
        <li><a href="{{ route('frontend.home') }}">home</a></li>
        <li><a href="{{ route('frontend.cars') }}">cars</a></li>
        <li><a href="#">about us</a></li>
        <li><a href="#">contact</a></li>
    </ul>
    <div class="login">

        @guest
            <a href="{{ route('login') }}"> sign in </a>
            <a href="{{  route('register') }}">sign up</a>
        @endguest

        @auth

        <a href="{{ route('logout') }}"> logout </a>
        <a href="{{ route('profile.show-page') }}" class="avatar">
            <img src="{{ asset('images/avatar/49.png') }}" width="44" height="44" />
        </a>
    
        @endauth

    </div>
</nav>

</header>
