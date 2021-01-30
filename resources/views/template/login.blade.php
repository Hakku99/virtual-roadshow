<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">

    <title>Virtual Roadshow | Free Roadshow Online</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ URL::asset('/vendor/bootstrap/css/bootstrap.min.css') }}">

    <script src="sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ URL::asset('/assets/website_template/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/assets/website_template/css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/assets/website_template/css/owl.css') }}">

    {{--Style for modal--}}
    <style>
        /*body {
            font-family: 'Nunito';
        }*/

        /* Full-width input fields */
        input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-family: 'Roboto';
        }

        /* Set a style for all buttons */

        /* Extra styles for the cancel button */
        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
            color: whitesmoke;
            font-size: 18px;
            border: 2px solid #f44336; /* Green */
            font-family: 'Roboto';
            border-radius: 12px;
        }

        /* Center the image and position the close button */
        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
            position: relative;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        .container {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
            color: dodgerblue;
            font-weight: bold;
        }

        .login {
            float: right;
            width: auto;
            padding: 10px 18px;
            background-color: dodgerblue;
            color: whitesmoke;
            font-size: 18px;
            border: 2px solid dodgerblue; /* Green */
            font-family: 'Roboto';
            border-radius: 12px;
        }

        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0, 0, 0); /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
            padding-top: 60px;
            font-family: 'Roboto';
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
        }

        /* The Close Button (x) */
        .close {
            position: absolute;
            right: 25px;
            top: 0;
            color: #000;
            font-size: 35px;
            font-weight: bold;
            font-family: 'Roboto';
        }

        .close:hover,
        .close:focus {
            color: red;
            cursor: pointer;
        }

        /* Add Zoom Animation */
        .animate {
            -webkit-animation: animatezoom 0.6s;
            animation: animatezoom 0.6s
        }

        @-webkit-keyframes animatezoom {
            from {
                -webkit-transform: scale(0)
            }
            to {
                -webkit-transform: scale(1)
            }
        }

        @keyframes animatezoom {
            from {
                transform: scale(0)
            }
            to {
                transform: scale(1)
            }
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }

            .cancelbtn {
                width: 100%;
                font-family: 'Roboto';
                border-radius: 12px;
            }
        }
    </style>
</head>
<body>

{{--<ul>
    <li style="float:right"><a onclick="document.getElementById('id01').style.display='block'">LOGIN AS ADMIN</a></li>
</ul>--}}
{{--<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.html"><h2>Welcome to Virtual Roadshow<em>.</em></h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        --}}{{--<a class="nav-link" onclick="document.getElementById('id01').style.display='block'">LOGIN AS ADMIN</a>--}}{{--
                        <a class="nav-link" href="{{ route('login') }}">LOGIN AS ADMIN</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>--}}

<header class="" style="z-index: 0">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.html"><h2>Virtual Roadshow<em>.</em></h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">LOGIN AS ADMIN</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

{{--Modal--}}
{{--<div id="id01" class="modal" style="margin-top: auto; z-index: 1">
    <form class="modal-content animate" action="{{ route('login') }}" method="post">
        @csrf
        {{ method_field('POST') }}
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close"
                  title="Close">&times;</span>
            <!--<img src="img_avatar2.png" alt="Avatar" class="avatar">-->
        </div>
        <div class="container">
            <label><b>Username</b></label>
            <input type="text" placeholder="Enter Username" id="username" name="username" required>
            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password" id="password" name="password" required>
            <span class="psw" style="margin-left: 5px"><a href="{{ route('password.request') }}">Forgot password?</a></span>
            --}}{{--<span class="psw"><a href="">Register</a></span>--}}{{--
            --}}{{--<label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>--}}{{--
        </div>
        <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">
                Cancel
            </button>
            <button type="submit" class="login">Login</button>
        </div>
    </form>
</div>--}}

<div class="navbar">
    <p style="visibility: hidden;">@Developed by Ivan, 2020</p>
</div>
</body>

</html>

{{--Script for modal--}}
{{--<script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>--}}

<script type="text/javascript" src="{{ URL::asset('/assets/website_template/js/custom.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/assets/website_template/js/owl.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/assets/website_template/js/slick.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/assets/website_template/js/isotope.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/assets/website_template/js/accordions.js') }}"></script>

<script type="text/javascript" src="{{ URL::asset('/assets/website_template/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/assets/website_template/js/bootstrap.bundle.min.js') }}"></script>
