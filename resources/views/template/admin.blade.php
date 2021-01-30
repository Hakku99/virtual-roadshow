<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{--For sending AJAX in Laravel 5.8--}}
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap"
        rel="stylesheet">

    <title>Virtual Roadshow | Free Roadshow Online</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ URL::asset('/vendor/bootstrap/css/bootstrap.min.css') }}">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ URL::asset('/assets/website_template/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/assets/website_template/css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/assets/website_template/css/owl.css') }}">

    {{--Sweet Alert--}}
    <script type="text/javascript" src="{{ URL::asset('/assets/sweet_alert/sweetalert2.all.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/assets/sweet_alert/sweetalert2.min.js') }}"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

    {{--For using Font Awesome--}}
    <script src="https://kit.fontawesome.com/fdc2d572f9.js" crossorigin="anonymous"></script>

{{--Bootstrap datatable--}}
{{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>--}}
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}

<!-- Datatables CSS CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Datatables JS CDN -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <style>
        #button {
            display: inline-block;
            background-color: #FF9800;
            width: 50px;
            height: 50px;
            text-align: center;
            border-radius: 4px;
            position: fixed;
            bottom: 30px;
            right: 30px;
            transition: background-color .3s,
            opacity .5s, visibility .5s;
            opacity: 0;
            visibility: hidden;
            z-index: 1000;
        }

        #button::after {
            content: "\f077";
            font-family: FontAwesome;
            font-weight: normal;
            font-style: normal;
            font-size: 2em;
            line-height: 50px;
            color: #fff;
        }

        #button:hover {
            cursor: pointer;
            background-color: #333;
        }

        #button:active {
            background-color: #555;
        }

        #button.show {
            opacity: 1;
            visibility: visible;
        }

        .dropdown-menu {
            /*display: none;
            position: absolute;*/
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-menu .nav-link {
            padding: 10px 8px;
        }

        .dropdown-menu .nav-link:hover {
            background-color: #DCDCDC;
        }
    </style>
</head>

<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            {{--<a class="navbar-brand" href=""><h2>Virtual Roadshow<em>.</em></h2></a>--}}
            <h2 style="font-size: 24px; font-family: Roboto; text-transform: uppercase; font-weight: 800; color: #1E1E1E;
                margin: auto auto auto 20px; ">
                Virtual Roadshow<em style="color: #f48840; font-weight: 800; font-size: 35px">.</em></h2>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" id="home" href="{{ route('admin') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="campaign" href="{{ route('admin.campaign') }}">Campaign</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="gift" href="{{ route('admin.gift_index') }}">Gift</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="gift_redemption" href="{{ route('admin.giftRedemption_index') }}">Gift Redemption</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">LOG OUT</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- Back to top button -->
<a id="button"></a>

</html>

<script type="text/javascript" src="{{ URL::asset('/assets/website_template/js/custom.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/assets/website_template/js/owl.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/assets/website_template/js/slick.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/assets/website_template/js/isotope.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/assets/website_template/js/accordions.js') }}"></script>

<script type="text/javascript" src="{{ URL::asset('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css"/>


<script>
    var x = document.getElementById("bgm");

    function playAudio() {
        x.play();
    }

    function pauseAudio() {
        x.pause();
    }
</script>


<script>
    var btn = $('#button');

    $(window).scroll(function () {
        if ($(window).scrollTop() > 300) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });

    btn.on('click', function (e) {
        e.preventDefault();
        /*$('html, body').animate({scrollTop:0}, '300');*/
        window.scrollTo({top: 0, behavior: 'smooth'});
    });
</script>
