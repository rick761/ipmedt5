<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php echo asset('css/font-awesome-4.7.0/css/font-awesome.min.css')?> ">
        <link rel="stylesheet" href="<?php echo asset('css/app.css')?>" type="text/css">
        <link rel="stylesheet" href="<?php echo asset('css/style.css')?>" type="text/css">
        <!-- Styles -->
        <style> /*
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

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
                top: 18px;
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
                margin-bottom: 30px;
            } */
        </style>
    </head>
    <body>


    <div class="main">
        <div class="content">
            <span class="timestamp_info">
                Meting:
                {{$laatsteSignaal->created_at}}

            </span>

            <div class="inner_content">
                <i class="fa fa-sun-o fa-6" id="sun_logo" aria-hidden="true"></i>


                <ul id="temp_bar">
                    <li class="blue"></li>
                    <li class="green"></li>
                    <li class="yellow"></li>
                    <li class="orange"></li>
                    <li class="red"></li>
                </ul>
                <p>Zonnensterkte: <span class="highlight">{{$laatsteSignaal->uv}}</span> / 11</p>


                <p>Beter zonadvies? <a href="login.html">log hier in. </a></p>
            </div>
        </div>
    </div>



















    <!-- OLD
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <section class="jumbotron text-center">
                    <div class="container">
                        <h1 class="jumbotron-heading">login....</h1>
                        <p class="lead text-muted">Voor deze App moet je inloggen, registreren kan natuurlijk ook.</p>
                        <p>
                            <a href="./login" class="btn btn-primary my-2">Login</a>
                            <a href="./register" class="btn btn-secondary my-2">Register</a>
                        </p>
                    </div>
                </section>

                <!--

                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>

            </div>
        </div> END OLD -->
    </body>
</html>
