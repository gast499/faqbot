<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <header>

        @guest

        @else

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
            @else
                <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                My Account <span class="caret"></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @if (Auth::user()->profile)
                        <a class="dropdown-item" href="{{ route('profile.show', ['user_id' => Auth::user()->id,'profile_id' => Auth::user()->profile->id]) }}">My Profile</a>
                    @else
                        <a class="dropdown-item" href="{{ route('profile.create', ['user_id' => Auth::user()->id]) }}">Create Profile</a>
                    @endif
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
            <div class="collapse bg-dark navbar-fixed-top" id="navbarHeader">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-md-7 py-4">
                            <h4 class="text-white">Information</h4>
                            <p class="text-muted">Add some Questions. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
                        </div>
                        <div>
                            <br><br>
                            <h4 class="text-white">Setting Information</h4>
                            <ul class="list-unstyled">
                                <li>
                                    @if (Auth::user()->profile)
                                        <a class="text-white" href="{{ route('profile.show', ['user_id' => Auth::user()->id,'profile_id' => Auth::user()->profile->id]) }}">My Profile</a>
                                    @else
                                        <a class="text-white" href="{{ route('profile.create', ['user_id' => Auth::user()->id]) }}">Create Profile</a>
                                    @endif
                                </li>
                                <li><a href="#" class="text-white">Search</a></li>
                                <li><a href="#" class="text-white">Email</a></li>
                                <li><a href="#" class="text-white">Instagram</a></li>
                                <li><a href="#" class="text-white">Facebook</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="navbar navbar-dark bg-dark box-shadow">
                <nav class="container d-flex justify-content-between">

                        <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-left">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                                <strong>Home</strong>
                            </a>
                        <a class="text-white" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                        </a>
                        <a class="float-right" href="{{ route('question.create') }}">
                        Create a question
                            </a>
                    </ul>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </nav>
            </div>
        @endguest
    </header>
    <main class="py-4">
        <div class="col-12">
            @include('flash.error')
            @include('flash.messages')
            @include('flash.status')
        </div>
        @yield('content')
    </main>
    <footer>
        <nav class="navbar navbar-expand-md fixed-bottom navbar-dark bg-dark">

            <div class="panel-footer"> @yield('qfoot')</div>
        </nav>
    </footer>

</body>

</html>