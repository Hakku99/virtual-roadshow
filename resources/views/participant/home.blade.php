@include('layouts.my_app')
{{--Affect carousel slider and datatable--}}

{{--Carousel slider's CSS file--}}
<link href="{{ asset('/assets/website_template/css/carousel.css') }}" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>

{{--For using bootstrap carousel slider--}}
{{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">--}}
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
    .carousel {
        background: #D3D3D3;
    }

    .carousel img {
        /*width: 100%;*/
        opacity: 0.6;
    }

    .text {
        text-overflow: ellipsis;
        height: 100px;
    }

    .truncate {
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .carousel-caption {
        /*top: 50%;
        bottom: 50%;*/
        height: 500px;
        top: 50%;
    }

    @media only screen and (max-width: 480px) {
        .carousel-inner > .item > a > img, .carousel-inner > .item > img, .img-responsive, .thumbnail a > img, .thumbnail > img {
            /*display: block;
            max-width: 100%;
            height: auto*/
            width: 100%;
            height: 370px;
            object-fit: cover;
        }

        .carousel-inner > .item > .carousel-caption > h1 {
            font-size: 30px;
        }

        .carousel-inner > .item > .carousel-caption > h4 {
            font-size: 16px;
        }

        .carousel-caption {
            right: 20%;
            left: 20%;
            padding-top: 90px;
            padding-bottom: 0
        }
    }
</style>

<!DOCTYPE html>
<html lang="en">

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

{{--<button onclick="playAudio()" id="play" type="button" style="border-radius: 50%; padding: 10px 10px; z-index: 1;
position: fixed; bottom: 30px; left: 30px;">
    <i class="fas fa-music"></i></button>
<button onclick="pauseAudio()" id="pause" type="button" style="border-radius: 50%; ; padding: 10px 10px; z-index: 1;
position: fixed; bottom: 30px; left: 80px;">
    <i class="fas fa-volume-mute"></i></button>--}}

{{--<button onclick="playAudio()" id="play" type="button" style="background-color: #FF9800; width: 50px; height: 50px;
    border-radius: 4px; position: fixed; bottom: 30px; left: 30px; border-color: #FF9800; inline-block; z-index: 1000">
    <i class="fas fa-music"></i></button>
<button onclick="pauseAudio()" id="pause" type="button" style="border-radius: 50%; ; padding: 10px 10px; z-index: 1;
position: fixed; bottom: 30px; left: 80px;">
    <i class="fas fa-volume-mute"></i></button>--}}

<div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-top: 100px" data-interval="6000">
    <!-- Indicators -->
    <ol class="carousel-indicators" style="margin-bottom: 20px; left: 50%; right: 50%;">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <!-- Back to top button -->
    <a id="button"></a>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        @foreach($banners as $banner)
            <div class="item{{{ $isFirst ? ' active' : '' }}}">
                @if (Auth::guest())
                    <a href="{{url('/participant/viewCampaign', $banner->id)}}">
                        <img src="/assets/uploaded_images/campaign_images//{{$banner->name}}//{{$banner->image_name}}"
                             alt="Second Slide">
                        <div class="carousel-caption" style="margin: auto">
                            <h1>{{ $banner->name}}</h1>
                            <h4 class="truncate">{{ $banner->section1 }}</h4>
                        </div>
                    </a>
                    {{--style="width: 100%; height: 500px; object-fit: cover;"--}}
                @else
                    <a href="{{url('/l_participant/viewCampaign', $banner->id)}}">
                        <img src="/assets/uploaded_images/campaign_images//{{$banner->name}}//{{$banner->image_name}}"
                             alt="Second Slide">
                        <div class="carousel-caption" style="margin: auto">
                            <h1>{{ $banner->name}}</h1>
                            <h4 class="truncate">{{ $banner->section1 }}</h4>
                        </div>
                    </a>
                    {{--style="height: 450px; margin: auto; ">--}}
                    {{--style="width: 100%; height: 500px; object-fit: cover;"--}}
                @endif
            </div>
            {{ $isFirst = false }}
        @endforeach
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev" style="z-index: 0">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next" style="z-index: 0">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<audio src="/assets/music//{{'Doki Doki!.mp3'}}" id="bgm" loop>
    <p>If you are reading this, it is because your browser does not support the audio element.</p>
</audio>

<div class="bubble speech" id="menuBubble">
    <div class="row">
        <button class="close" id="close"><i class="fas fa-times" style="font-weight: bolder;"></i></button>
    </div>
    <p>Hi, welcome to Virtual Roadshow!</p>
    <p style="margin-bottom: 8px">What can I help you?</p>
    <button class="guideBtn" value="0" onclick="speechText(this.value)">What is Virtual Roadshow?</button>
    <button class="guideBtn" value="1" onclick="speechText(this.value)">What can I do in Virtual Roadshow?
    </button>
    <button class="guideBtn" value="2" onclick="speechText(this.value)">What can I do with the points collected from
        playing games
        and answering quizzes?
    </button>
    <button class="guideBtn" value="3" onclick="speechText(this.value)">Do I need to pay for anything in Virtual
        Roadshow?
    </button>
</div>

<div class="bubble speech" id="SpeechBubble">
    <div class="row">
        <button class="close" id="close2"><i class="fas fa-times" style="font-weight: bolder;"></i></button>
    </div>
    <p id="Speech"></p>
</div>

<!-- Page Content -->
<section class="blog-posts grid-system">
    <div class="container">
        <div class="all-blog-posts">
            <h2 class="text-center">Ongoing Campaigns</h2>
            <br>
            <div class="row">
                @foreach($campaigns as $campaign)
                    <div class="col-md-3 col-sm-6">
                        <div class="blog-post">
                            @if (Auth::guest())
                                <div class="blog-thumb">
                                    <a href="{{url('/participant/viewCampaign', $campaign->id)}}">
                                        <img
                                            src="/assets/uploaded_images/campaign_images//{{$campaign->name}}//{{$campaign->image_name}}"
                                            style="width: 100%; height: 200px; object-fit: cover;">
                                    </a>
                                </div>
                                <div class="down-content">
                                    <a href="{{url('/participant/viewCampaign', $campaign->id)}}">
                                        <h4>{{$campaign->name}}</h4></a>
                                    <p>
                                        <a href="{{url('/participant/viewCampaign', $campaign->id)}}"
                                           style="color: #7a7a7a"
                                           class="truncate">
                                            {{$campaign->section1}}
                                        </a>
                                    </p>
                                    <ul class="post-info">
                                        <li>{{$campaign->start_date}}</li>
                                        <li>{{$campaign->end_date}}</li>
                                    </ul>
                                </div>
                            @else
                                <div class="blog-thumb">
                                    <a href="{{url('/l_participant/viewCampaign', $campaign->id)}}">
                                        <img
                                            src="/assets/uploaded_images/campaign_images//{{$campaign->name}}//{{$campaign->image_name}}"
                                            style="width: 100%; height: 200px; object-fit: cover;">
                                    </a>
                                </div>
                                <div class="down-content">
                                    <a href="{{url('/l_participant/viewCampaign', $campaign->id)}}">
                                        <h4>{{$campaign->name}}</h4></a>
                                    <p>
                                        <a href="{{url('/l_participant/viewCampaign', $campaign->id)}}"
                                           style="color: #7a7a7a"
                                           class="truncate">
                                            {{$campaign->section1}}
                                        </a>
                                    </p>
                                    <ul class="post-info">
                                        <li>{{$campaign->start_date}}</li>
                                        <li>{{$campaign->end_date}}</li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
                {{--<div class="col-md-4 col-sm-6">
                    <div class="blog-post">
                        <div class="blog-thumb">
                            <img src="/assets/uploaded_images/campaign_images//{{$campaign->name}}//{{$campaign->image_name}}" alt="">
                        </div>
                        <div class="down-content">
                            <a href="blog-details.html"><h4>{{$campaign->name}}</h4></a>
                            <p>{{$campaign->section1}}</p>
                        </div>
                    </div>
                </div>--}}
            </div>
        </div>
        @if (Auth::guest())
            <a href="{{ route('participant.campaign') }}" style="float: right; color: #1e1e1e">View more >></a>
        @else
            <a href="{{ route('l_participant.campaign') }}" style="float: right; color: #1e1e1e">View more >></a>
        @endif
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
                        {{--<div class="col-lg-4">
                            <div class="main-button">
                                <a href="contact.html">Contact Us</a>
                            </div>
                        </div>--}}
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
                    <li><a href="https://www.facebook.com/ivan.lee.90260403/" target="_blank">Facebook</a></li>
                    {{--<li><a href="#">Twitter</a></li>
                    <li><a href="#">Behance</a></li>
                    <li><a href="#">Linkedin</a></li>--}}
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

{{--<script>
    var x = document.getElementById("bgm");

    function playAudio() {
        x.play();
    }

    function pauseAudio() {
        x.pause();
    }
</script>--}}

<script>
    $('#home').addClass('active');
    var guide = $('#guide');
    var menuBubble = document.getElementById("menuBubble");
    $("#SpeechBubble").hide();
    $("#menuBubble").hide();
    var close = $('#close');
    var close2 = $('#close2');
    var Speech = document.getElementById("Speech");

    var speech = [
        "Virtual Roadshow is a platform for the businesses or organizations who to want to expose themselves to promote" +
        " their businesses, products or services. In here, you may get exposed to the new things and maybe also with some opportunities~~",
        "In Virtual Roadshow, you may browse through all the newly released or ongoing events through the 'HOME' and 'ALL CAMPAIGN' page. Besides," +
        "you may play some games and answers some quizzes related with specific campaigns to collect points!",
        "You may use the points collected to redeem gifts in the 'GIFTS' page, the gifts might be delivered to you in either physical or " +
        "digital way. Hurry up before the gifts run out of stock!",
        "NO NO NO, There is NO PAYMENT REQUIRED for using Virtual Roadshow! All you need is create a free account with your email in order to" +
        " redeem the gift, play the games and answering the quizzes. Remember, Virtual Roadshow is totally FREE!!",
        "Besides from promoting events or products, Virtual Roadshow also provides with some leisure activities for you! Try ",
    ];

    guide.on('click', function (e) {
        e.preventDefault();
        $('#menuBubble').show();
    });

    close.on('click', function (e) {
        e.preventDefault();
        $('#menuBubble').hide();
    });

    close2.on('click', function (e) {
        e.preventDefault();
        $("#SpeechBubble").hide();
        document.getElementById("guide").style.pointerEvents = "auto";
    });

    function speechText(value) {
        document.getElementById("guide").style.pointerEvents = "none";
        $('#menuBubble').hide();

        newText = speech[value];
        Speech.innerHTML = newText;

        $('#SpeechBubble').show();
    }
</script>
