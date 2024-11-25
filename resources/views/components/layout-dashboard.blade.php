<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    @livewireStyles
    @vite('resources/css/backend/app.scss')
</head>

<body>

    @if (session('success'))
        <script>
            const notyf = new Notyf({
                duration: 6000,
                position: {
                    x: 'center',
                    y: 'top',
                }
            });
            notyf.success('{{ session('success') }}');
        </script>
    @endif

    <div class="sidebar">
        <div class="logo">
            <a href="{{ route('frontend.home') }}">
                <x-logo />
            </a>

        </div>
        <ul>

            <li><a href="{{ route('backend.home') }}"><i class="material-symbols-rounded">home</i>Home</a></li>
            <li><a href="{{ route('backend.cars') }}"><i class="material-symbols-rounded">car_tag</i>Cars</a></li>
            <li><a href="#"><i class="material-symbols-rounded">bookmark_star</i>Bookings</a></li>
            <li><a href="#"><i class="material-symbols-rounded">person</i>Customers</a></li>



        </ul>

    </div>
    <div class="header" id="header_dashboard">
        <div class="welcome">
            <h2>welcome {{ explode(' ', Auth::user()->name)[0] }}</h2>

        </div>
        <div class="relative inline-block text-left">
            <div>
                <button type="button"
                    class="capitalize inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 ring-1"
                    id="menu-button" aria-expanded="true" aria-haspopup="true">
                    {{ explode(' ', Auth::user()->name)[0] }}
                    <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>


            <div id="menu_dashboard"
                class="show_menu_dashboard absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                <div class="py-1" role="none">
                    <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->

                    <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                        id="menu-item-2">logout</a>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="main">
        {{ $slot }}
    </div>
    @livewireScripts
    @vite('resources/js/backend.js')
</body>

</html>
