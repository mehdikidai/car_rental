<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    @vite(['resources/css/auth/app_login.scss'])

</head>

<body>

    <div class="main_login">

        <div class="box_1">

            <div class="box_form">
                <h1>
                    sign in
                </h1>
                <p>
                    Lorem ipsum dolor sit.
                </p>
                <form action="{{ route('login.login') }}" method="post">
                    @csrf
                    <div class="bx_form">
                       
                        <input class="input_form @error('email') error_password @enderror" type="text" name="email"
                            id="email_login" autocomplete="off" placeholder="Email" value="{{ old('email') }}">
                    </div>
                    <div class="bx_form">
                        <input class="input_form @error('password') error_password @enderror" type="password"
                            name="password" id="password_login" autocomplete="off" placeholder="Password">
                    </div>
                    
                    <div class="bx_form">
                        <button type="submit">
                            sign in
                        </button>
                    </div>
                </form>
                <div class="line_or"></div>
                <div class="btns_home_and_new_accont">

                    <a href="{{ route('frontend.home') }}" class="go_to_home_link">
                        home
                    </a>

                    <a href="#" class="create_new_accont_link">
                        Sign up
                    </a>
                </div>

            </div>
        </div>
        

    </div>
   @vite('resources/js/app_login.js')
</body>

</html>
