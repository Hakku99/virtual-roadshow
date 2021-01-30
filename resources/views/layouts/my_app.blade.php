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
    <link rel="stylesheet" href="font-awesome-animation.min.css">

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

        /* TEXT BOUNCING ANIMATION */
        hX {
            cursor: default;
            /*position: absolute;*/
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100px;
            /*margin: auto;
            display: block;
            text-align: center;*/
        }

        hX span {
            position: relative;
            top: 2px;
            /*left: 490px;*/
            display: inline-block;
            font-weight: bold;
            font-family: Roboto;
            -webkit-animation: bounce 0.5s ease infinite alternate;
            font-size: 36px;
            color: white;
            /*text-shadow: 0 1px 0 #ccc, 0 2px 0 #ccc, 0 3px 0 #ccc, 0 4px 0 #ccc,
            0 5px 0 #ccc, 0 6px 0 transparent, 0 7px 0 transparent, 0 8px 0 transparent,
            0 9px 0 transparent, 0 10px 10px rgba(0, 0, 0, 0.4);*/
        }

        hX span:nth-child(2) {
            -webkit-animation-delay: 0.1s;
        }

        hX span:nth-child(3) {
            -webkit-animation-delay: 0.2s;
        }

        hX span:nth-child(4) {
            -webkit-animation-delay: 0.3s;
        }

        hX span:nth-child(5) {
            -webkit-animation-delay: 0.4s;
        }

        hX span:nth-child(6) {
            -webkit-animation-delay: 0.5s;
        }

        hX span:nth-child(7) {
            -webkit-animation-delay: 0.6s;
        }

        hX span:nth-child(8) {
            -webkit-animation-delay: 0.7s;
        }

        hX span:nth-child(9) {
            -webkit-animation-delay: 0.8s;
        }

        hX span:nth-child(10) {
            -webkit-animation-delay: 0.9s;
        }

        hX span:nth-child(11) {
            -webkit-animation-delay: 1s;
        }

        hX span:nth-child(12) {
            -webkit-animation-delay: 1.1s;
        }

        hX span:nth-child(13) {
            -webkit-animation-delay: 1.2s;
        }

        hX span:nth-child(14) {
            -webkit-animation-delay: 1.3s;
        }

        hX span:nth-child(15) {
            -webkit-animation-delay: 1.4s;
        }

        hX span:nth-child(16) {
            -webkit-animation-delay: 1.5s;
        }

        hX span:nth-child(17) {
            -webkit-animation-delay: 1.6s;
        }

        hX span:nth-child(18) {
            -webkit-animation-delay: 1.7s;
        }

        /* ANIMATION */
        @-webkit-keyframes bounce {
            100% {
                top: -20px;
            }
        }

        .my_button {
            position: relative;
            margin-bottom: 10px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            background: #fe8989;
            box-shadow: 0px 0px 0 0px rgba(0, 0, 0, 0);
            border-radius: 50px;
            /*width: 10.25rem;
            width: 10.25rem;*/
            padding: 6px;
            /*padding: 1rem 0;*/
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            /*font-size: 2.75rem;*/
            font-size: 18px;
            color: white;
            cursor: pointer;
            -moz-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }

        .my_button .icons {
            position: relative;
            display: flex;
            /*justify-content: left;*/
            margin-right: 5px;
            align-items: center;
            /*margin: 0 2.3rem 0 0;*/
            width: 1.25rem;
            height: 2.6rem;
        }

        .my_button .icons i {
            position: absolute;
            left: 0;
            /*top: 0;
            left: 0;
            display: block;*/
        }

        .my_button .icons .icon-default {
            transition: opacity 0.3s, transform 0.3s;
        }

        .my_button .icons .icon-hover {
            transition: opacity 0.3s, transform 0.3s;
            transform: rotate(-180deg) scale(0.5);
            opacity: 0;
        }

        .my_button:hover {
            color: white;
            transform: scale(1.2);
            box-shadow: 20px 15px rgba(0, 0, 0, 0.15);
        }

        .my_button:hover .icon-hover {
            transform: rotate(0deg) scale(1);
            opacity: 1;
        }

        .my_button:hover .icon-default {
            transform: rotate(180deg) scale(0.5);
            opacity: 0;
        }

        .rotate {
            animation: rotation 8s infinite linear;
        }

        @keyframes rotation {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(359deg);
            }
        }

        .guide {
            width: auto;
            height: 200px;
            position: fixed;
            bottom: 30px;
            left: 30px;
            z-index: 1000;
        }

        .close {
            background-color: white;
            color: red;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            font-size: 26px;
            margin: 2px 15px 4px auto;
            cursor: pointer;
            float: right;
            z-index: 101;
            display: block;
        }

        .bubble {
            position: fixed;
            bottom: 220px;
            left: 220px;
            width: 300px;
            text-align: center;
            line-height: 1.4em;
            /*margin: 40px auto;*/
            background-color: #fff;
            border: 8px solid #6D3C2E;
            border-radius: 30px;
            font-family: Segoe UI;
            font-weight: bold;
            padding: 15px 20px 20px 20px;
            font-size: large;
            z-index: 1000;
            /*visibility: hidden;*/
        }

        .bubble p{
            font-family: Segoe UI;
            font-weight: bold;
            font-size: large;
            text-align: center;
            line-height: 1.4em;
        }

        .bubble:before,
        .bubble:after {
            content: ' ';
            position: absolute;
            width: 0;
            height: 0;
        }

        .speech:before {
            left: 30px;
            bottom: -50px;
            border: 25px solid;
            border-color: #6D3C2E transparent transparent #6D3C2E;
        }

        .speech:after {
            left: 38px;
            bottom: -30px;
            border: 15px solid;
            border-color: #fff transparent transparent #fff;
        }

        .guideBtn {
            background-color: #9E7D6D;
            border-radius: 5px;
            color: white;
            margin: 5px auto;
            border: transparent;
            padding: 5px 8px;
            width: 244px;
        }

        /*Phone*/
        @media only screen and (max-width: 480px) {
            .page-heading {
                height: 250px;
                margin: 0px 10px;
                padding: 105px 0px;
            }

            .page-heading .text-content h4{
                font-size: 14px;
            }

            .page-heading .text-content h2{
                font-size: 26px;
            }

            .guide {
                width: auto;
                height: 120px;
                position: fixed;
                bottom: 10px;
                left: 10px;
                z-index: 1000;
            }

            .close {
                color: red;
                background-color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                font-size: 20px;
                margin: 2px 15px 4px auto;
                cursor: pointer;
                float: right;
                z-index: 101;
                display: block;
            }

            .bubble {
                position: fixed;
                bottom: 120px;
                left: 120px;
                width: 220px;
                text-align: center;
                line-height: 1.4em;
                /*margin: 40px auto;*/
                background-color: #fff;
                border: 8px solid #6D3C2E;
                border-radius: 18px;
                font-family: Segoe UI;
                font-weight: bold;
                padding: 10px 12px 12px 12px;
                font-size: small;
                z-index: 1000;
                /*visibility: hidden;*/
            }

            .bubble p{
                font-family: Segoe UI;
                font-weight: bold;
                font-size: small;
                text-align: center;
                line-height: 1.4em;
            }

            .bubble:before,
            .bubble:after {
                content: ' ';
                position: absolute;
                width: 0;
                height: 0;
            }

            .speech:before {
                left: 20px;
                bottom: -40px;
                border: 20px solid;
                border-color: #6D3C2E transparent transparent #6D3C2E;
            }

            .speech:after {
                left: 28px;
                bottom: -20px;
                border: 10px solid;
                border-color: #fff transparent transparent #fff;
            }

            .guideBtn {
                background-color: #9E7D6D;
                border-radius: 5px;
                color: white;
                margin: 5px auto;
                border: transparent;
                padding: 3px 5px;
                width: 146px;
            }

            .navbar .navbar-brand h2 {
                font-size: 22px;
                font-weight: 900;
            }
        }
    </style>
