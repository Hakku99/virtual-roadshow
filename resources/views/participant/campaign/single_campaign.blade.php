@include('layouts.my_app')
<style>
    @keyframes fade-in-up {
         0% {
             opacity: 0;
        }
         100% {
             transform: translateY(0);
             opacity: 1;
        }
    }
    
    .video iframe {
        max-width: 100%;
        max-height: 100%;
    }

    .video.stuck {
         position: fixed;
         bottom: 120px;
         right: 30px;
         width: 260px;
         height: 146px;
         transform: translateY(100%);
         animation: fade-in-up 0.75s ease forwards;
         z-index: 99;
    }

    p {
        font-size: 22px;
        text-align: center;
    }

    .drop_caps:first-letter {
        /*float: outside;*/
        font-size: 250%;
        line-height: 1;
        font-weight: bold;
        margin-right: 2px;
    }

    .paragraph_background {
        width: 100%;
        margin-top: 80px;
        background: rgb(211, 211, 211, 0.6);
        /*background-image: url("/assets/campaign_background_image/pexels-henry-&-co-1939485.jpg");*/
        padding: 30px;
        /*opacity: 0.3;*/
    }

    .paragraph_background p {
        font-family: Candara;
    }

    .grid {
        display: grid;
        grid-template-columns: 180px 180px 180px 180px;
        grid-template-rows: auto;
        grid-column-gap: 50px;
        grid-row-gap: 50px;
    }

    .grid img {
        width: 180px;
        height: 180px;
        object-fit: cover;
    }

    .gift:hover img {
        opacity: 0.3;
        -moz-box-shadow: 0 0 30px black;
        -webkit-box-shadow: 0 0 30px black;
        box-shadow: 0 0 30px black;
    }

    @media only screen and (max-width: 480px) {
        .grid {
            display: grid;
            grid-template-columns: 150px 150px;
            grid-template-rows: 150px;
            grid-column-gap: 10px;
            grid-row-gap: 10px;
        }

        .grid img {
            width: 150px;
            height: 150px;
            object-fit: cover;
        }

        .paragraph_background p {
            font-family: Candara;
            font-size: medium;
        }

        .directText {
            font-size: medium;
        }

        .gift h4 {
            font-family: Candara;
            font-size: medium;
        }
        
        .video.stuck {
            position: fixed;
            bottom: 120px;
            right: 30px;
            width: 200px;
            height: 113px;
            transform: translateY(100%);
            animation: fade-in-up 0.75s ease forwards;
            z-index: 99;
        }
    }
</style>

<!DOCTYPE html>
<html lang="en">

<!-- Banner Starts Here -->
<div class="heading-page header-text">
    <section class="page-heading"
             style="background-image: url('/assets/uploaded_images/campaign_images//{{$campaign->name}}//{{$campaign->image_name}}');
                 position: relative;
                 background-position: center center;
                 background-repeat: no-repeat;
                 background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-content">
                        <h4>Welcome to</h4>
                        <h2> {{$campaign->name}} !</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Banner Ends Here -->

<body {{--style="background-image: url('/assets/background_image/genshin.jpg'); background-repeat: no-repeat;"--}}>

<audio src="/assets/music//{{'Doki Doki!.mp3'}}" id="bgm" loop>
    <p>If you are reading this, it is because your browser does not support the audio element.</p>
</audio>

