@if (Route::currentRouteName() === 'frontend.home')
    <header class="route_home">
    @else
        <header>
@endif



<nav class="nav">
    <a href="{{ route('frontend.home') }}" class="logo">
        <img src="{{ asset('images/logo.png') }}" alt="logo">
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
            <a href="#">Sign up</a>
        @endguest

        @auth
        <a href="{{ route('logout') }}"> logout </a>
        <a href="#">profile</a>
        @endauth

    </div>
</nav>

</header>
