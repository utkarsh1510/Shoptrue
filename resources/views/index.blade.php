<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 1000;
                height: 100vh;
                margin: 0;

            }
            .color-white{
                color: #fff;
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
            }

            .bolder{
                font-weight: bolder;
            }
        </style>
    </head>
    <body><div style="height: 50px;width: 100%;background: linear-gradient(to right, black, skyblue)">
        <span style="margin-bottom: -20px;color: white;font-size: 30px;font-family: Arial">ShopTrue</span>
        @if (Route::has('login'))
                <div class="top-right links" style="border:1px ;background-color: ;">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}"><font class="bolder " color="white">Home</font></a>
                    @else
                        <a href="{{ url('/login') }}"><font class="bolder " color="white">Login</font></a>
                        <a href="{{ url('/register') }}"><font class="bolder " color="white">Register</font></a>
                    @endif
                </div>
            @endif
    </div>
        <!--<div class="flex-center position-ref" style="border: 3px solid black;background: linear-gradient(to right, magenta, white);">-->
           
           <!-- </div><br><br><br><--
            <div style="background-image: url('images/cover.png');background-size: cover;width: auto;height: 700px;">-->
                <!--<div class="content">
                    <div class="title m-b-md color-white">
                        ShopTrue
                    </div>
                    <p class="color-white">This is a new level of e-Commerce solutions...</p>

                    <div class="links">
                     <a href="https://laravel.com/docs">Documentation</a>
                     <a href="https://laracasts.com">Laracasts</a>
                     <a href="https://laravel-news.com">News</a>
                     <a href="https://forge.laravel.com">Forge</a>
                     <a href="https://github.com/laravel/laravel">GitHub</a>
                    </div>
                </div>
            </div>-->
        <img src="images/cover.png" width="100%" height="auto">
        dnwodjowndonwon3ondo3nd
    </body>
</html>
