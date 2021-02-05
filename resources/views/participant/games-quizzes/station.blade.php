@include('layouts.my_app')
<link rel="stylesheet" href="{{ URL::asset('/assets/website_template/css/font-awesome-animation.min.css') }}">
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <style>
        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .main-button {
            border-radius: 12px;
        }


        .my_button {
            font-size: 16px;
        }

        .button {
            border: none;
            height: auto;
            width: 180px;
            background: #fff;
            border-radius: 5px;
            padding: 20px 10px;
            box-sizing: border-box;
            /*background: #DCDCDC;*/
        }

        .button img {
            width: 130px;
            height: 110px;
            border-radius: 5%;
            display: block;
            margin: 0 auto 20px;
        }

        .btn-disable {
            color: #20232e;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            /*text-transform: uppercase;*/
            font-size: 16px;
        }

        a.btn-link {
            color: #20232e;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            /*text-transform: uppercase;*/
            font-size: 16px;
        }

        a.btn-link:hover {
            color: #f48840;
        }

        .page-heading {
            margin: 0px 10px;
            padding: 120px 0px;
            text-align: left;
            position: relative;
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
            background-image: url("/assets/website_template/images//{{ 'nyan-cat.gif' }}");
            height: 400px;
        }

        .stamina {
            height: 50px;
            width: 140px;
            border-radius: 30px;
            background-color: #E5E8E8;
            /*border-style: solid;
            border-width: thin;*/
            -webkit-filter: drop-shadow(0 1px 5px rgba(0, 0, 0, .5));
            -moz-filter: drop-shadow(0 1px 5px rgba(0, 0, 0, .5));
            -o-filter: drop-shadow(0 1px 5px rgba(0, 0, 0, .5));
            filter: drop-shadow(0 1px 5px rgba(0, 0, 0, .5));
            position: relative; /*or fixed*/
            /*right: 5px;*/
            margin-top: 50px;
            margin-bottom: 7px;
            float: right;
            right: 0;
        }

        .disabled {
            position: relative;
            margin-bottom: 10px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0px 0px 0 0px rgba(0, 0, 0, 0);
            border-radius: 50px;
            background: lightslategray;
            padding: 6px;
            /*padding: 1rem 0;*/
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            /*font-size: 2.75rem;*/
            font-size: 18px;
            cursor: pointer;
        }

        .disabled .icons {
            position: relative;
            display: flex;
            margin-right: 5px;
            align-items: center;
            width: 1.25rem;
            height: 2.6rem;
        }

        .disabled .icons i {
            position: absolute;
            left: 0;
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
            width: 350px;
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
            z-index: 100;
            /*visibility: hidden;*/
        }

        .bubble p {
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
            width: 285px;
        }

        @media only screen and (max-width: 480px) {
            .page-heading {
                height: 250px;
                margin: 0px 10px;
                padding: 50px 0px;
            }

            .page-heading .text-content .hX span {
                font-size: 26px;
            }

            .button {
                width: 140px;
                margin: auto;
            }

            .my_button {
                font-size: 14px;
                margin: auto;
                height: 40px;
            }

            .guide {
                width: auto;
                height: 120px;
                position: fixed;
                bottom: 10px;
                left: 10px;
                z-index: 100;
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
                z-index: 100;
                /*visibility: hidden;*/
            }

            .bubble p {
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
                font-size: 10px;
                color: white;
                margin: 5px auto;
                border: transparent;
                padding: 3px 5px;
                width: 146px;
            }
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
                        {{--<h2 class="hx" style="margin-top: 55px">Games and Quizzes</h2>--}}
                        <hX class="hX" style="float: left; margin-top: 55px">
                            <span>G</span>
                            <span>A</span>
                            <span>M</span>
                            <span>E</span>
                            <span>S</span>
                            <span>  </span>
                            <span>A</span>
                            <span>N</span>
                            <span>D</span>
                            <span>  </span>
                            <span>Q</span>
                            <span>U</span>
                            <span>I</span>
                            <span>Z</span>
                            <span>Z</span>
                            <span>E</span>
                            <span>S</span>
                        </hX>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Banner Ends Here -->
<body class="antialiased">
<section class="blog-posts grid-system col-12" style="margin-top: 2%">
    <div class="container col-12">
        @if (Auth::guest())
            <div class="alert alert-danger col-12"
                 style="text-align: justify; text-justify: inter-word;">
                <ul>
                    Dear Participant, noted that you have not logged into our system as an user, you are
                    not able to
                    answer the quizzes and plays the games unless you have logged in.<br>
                </ul>
            </div>
        @endif
    </div>

    <div class="container">
        <div class="row">
            @if (Auth::guest())
            @else
                <div class="row col-12">
                    <div class="col-6">
                        <div class="stamina" id="points"
                             style="justify-content: center;align-items: center;display: flex; float: left">
                            <p style="color: black; ">Your points: {{Auth::user()->points}}</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="stamina" id="stamina"
                             style="justify-content: center;align-items: center;display: flex; width: 100px;">
                            <img src="/assets/games_and_quizzes/games_icon/stamina.png" alt="img" style="float: left;"
                                 height="30px" id="stamina_img">
                            <p id="stamina_num"
                               style="float: right; color: black; margin-left: 5px">{{Auth::user()->stamina}} / 12</p>
                        </div>
                    </div>
                    <small style="margin: 15px auto 0 auto; color: darkorange;">Spend 1 medal for playing 1 game. There
                        are total 12
                        medals given in a single day, you may restore the medals through answering quizzes (answering
                        one quiz will restore
                        1 medal) or wait until 12.00 A.M..</small>
                </div>
            @endif
            <div class="col-lg-6 col-sm-12">
                <div class="sidebar" style="margin: auto">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sidebar-item recent-posts">
                                <div class="sidebar-heading">
                                    <h2><i class="fas fa-gamepad faa-wrench animated"></i> Games</h2>
                                </div>
                                <div class="content">
                                    @if (Auth::guest())
                                        <div class="row">
                                            <a href="{{url('l_participant/games/2048')}}" class="btn-link"
                                               style="float: left">
                                                <div class="button">
                                                    <img src="/assets/games_and_quizzes/games_icon/2048.jpg"
                                                         style="width: 110px; height: 110px;" alt="img">
                                                    <span> 2048 </span>
                                                </div>
                                            </a>
                                            <a href="{{url('l_participant/games/FlappyBird')}}" class="btn-link"
                                               style="float: right">
                                                <div class="button">
                                                    <img src="/assets/games_and_quizzes/games_icon/clumsy_bird.jpg"
                                                         style="width: 110px; height: 110px;" alt="img">
                                                    <span> Flappy Bird </span>
                                                </div>
                                            </a>
                                        </div>
                                    @else
                                        @if(Auth::user()->stamina == 0)
                                            <div class="row">
                                                <div class="button btn-disable" style="float: left">
                                                    <img src="/assets/games_and_quizzes/games_icon/2048.jpg"
                                                         style="width: 110px; height: 110px;" alt="img">
                                                    <span> 2048 </span>
                                                </div>
                                                <div class="button btn-disable" style="float: right">
                                                    <img src="/assets/games_and_quizzes/games_icon/clumsy_bird.jpg"
                                                         style="width: 110px; height: 110px;" alt="img">
                                                    <span> Flappy Bird </span>
                                                </div>
                                                <small style="margin: 15px auto 0 auto; color: darkred;">You have
                                                    already run out of medals,
                                                    please answer quiz to restore your medals or wait until 12.00
                                                    A.M.!</small>
                                            </div>
                                        @else
                                            <div class="row">
                                                <a href="{{url('l_participant/games/2048')}}" class="btn-link"
                                                   style="float: left">
                                                    <div class="button">
                                                        <img src="/assets/games_and_quizzes/games_icon/2048.jpg"
                                                             style="width: 110px; height: 110px;" alt="img">
                                                        <span> 2048 </span>
                                                    </div>
                                                </a>
                                                <a href="{{url('l_participant/games/FlappyBird')}}" class="btn-link"
                                                   style="float: right">
                                                    <div class="button">
                                                        <img src="/assets/games_and_quizzes/games_icon/clumsy_bird.jpg"
                                                             style="width: 110px; height: 110px;" alt="img">
                                                        <span> Flappy Bird </span>
                                                    </div>
                                                </a>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="sidebar">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sidebar-item recent-posts">
                                <div class="sidebar-heading">
                                    <h2><i class="fas fa-scroll faa-wrench animated"></i> Quizzes</h2>
                                </div>
                                <div class="content">
                                    <ul>
                                        @foreach($quizzes as $quiz)
                                            <li>
                                                @if (Illuminate\Support\Facades\Auth::guest())
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h5>{{ $quiz->name }}</h5>
                                                            <span>No. of attempt today: </span>
                                                        </div>
                                                        <a class="my_button col-5"
                                                           href="{{url('/l_participant/answerQuiz', $quiz->id)}}">
                                                            Login to Answer!
                                                        </a>
                                                    </div>
                                                @else
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h5>{{ $quiz->name }}</h5>
                                                            @if($quiz->attempted_today == true)
                                                                <span>No. of attempt today: 1/1</span>
                                                            @else
                                                                <span>No. of attempt today: 0/1</span>
                                                            @endif
                                                        </div>
                                                        @if($quiz->attempted_today == true)
                                                            <a class="disabled col-5" style="color: white;">
                                                                <div class="icons" style="float: right; color: white;">
                                                                    <i class="far fa-check-square"></i>
                                                                </div>
                                                                Answered today
                                                            </a>
                                                        @else
                                                            <a href="{{url('/l_participant/answerQuiz', $quiz->id)}}"
                                                               class="my_button col-5">
                                                                <div class="icons" style="float: right">
                                                                    <i class="fas fa-pencil-alt icon-default"></i>
                                                                    {{--<i class="fa fa-thumbs-up icon-hover"></i>--}}
                                                                    <i class="fas fa-pencil-alt icon-hover"></i>
                                                                </div>
                                                                Answer!
                                                            </a>
                                                        @endif

                                                    </div>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="bubble speech" id="menuBubble">
    <div class="row">
        <button class="close" id="close"><i class="fas fa-times" style="font-weight: bolder;"></i></button>
    </div>
    <p>Hi~ Great to see you in this station!</p>
    <p style="margin-bottom: 8px">What can I help you?</p>
    <button class="guideBtn" value="0" onclick="speechText(this.value)">How can I play games and answering the
        quizzes?
    </button>
    <button class="guideBtn" value="1" onclick="speechText(this.value)">How can I restore the stamina for playing the
        games?
    </button>
    <button class="guideBtn" value="2" onclick="speechText(this.value)">What can I do with the points collected from
        playing games
        and answering quizzes?
    </button>
    <button class="guideBtn" value="3" onclick="speechText(this.value)">Are there any constraints on playing the games
        and
        answering the quizzes?
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
    $(function () {
        $('#games').addClass('active');
    });

    @if(Session::get('errorMsg'))
        Swal.fire({
            title: 'You cannot play games when your Medals is 0!',
            /*text: "You cannot play games when your Medals is 0!",*/
            /*icon: 'question',*/
            background: '#fff url("/assets/background_image/gift_alert1.jpg") center',
            backdrop: 'rgba(224,196,206,0.5)',
            showCancelButton: true,
            showConfirmButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Close'
        });
        @endif

        @if(Session::get('QuizErrorMsg'))
        Swal.fire({
            title: 'You cannot attempt same quiz for more than 1 time in a single day!',
            /*text: "You cannot play games when your Medals is 0!",*/
            /*icon: 'question',*/
            background: '#fff url("/assets/background_image/gift_alert1.jpg") center',
            backdrop: 'rgba(224,196,206,0.5)',
            showCancelButton: true,
            showConfirmButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Close'
        });
        @endif


    var guide = $('#guide');
    var close = $('#close');
    var close2 = $('#close2');
    var Speech = document.getElementById("Speech");
    var menuBubble = document.getElementById("menuBubble");
    $("#SpeechBubble").hide();
    $("#menuBubble").hide();

    var speech = [
        "To play the games and answer the quizzes, you will need to login in this system as an registered participant. " +
        "Playing games need to spend medals, while each participant is given 12 medals in everyday!",
        "There are 2 ways to restore the medals. First, wait until 12.00 A.M. then the medals will automatically restored" +
        " to 12. Second, answering quizzes restore the medals immediately, 1 quiz answered EQUALS to 1 medal restored!",
        "You may use the points collected to redeem gifts in the 'GIFTS' page, the gifts might be delivered to you in either physical or " +
        "digital way. Hurry up before the gifts run out of stock!",
        "Yes, since playing games required the spend of medals, you are only allowed to play games for 12 times in everyday " +
        "(But you can make it more by answering quizzes). While for quizzes, you can only answer a quiz for once in a single day.",
    ];

    guide.on('click', function (e) {
        e.preventDefault();
        /*document.getElementById("guide").style.pointerEvents = "none";*/

        $('#menuBubble').show();
        /*$('#SpeechBubble').style.visibility = 'visible'*/
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
        /*setTimeout(function () {
            $("#SpeechBubble").hide();
            document.getElementById("guide").style.pointerEvents = "auto";
        }, 9000);*/
    }
</script>

