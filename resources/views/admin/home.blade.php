@include('template.admin')
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    {{--<!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">--}}

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

    <style>
        .box {
            background-color: #F7F7F7;
            padding-bottom: 20px;
        }
        .main-button {
            border-radius: 4px;
        }
    </style>
</head>

<!-- Banner Starts Here -->
<div class="heading-page header-text">
    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-content">
                        <h4>Welcome, Dear {{$name}}</h4>
                        <h2>What can I do for you?</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Banner Ends Here -->

<body class="antialiased">
<div class="relative {{--flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0--}}">
    {{--<audio id="my_audio" src="resources/elements/bgm.mp3" loop="loop"></audio>--}}
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        {{--<h1 style="text-align:center; margin-top: 110px;margin-bottom: 70px; /*color: white*/">Welcome, Dear Admin.</h1>
        <p style="text-align:center; margin-bottom: 70px; --}}{{--color: white--}}{{--">What can I help you?</p>--}}
        <div class="box col-lg-12">
            <section class="blog-posts grid-system">
                <div class="all-blog-posts">
                    <div class="col-lg-12" {{--style="margin-bottom: 50px"--}}>
                        <div class="sidebar-item submit-comment">
                            <div class="row" style="justify-content: center;align-items: center;display: flex;">
                                <div class="col-lg-3 col-sm-12" style="justify-content: center;align-items: center;display: flex;">
                                    <a href="{{ url('/admin/campaign') }}">
                                        <button type="submit" id="form-submit" style="margin-top: 35px; margin-bottom: 20px" class="main-button">Manage
                                            Campaigns
                                        </button>
                                    </a>
                                </div>
                                <div class="col-lg-3 col-sm-12" style="justify-content: center;align-items: center;display: flex;">
                                    <a href="{{ url('/admin/gift') }}">
                                        <button type="submit" id="form-submit" style="margin-top: 35px; margin-bottom: 20px" class="main-button">Manage Gift
                                        </button>
                                    </a>
                                </div>
                                <div class="col-lg-3 col-sm-12" style="justify-content: center;align-items: center;display: flex;">
                                    <a href="{{ url('/admin/giftRedemption') }}">
                                        <button type="submit" id="form-submit" style="margin-top: 35px; margin-bottom: 20px" class="main-button">Manage Gift Redemption
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        {{--<button class="button button2">?</button>--}}
    </div>
</div>
<section class="call-to-action">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-content">
                    <div class="row">
                        <div class="col-lg-8">
                            <span>Virtual Roadshow provides OPPORTUNITIES and FUN</span>
                            <h4>Let's start your action to grab your future!</h4>
                        </div>
                        <div class="col-lg-4">
                            <div class="main-button">
                                <a href="contact.html">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="social-icons">
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Behance</a></li>
                    <li><a href="#">Linkedin</a></li>
                </ul>
            </div>
            <div class="col-lg-12">
                <div class="copyright-text">
                    <p>
                        Copyright © 2020 Ivan Lee
                        | Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>

<script>
    $(function () {
        $('#home').addClass('active');
    });
</script>

<script type="text/javascript" src="{{ URL::asset('/assets/website_template/js/custom.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/assets/website_template/js/owl.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/assets/website_template/js/slick.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/assets/website_template/js/isotope.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/assets/website_template/js/accordions.js') }}"></script>

<script type="text/javascript" src="{{ URL::asset('/assets/website_template/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/assets/website_template/js/bootstrap.bundle.min.js') }}"></script>




