<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    @livewireStyles
    @vite('resources/css/backend/app.scss')
</head>
<body>

    <div class="sidebar">
        <div class="logo">
            <x-logo/>
        </div>
        <ul>
            
            <li><a href="#"><i class="material-symbols-rounded">home</i>Home</a></li>
            <li><a href="#"><i class="material-symbols-rounded">car_tag</i>Cars</a></li>
            <li><a href="#"><i class="material-symbols-rounded">bookmark_star</i>Bookings</a></li>
            <li><a href="#"><i class="material-symbols-rounded">person</i>Customers</a></li>
            
            
        </ul>
        <a class="log_out" href="#"><i class="material-symbols-rounded">logout</i>logout</a>
    </div>
    <div class="header"></div>
    <div class="main">
        {{ $slot }}
    </div>
    @livewireScripts
</body>
</html>