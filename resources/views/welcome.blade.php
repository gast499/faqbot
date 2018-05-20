<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('includes.head')
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
<div class="container">
    <div class="container" mb-10 style="font-family:KacstLetter;">
        <br/>

        <h3 style="font-family:'Consolas'; ">Welcome! <br/>
            <br/>FAQ website helps you to find answers to commonly asked questions. <br/><i> Please register/login to continue.</i> </h3>
        <br/>
        <br/>
        @include('includes.FAQCaraousel')
        <br/>
        @include('includes.footer')
    </div>
</div>

</body>
</html>