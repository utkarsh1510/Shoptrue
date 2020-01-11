<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" type="text/css" href="">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }} " rel="stylesheet">
    <link href="{{ asset('css/styling.css') }} " rel="stylesheet">
    <!--<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">-->
    <link rel="stylesheet" type="text/css" href="{{ asset('icons/css/all.min.css')}}">
    <style type="text/css">
        .change h3
        {
            color: #bdbdbd;
        }
        .nav-linkss : hover
        {
            background-color: #0275d8;
            border:1px solid red;
        }
        .navbar
        {
            color:green;
        }
        .circle-badge
        {
            color:white;
            background-color: red;
            height: 80px;
            width: 80px;
            border-radius: 50%;
            padding: 3px 5px;
        }
        .badge
        {
            background-color: yellow;
            color: black;
            font-weight: bold;
            margin-top: -2px;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-light navbar-static-top" style="background-color: #0275d8 ;border:none;color:green;font-weight: bold;padding:7px;font-size: 18px;">
            <div class="container" style="color:white">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only" style="color: white;">Toggle Navigation</span>
                        <span class="icon-bar" style="color:white;"></span>
                        <span class="icon-bar" style="color:white;"></span>
                        <span class="icon-bar" style="color:white;"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}" style="color:white">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <!--<form style="margin-left: 240px;margin-top: 13px;">
                            <input type="text" name="search" placeholder="Search..." 
                            required="required" style="width: 350px;">&nbsp;<input type="submit" class="btn btn-success btn-sm" value="Go!">
                        </form>-->
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}" style="color:white">Login</a></li>
                            <li><a href="{{ route('register') }}" style="color:white">Register</a></li>
                        @else
                        <li class="nav-linkss"><a href="/carts" style="color:white" class="nav-linkss"  onmouseover="this.style.backgroundColor='#0275d8'"><i class="fas fa-shopping-cart"></i>&nbsp;Cart<span class="circle-badge">1</span></a></li>
                        <li class="nav-linkss"><a href="{{route('home')}}" style="color:white" class="nav-linkss"  onmouseover="this.style.backgroundColor='#0275d8'"><i class="fa fa-home"></i>&nbsp;Home</a></li>
                            <li class="dropdown nav-linkss">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color:white" class="nav-linkss"  onmouseover="this.style.backgroundColor='#0275d8'">
                                    {{ Auth::user()->name }} <span class="caret" style="color: white;border:1px solid black;"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="\product\create">Add Product </a></li>
                                    <li><a href="\">Account Settings</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @include('inc.message')
        @yield('content')
        <br><br><br><br>
        <div style="background-color: black;max-width:100%;color:#9e9e9e;margin-left: -px;padding: 10px;">
    <br>
    <div class="row">
        <div class="col-sm-offset-1 col-md-offset-0 col-md-3 col-sm-2 change">
            <h3><b>About</b></h3>
            <hr style="border:1px solid #757575;">
            <p>Contact us</p>
            <p>About us</p>
            <p>Press & Releases</p>
        </div>
        <div class="col-md-3 col-sm-2 change">
            <h3><b>Help</b></h3>
            <hr style="border:1px solid #757575;">
            <p>Email us</p>
            <p>Seller complaints</p>
            <p>Report a bug</p>
        </div>
        <div class="col-md-3 col-sm-2 change">
            <h3><b>Payment</b></h3>
            <hr style="border:1px solid #757575;">
            <p>Debit/Credit card</p>
            <p>Bhim UPI</p>
            <p>Net Banking</p>
        </div>
        <div class="col-md-3 col-sm-2 change">
            <h3><b>Policy</b></h3>
            <hr style="border:1px solid #757575;">
            <p>Return Policy</p>
            <p>Cancellation Policy</p>
            <p>Terms and conditions</p>
        </div>
    </div>
    <hr style="border:1px solid yellow;">
    
    <center>For Any issues write to us at : <b>Wecare@shoptrue.com</b> or call us at <b>+91-123-456-8789</b><br>
    <h2>ShopTrue&copy;</h2>&reg;2019-20</center>
</div>

    </div>
<!-- footer -->
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset ('progressbarjs/dist/progressbar.min.js')}}"></script>    
</body>
</html>
