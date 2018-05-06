<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

    </head>

    <!-- Styles -->
    <style>
        body,html,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif;
            background-color: #fff;
            color: #636b6f;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }
        .w3-third img{margin-bottom: -100px; opacity: 0.8; cursor: pointer}
        .w3-third img:hover{opacity: 1}


        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 28px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 20px;
        }
    </style>
    <body class="w3-light-grey w3-content" style="max-width:1600px">

        <!-- Sidebar/menu -->
        <nav class="w3-sidebar w3-bar-block w3-white w3-animate-left w3-text-grey w3-collapse w3-top w3-center" style="z-index:3;width:300px;font-weight:bold" id="mySidebar"><br>
            <h1 class="w3-padding-146 w3-center"><b>NJIT<br>Project</b></h1>

        </nav>

        <!-- Overlay effect when opening sidebar on small screens -->
        <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="faqs" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

        <!--    !PAGE CONTENT! -->
        <div class="w3-main" style="margin-left:300px">

            <div class="flex-center position-ref full-height">
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            
                        @else
                            <a href="{{ route('login') }}">Login</a>
                            <a href="{{ route('register') }}">Register</a>
                        @endauth
                    </div>
                @endif
                <div class="content">
                    <div class="title m-b-md">
                        Laravel
                    </div>
                    <a href="botman/tinker" onclick="faqs()" class="bar-item w3-button">Botman</a>
                    <a href="{{ url('home') }}" onclick="faqs()" class="bar-item w3-button">Faqs</a>
                </div>
            </div>

            <script>
                // Script to open and close sidebar
                function w3_open() {
                    document.getElementById("mySidebar").style.display = "block";
                    document.getElementById("myOverlay").style.display = "block";
                }

                function faqs() {
                    document.getElementById("mySidebar").style.display = "none";
                    document.getElementById("myOverlay").style.display = "none";
                }

            </script>
        </div>
    </body>
</html>
