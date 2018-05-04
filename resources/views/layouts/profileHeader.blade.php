<!--
    Show menu bar options to return Home. This feature also display
    information of the the user. We can edit or remove user information.
-->

@include("includes.head")

<body>

    <header>

        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="{{ url("/") }}">HOME</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>

        @if (Auth::user()->profile)
        <div class="container-fluid">
            <div class="row content">

                <div class="col-sm-3 sidenav">
                    <main class="py-4">
                        @yield('profileContent')
                    </main>
                    <h5><span class="glyphicon glyphicon-time"></span> Post by Jane Dane, Sep 27, 2015.</h5>
                </div>

                <div class="col-sm-9">
                    <h3>Your Information</h3>
                    <hr>

                    <h4><small>Your ANSWERS</small></h4>
                    <hr>
                    <h5><span class="glyphicon glyphicon-time"></span> Since Sep 24, 2015.</h5>
                    <h5><span class="label label-success">Lorem</span></h5><br>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <hr>

                </div>
            </div>
        </div>
        @else
            <a class="dropdown-item" href="{{ route('profile.create', ['user_id' => Auth::user()->id]) }}">Create Profile</a>
        @endif
    </header>
    <br>

</body>







