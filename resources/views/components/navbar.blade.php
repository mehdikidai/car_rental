@if (Route::currentRouteName() === 'frontend.home')
    <header class="route_home">
    @else
        <header>
@endif



<nav class="nav">
    <a href="{{ route('frontend.home') }}" class="logo">
        <x-logo />
    </a>
    <ul class="links">
        <li><a href="{{ route('frontend.home') }}">@lang('t.home')</a></li>
        <li><a href="{{ route('frontend.cars') }}">@lang('t.cars')</a></li>
        <li><a href="#">{{ __('t.contact') }}</a></li>
        <li class="lang_btn">
            <a id="lang_btn" href="javascript:void(0);">@lang('t.language')</a>
            <ul>

                @foreach (config('app.languages') as $lang => $language)

                    @if ($lang != app()->getLocale())
                        <li><a href="{{ route('lang.switch', $lang) }}"> <img
                                    src="{{ asset('images/flags/' . $lang . '.png') }}"
                                    alt="{{ $lang }}">{{ $language }}</a></li>
                    @endif

                @endforeach

            </ul>
        </li>
    </ul>
    <div class="login">

        @guest
            <a href="{{ route('login') }}"> {{ __('t.sign in') }} </a>
            <a href="{{ route('register') }}"> {{ __('t.sign up') }} </a>
        @endguest

        @auth

            <a href="{{ route('logout') }}"> {{ __('t.logout') }} </a>
            <a href="{{ route('profile.show-page') }}" class="avatar">
                <img src="{{ asset('images/avatar/49.png') }}" width="44" height="44" />
            </a>

        @endauth

    </div>
</nav>

</header>
