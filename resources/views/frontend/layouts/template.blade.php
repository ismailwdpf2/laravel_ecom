@php
    $categories = App\Models\Category::latest()->get();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Ecommerce</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('home/css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="{{ asset('home/images/fevicon.png') }}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('home/css/jquery.mCustomScrollbar.min.css') }}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--  -->
    <!-- owl stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('home/css/owl.carousel.min.css') }}">
    <link rel="stylesoeet" href="{{ asset('home/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
</head>

<body>
    <!-- banner bg main start -->
    <div class="">
        <!-- header top section start -->
        <div class="container">
            <div class="bg-dark">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="custom_menu">
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="#">Category</a></li>
                                <li><a href="#">New Releases</a></li>
                                <li><a href="#">Today's Deals</a></li>
                                <li><a href="{{ 'customer-service' }}">Customer Service</a></li>
                                {{-- login reg and logout --}}


                                <li>
                                    @if (Auth::check())
                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-responsive-nav-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                          this.closest('form').submit();">
                                                {{ __('Log Out') }}

                                                {{-- {{Auth::user()->name}} --}}
                                            </x-responsive-nav-link>
                                        </form>
                                    @else
                                        <a href="{{ route('login') }}">Login</a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}">Register</a>

                                </li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- header top section start -->

        <!-- header section start -->
        <div class="container header_section d-block ">
            <div class=" container bg-dark p-2">
                <div class="containt_main">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Category
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @foreach ($categories as $category)
                                <a class="dropdown-item"
                                    href="{{ route('category', [$category->id, $category->slug]) }}">{{ $category->category_name }}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="main">
                        <!-- Another variation with a button -->
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search a Product">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="button"
                                    style="background-color: #f26522; border-color:#f26522 ">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="header_box">

                        <div class="login_menu ">
                            <ul>
                                <li><a href="#">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span class="padding_10">Cart</span></a>
                                </li>
                                {{-- <li>
                                    <a href="#">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <span class="padding_10">Profile</span></a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header section end -->
        <!-- banner section start -->

        <!-- banner section end -->
    </div>
    <!-- banner bg main end -->

    <div class="container py-4">
        @yield('main-content')
    </div>

    <!-- footer section start -->
    <div class="footer_section layout_padding">
        <div class="container">
            <div class="input_bt">
                <input type="text" class="mail_bt" placeholder="Your Email" name="Your Email">
                <span class="subscribe_bt" id="basic-addon2"><a href="#">Subscribe</a></span>
            </div>
            <div class="footer_menu">
                <ul>
                    <li><a href="#">Best Sellers</a></li>
                    <li><a href="#">Gift Ideas</a></li>
                    <li><a href="#">New Releases</a></li>
                    <li><a href="#">Today's Deals</a></li>
                    <li><a href="#">Customer Service</a></li>
                </ul>
            </div>
            <div class="location_main">Help Line Number : <a href="#">008 01738562681</a></div>
        </div>
    </div>
    <!-- footer section end -->
    <!-- copyright section start -->
    <div class="copyright_section">
        <div class="container">
            <p class="copyright_text">© 2023 Isamil hosen </p>
        </div>
    </div>
    <!-- copyright section end -->
    <!-- Javascript files-->
    <script src="{{ asset('home/js/jquery.min.js') }}"></script>
    <script src="{{ asset('home/js/popper.min.js') }}"></script>
    <script src="{{ asset('home/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('home/js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('home/js/plugin.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ asset('home/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('home/js/custom.js') }}"></script>
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
</body>

</html>
