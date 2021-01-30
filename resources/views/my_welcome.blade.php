@include('layouts.my_app')
<script type="text/javascript" src="{{ URL::asset('/vendor/jquery/jquery.min.js') }}"></script>

<style>
    button {
        display: inline-block;
        background-color: #f48840;
        border-radius: 4px;
        color: #fff;
        font-size: 13px;
        font-weight: 500;
        padding: 12px 20px;
        text-transform: uppercase;
        transition: all .3s;
        border: none;
        outline: none;
    }
</style>

<!DOCTYPE html>
<html lang="en">

<header class="" style="top: 0">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            @if (Auth::guest())
                <a class="navbar-brand" href=""><h2>Virtual Roadshow<em>.</em></h2></a>
                {{--<h2 style="font-family: Roboto; font-size: 24px">Virtual Roadshow<em>.</em></h2>--}}
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('participant.login') }}">LOGIN AS PARTICIPANT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">LOGIN AS ADMIN</a>
                        </li>
                    </ul>
                </div>
            @else
                {{--<a class="navbar-brand" href=""><h2>Virtual Roadshow<em>.</em></h2></a>--}}
                <h2>Virtual Roadshow<em>.</em></h2>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" id="home" href="{{ route('l_participant.home') }}">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="campaigns" href="{{ route('l_participant.campaign') }}">ALL
                                CAMPAIGNS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="games" href="{{ route('login') }}">GAMES & QUIZZES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="gifts" href="{{ route('l_participant.gift') }}">GIFTS</a>
                        </li>
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
                    </ul>
                </div>
            @endif
        </div>
    </nav>
</header>

<!-- Banner Starts Here -->
<div class="heading-page header-text" style="display: none">
    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-content">
                        <h2>All Gifts</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Banner Ends Here -->
<body class="antialiased">


<audio src="/assets/music//{{'Doki Doki!.mp3'}}" id="bgm" loop>
    <p>If you are reading this, it is because your browser does not support the audio element.</p>
</audio>

<!-- Page Content -->
<section class="blog-posts grid-system">
    <div class="container">
        <div class="all-blog-posts">
            <div class="col-lg-12" style="margin-bottom: 50px; margin-top: 200px">
                {{--<button onclick="playAudio()" id="play" type="button" style="border-radius: 50%; padding: 10px 10px; z-index: 1;
    position: fixed; bottom: 30px; left: 30px;">
                    <i class="fas fa-music"></i></button>
                <button onclick="pauseAudio()" id="pause" type="button" style="border-radius: 50%; ; padding: 10px 10px; z-index: 1;
    position: fixed; bottom: 30px; left: 80px;">
                    <i class="fas fa-volume-mute"></i></button>--}}
                <p class="text-center">Dear participant, where would you want to go now?</p>
                <div class="sidebar-item submit-comment">
                    <div class="row">
                        <div class="col-lg-12" style="justify-content: center;align-items: center;display: flex;">
                            @if (Auth::guest())
                                <div class="col-lg-6"
                                     style="justify-content: center;align-items: center;display: flex;">
                                    <a href="{{ route('participant.home') }}">
                                        <button type="submit" id="form-submit" class="main-button">
                                            Campaigns
                                        </button>
                                    </a>
                                </div>
                                <div class="col-lg-6"
                                     style="justify-content: center;align-items: center;display: flex;">
                                    <a href="{{ route('participant.gamesQuizzes') }}">
                                        <button type="submit" id="form-submit">Games and Quizzes</button>
                                    </a>
                                </div>
                            @else
                                <div class="col-lg-6" style="justify-content: center;align-items: center;display: flex;">
                                    <a href="{{ route('l_participant.home') }}">
                                        <button type="submit" id="form-submit" class="main-button">Campaigns</button>
                                    </a>
                                </div>
                                <div class="col-lg-6" style="justify-content: center;align-items: center;display: flex;">
                                    <a href="{{ route('l_participant.gamesQuizzes') }}">
                                        <button type="submit" id="form-submit">Games and Quizzes</button>
                                    </a>
                                </div>
                            @endif

                        </div>

                    </div>
                </div>
            </div>
            <h2 class="text-center">WHAT IS VIRTUAL ROADSHOW (ViRO)?</h2>
            <br>
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="blog-post">
                        <div class="blog-thumb">
                            <img src="/assets/website_template/images//{{'blog-4-720x480.jpg'}}" alt="">
                        </div>
                        <div class="down-content">
                            <a href="blog-details.html"><h4>Virtual Roadshow is a Roadshow Online!</h4></a>

                            <p>In this difficult time of Covid-19, we have to stay home and stay safe! Virtual Roadshow
                                provides an alternative for companies to promote themselves, while lets the publics
                                to explore more in home!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="blog-post">
                        <div class="blog-thumb">
                            <img src="/assets/website_template/images//{{'blog-5-720x480.jpg'}}" alt="">
                        </div>
                        <div class="down-content">
                            <a href="blog-details.html"><h4>We have Campaigns, Games, Quizzes and Gift!</h4></a>

                            <p>Tons of campaigns awaiting, we have even more fun and surprises for you!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="blog-post">
                        <div class="blog-thumb">
                            <img src="/assets/website_template/images//{{'blog-6-720x480.jpg'}}" alt="">
                        </div>
                        <div class="down-content">
                            <a href="blog-details.html"><h4>Join the ViRO, and have your fun!</h4></a>

                            <p>Enjoy your time while exploring and having fun with us! It won't be a waste of time for
                                you!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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

<script language="text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t) {                   //declaring the array outside of the
        if (!cleared[t.id]) {                      // function makes it static and global
            cleared[t.id] = 1;  // you could use true and false, but that's more typing
            t.value = '';         // with more chance of typos
            t.style.color = '#fff';
        }
    }
</script>
</html>

<script>
    var x = document.getElementById("bgm");

    function playAudio() {
        x.play();
    }

    function pauseAudio() {
        x.pause();
    }
</script>