</head>

<header class="" style="top: 0; z-index: 50">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            @if (Auth::guest())
                <a class="navbar-brand" href="{{ route('participant.home') }}">
                    <h2>Virtual Roadshow<em>.</em></h2></a>
            @else
                <a class="navbar-brand" href="{{ route('l_participant.home') }}">
                    <h2>Virtual Roadshow<em>.</em></h2></a>
            @endif
            {{--<a class="navbar-brand" href="{{ url('/welcome')}}"><h2>Virtual Roadshow<em>.</em></h2></a>--}}
            {{--<h2 style="font-size: 24px; font-family: Roboto; text-transform: uppercase; font-weight: 800; color: #1E1E1E;
                margin: auto auto auto 20px; ">
                Virtual Roadshow<em style="color: #f48840; font-weight: 800; font-size: 35px">.</em></h2>--}}
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    @if (Auth::guest())
                        <li class="nav-item">
                            <a class="nav-link" id="home" href="{{ route('participant.home') }}">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="campaigns" href="{{ route('participant.campaign') }}">ALL
                                CAMPAIGNS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="games" href="{{ route('participant.gamesQuizzes') }}">GAMES &
                                QUIZZES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="gifts" href="{{ route('participant.gift') }}">GIFTS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="login" href="{{route('participant.login')}}">Participant Login</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" id="home" href="{{ route('l_participant.home') }}">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="campaigns" href="{{ route('l_participant.campaign') }}">ALL
                                CAMPAIGNS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="games" href="{{ route('l_participant.gamesQuizzes') }}">GAMES &
                                QUIZZES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="gifts" href="{{ route('l_participant.gift') }}">GIFTS</a>
                        </li>
                        {{--<li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">LOG OUT
                                <i class="fa fa-caret-down"></i></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>--}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown"
                               href="#">{{Auth::user()->name}}</a>
                            <ul class="dropdown-menu" style="text-align:center;">
                                {{--<li>
                                    <a class="nav-link" id="my_account" href="#">My Account</a>
                                </li>--}}
                                <li class="nav-item">
                                    <a class="nav-link" id="my_gift" href="{{ route('l_participant.my_gift') }}">My
                                        Gifts</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">LOG OUT</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- Back to top button -->
<a id="button"></a>


<img id="guide" class="guide" src='/assets/avatar_guide/avatar1.gif' alt="Avatar"/>


</html>

<script type="text/javascript" src="{{ URL::asset('/assets/website_template/js/custom.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/assets/website_template/js/owl.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/assets/website_template/js/slick.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/assets/website_template/js/isotope.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/assets/website_template/js/accordions.js') }}"></script>

<script type="text/javascript" src="{{ URL::asset('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script>
    var btn = $('#button');
    var guide = $('#guide');

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