<section class="blog-posts grid-system">
    <div class="container">
        <div class="all-blog-posts">
            {{--Playing youtube video--}}
            {{--<iframe --}}{{--width="854" height="480"--}}{{-- src="https://www.youtube.com/embed/lMdsrZ1otlA?autoplay=1"
                    allowfullscreen
                    style="margin: auto; border:none; width: 100%; height: 480px">
            </iframe>--}}
            
            <div class="video-wrap">
                <div class="video">
                    <iframe {{--width="854" height="480"--}} src="https://www.youtube.com/embed/{{$video_id}}?autoplay=1"
                            allowfullscreen
                            style="margin: auto; border:none; width: 100%; height: 480px">
                    </iframe>
                </div>
            </div>
            
            <div class="paragraph_background">
                <p class="drop_caps"> {{$campaign->section1}} </p>
                <p style="margin-top: 30px"> {{$campaign->section2}} </p>
                <p style="margin-top: 30px"> {{$campaign->section3}} </p>
                <p style="margin-top: 30px;"><strong>CAMPAIGN START DATE:</strong> {{$campaign->start_date}} </p>
                <p style="margin-top: 30px;"><strong>CAMPAIGN END DATE:</strong> {{$campaign->end_date}} </p>
                <p style="margin-top: 30px;"><strong>CONTACT NUMBER:</strong> {{$campaign->contact_number}} </p>
                <p style="margin-top: 30px;"><strong>CONTACT EMAIL:</strong> {{$campaign->contact_email}} </p>
            </div>

            @if($campaign->quiz === true)
                <p class="directText" style="margin-top: 50px; color: #F08080; font-family: Candara">
                    *{{$campaign->name}} has prepared a
                    quiz for this campaign!
                    All the answers of the quiz can be found in this particular campaign for {{$campaign->name}}! We are
                    also providing games for you! Answer the quizzes, plays the games, and bring your desired gifts
                    home!</p>
                <div class="sidebar-item submit-comment"
                     style="justify-content: center;align-items: center;display: flex;">
                    @if (Auth::guest())
                        {{--<a href="{{ route('participant.gamesQuizzes') }}"><button class="btn">Proceed to quiz & games</button></a>--}}
                        <a href="{{url('/l_participant/answerQuiz', $campaign->quiz_id)}}">
                            <button class="btn">Answer the Quiz!</button>
                        </a>
                    @else
                        <a href="{{url('/l_participant/answerQuiz', $campaign->quiz_id)}}">
                            <button class="btn">Answer the Quiz!</button>
                        </a>
                    @endif
                </div>
            @else
                <p class="directText" style="margin-top: 50px; color: #F08080; font-family: Candara"> *Finished browsing
                    on the campaigns
                    and want to have some
                    funs? We are providing games
                    for you! Multiple games and quizzes from different campaigns, get them all clear and bring your
                    desired gifts home!</p>
                <div class="sidebar-item submit-comment"
                     style="justify-content: center;align-items: center;display: flex;">
                    @if (Auth::guest())
                        <a href="{{ route('participant.gamesQuizzes') }}">
                            <button class="btn">Proceed to quiz & games</button>
                        </a>
                    @else
                        <a href="{{ route('l_participant.gamesQuizzes') }}">
                            <button class="btn">Proceed to quiz & games</button>
                        </a>
                    @endif
                </div>
            @endif

            <h2 class="text-center" style="margin-top: 90px; font-family: Candara; font-weight: bold;
                ">Gifts In Stock</h2>
            <br>
            {{--<div class="row" style="justify-content: center;align-items: center;display: flex;">
                @foreach($gifts as $gift)
                    <div class="col-md-3 col-xs-3">
                        <div class="blog-post">
                            <div class="blog-thumb">
                                <img
                                    src="/assets/uploaded_images/gift_images//{{$gift->name}}//{{$gift->image_name}}"
                                    style="width: 100%; height: 120px; object-fit: cover;">
                            </div>
                            <div class="down-content">
                                @if (Auth::guest())
                                    <a href="{{ route('participant.gift') }}"><h4>{{$gift->name}}</h4></a>
                                @else
                                    <a href="{{ route('l_participant.gift') }}"><h4>{{$gift->name}}</h4></a>
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>--}}
            <section class="container-fluid" style="justify-content: center;align-items: center;display: flex;">
                <div class="row grid">
                    @foreach($gifts as $gift)
                        <div class="gift">
                            @if (Auth::guest())
                                <a href="{{ route('participant.gift') }}"><img
                                        src="/assets/uploaded_images/gift_images//{{$gift->name}}//{{$gift->image_name}}"></a>
                            @else
                                <a href="{{ route('l_participant.gift') }}"><img
                                        src="/assets/uploaded_images/gift_images//{{$gift->name}}//{{$gift->image_name}}"></a>
                            @endif
                        </div>
                    @endforeach
                </div><!--end row-->

            </section>
            @if (Auth::guest())
                <a href="{{ route('participant.gift') }}" style="float: right; color: #1e1e1e; margin-top: 15px">More Gifts >></a>
            @else
                <a href="{{ route('l_participant.gift') }}" style="float: right; color: #1e1e1e; margin-top: 15px">More Gifts
                    >></a>
            @endif
        </div>
    </div>
</section>

<!-- Banner Starts Here -->
<div class="heading-page header-text">
    <section class="page-heading"
             style="background-image: url('/assets/uploaded_images/campaign_images//{{$campaign->name}}//{{$campaign->image_name}}');
                 position: relative;
                 background-position: center center;
                 background-repeat: no-repeat;
                 background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-content">
                        <h4>{{$days_remaining}} days to go</h4>
                        <h2> End in {{$campaign->end_date}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Banner Ends Here -->
<div class="bubble speech" id="menuBubble">
    <div class="row">
        <button class="close" id="close"><i class="fas fa-times" style="font-weight: bolder;"></i></button>
    </div>
    <p>Hi, welcome to {{$campaign->name}}! </p>
    <p style="margin-bottom: 8px">What can I help you?</p>
    <button class="guideBtn" value="0" onclick="speechText(this.value)">How long does this campaign/event last?</button>
    <button class="guideBtn" value="1" onclick="speechText(this.value)">Does this campaign provides quiz to answer?
    </button>
    <button class="guideBtn" value="2" onclick="speechText(this.value)">Does the campaign organizers provide any
        contacts info?
    </button>
</div>

<div class="bubble speech" id="SpeechBubble">
    <div class="row">
        <button class="close" id="close2"><i class="fas fa-times" style="font-weight: bolder;"></i></button>
    </div>
    <p id="Speech"></p>
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

<script>
    var guide = $('#guide');
    var close = $('#close');
    var close2 = $('#close2');
    var Speech = document.getElementById("Speech");
    var menuBubble = document.getElementById("menuBubble");
    $("#SpeechBubble").hide();
    $("#menuBubble").hide();

    var speech = [
        "{{$campaign->name}} lasts from {{$campaign->start_date}} to {{$campaign->end_date}} and there are still {{$days_remaining}} days to go!",
        @if($campaign->quiz === true)
            "Yes, {{$campaign->name}} does providing quiz and you may answer the quiz through clicking the button below the orange text!",
        @else
            "No, {{$campaign->name}} does not providing any quiz for itself, but you may browse through the other quizzes and games through clicking the button below the orange text!",
        @endif
            "Of course, you can contact the campaign/event organizer through writing an email to {{$campaign->contact_email}}" +
        " OR you can call them at {{$campaign->contact_number}}.",
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
    
    (function($) {
        var $window = $(window);
        var $videoWrap = $('.video-wrap');
        var $video = $('.video');
        var videoHeight = $video.outerHeight();

        $window.on('scroll',  function() {
            var windowScrollTop = $window.scrollTop();
            var videoBottom = videoHeight + $videoWrap.offset().top;

            if (windowScrollTop > videoBottom) {
                $videoWrap.height(videoHeight);
                $video.addClass('stuck');
            } else {
                $videoWrap.height('auto');
                $video.removeClass('stuck');
            }
        });
    }(jQuery));
</script>
