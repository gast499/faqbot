<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('includes.head')
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet" type="text/css">
    <style>
        /*body {*/
            /**/
        /*}*/
        label {
            padding-bottom: 20px !important;
            padding-top: 14px !important;
        }
        .ChatInput {
            padding-top: 25px !important;
            padding-bottom: 10px !important;
        }
        .content {
            font-family: "Source Sans Pro", sans-serif;
            margin: 0;
            padding: 0;
            background: radial-gradient(#57bfc7, #45a6b3);
            display: flex;
            height: 100vh;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        /*.content {*/
            /*text-align: center;*/
        /*}*/
    </style>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container mr-auto">
        @include('includes.headerlogo')


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @if (Route::has('login'))
                    <div class="navbar navbar-expand-md navbar-light navbar-laravel">
                        @auth
                            <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}">Home</a></li>
                        @else

                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        @endauth
                    </div>
                @endif
            </ul>
        </div>
    </div>
</nav>
    <div class="container" mb-10 style="font-family:KacstLetter;">
        <br/>

        <div class="content" id="app">
            <botman-tinker api-endpoint="/botman"></botman-tinker>
        </div>
        <br/>
        <br/>
        @include('includes.footer')
    </div>

</body>
</html>