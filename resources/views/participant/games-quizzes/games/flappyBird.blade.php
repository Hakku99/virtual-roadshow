@include('layouts.my_app')

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <style>
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

        canvas {
            /*border: 1px solid #000;*/
            display: block;
            margin: 0 auto;
        }

        body {
            background-image: url("/assets/games_and_quizzes/games/Flappy_Bird/background/background2.png");
            background-repeat: no-repeat;
            background-size: cover;
            /*background-color: #dae5f5;*/
        }

        .paragraph_background {
            width: 320px;
            margin: 30px auto 0 auto;
            /*background: rgb(211, 211, 211, 0.9);*/
            background: rgb(158, 125, 109, 0.9);
            padding: 30px;
            color: rgb(74, 10, 18);
            /*opacity: 0.3;*/
        }

        s
    </style>
</head>

<audio id="my_audio" src="/assets/games_and_quizzes/games/bgm/nezuminoensoku.mp3" loop="loop"></audio>

<!-- Banner Ends Here -->
<body class="antialiased">
<section class="blog-posts grid-system col-12" style="margin-top: 2%">
    <div class="row" id="ranking" style="width: 320px; margin: 170px auto 0 auto; ">
        <button style="padding: 6px 12px; border-radius: 3px; background: #9E7D6D;
        color: #EEE4DA; text-transform: uppercase; font-weight: bold; font-size: 18px; border-width: 0"
                onclick="help()">
            <i class="fas fa-info-circle"></i> Help
        </button>
    </div>
    <div class="row" style="width: 320px; margin: 20px auto 0 auto; ">
        <button style="padding: 6px 12px; border-radius: 3px; background: #9E7D6D;
        color: #EEE4DA; text-transform: uppercase; font-weight: bold; font-size: 18px; border-width: 0"
                onclick="show_ranking()">
            <i class="fas fa-crown faa-shake animated"></i> Show TOP-10 ranking
        </button>
    </div>
    <br>
    {{--<br>--}}
    <div id="chance" style="width: 320px; margin: auto; text-align: right; background: rgb(211, 211, 211, 0.9);">
        <h1>Chances: <span id="myText"></span></h1>
    </div>
    <canvas id="bird" width="320" height="480" ></canvas>

    <div class="paragraph_background">
        <strong class="important">HOW TO PLAY:</strong>
        <br>
        1. Move your <strong>Finger</strong> or <strong>Mouse cursor</strong> onto the game field.
        <br>
        2. <strong>Tap</strong> or <strong>Left click</strong> on the game field to start the game!
        <br>
        3. Keep <strong>Tapping</strong> or <strong>Left clicking</strong> on the game field to let the little bird
        flying in the sky. <strong>Avoid from hitting the pipes</strong> and <strong>Landing</strong> to fly further!
        <br><br>
        <strong><u>SCORES TO POINTS CONVERSION</u></strong>
        <br>
        Less than 5 = <strong>5</strong> points
        <br>
        5 -- 9 = <strong>10</strong> points
        <br>
        10 -- 14 = <strong>15</strong> points
        <br>
        15 -- 19 = <strong>20</strong> points
        <br>
        20 -- 24 = <strong>25</strong> points
        <br>
        25 -- 29 = <strong>30</strong> points
        <br>
        30 -- 34 = <strong>35</strong> points
        <br>
        35 -- 39 = <strong>40</strong> points
        <br>
        40 -- 44 = <strong>50</strong> points
        <br>
        More than or Equal to 45 = <strong>60</strong> points!

    </div>
</section>

<div class="bubble speech" id="menuBubble">
    <div class="row">
        <button class="close" id="close"><i class="fas fa-times" style="font-weight: bolder;"></i></button>
    </div>
    <p>Hi, welcome to Flappy Bird! </p>
    <p style="margin-bottom: 8px">What can I help you?</p>
    <button class="guideBtn" value="0" onclick="speechText(this.value)">How to play Flappy Bird?</button>
    <button class="guideBtn" value="1" onclick="speechText(this.value)">Is there any tips on playing Flappy Bird?
    </button>
    <button class="guideBtn" value="2" onclick="speechText(this.value)">What will happen if I leave this Flappy Bird before game over or win?
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

<script type="text/javascript"
        src="{{ URL::asset('/assets/games_and_quizzes/games/Flappy_Bird/game.js') }}"></script>

<script>
    window.onload = function () {
        score.best = 0;
        document.getElementById("my_audio").play();

        Swal.fire({
                title: 'WELCOME TO FLAPPY BIRD!',
                html: '<img class="rotate" src="/assets/games_and_quizzes/games_icon/clumsy_bird.jpg" ' +
                    'style="width: 110px; height: 110px; margin: 30px auto 30px auto" alt="img">' +
                    '<h3 style="font-family: Segoe UI; font-weight: bold">' +
                    'Want to challenges your <span style="color: coral">REFLECTION</span> and ' +
                    '<span style="color: mediumseagreen">AGILITY</span>? Flappy Bird is here for you to test on them!</h3>' +
                    '<h4 style="margin-top: 50px ;font-family: Segoe UI; font-weight: bold"><u>HOW TO PLAY</u></h4>' +
                    '<h4 style="margin-top: 10px;font-family: Segoe UI; font-weight: bold; font-size: 22px">' +
                    '1. If you are playing on computer, move your <span style="color: dodgerblue"><strong>Mouse cursor</strong></span> onto the game field and ' +
                    '<span style="color: #eda86d"><strong>click on anywhere on the game field </strong></span> to ' +
                    '<span style="color: indianred"><strong>start the game!</strong></span></h4>' +
                    '<h4 style="margin-top: 10px;font-family: Segoe UI; font-weight: bold; font-size: 22px">' +
                    '2. If you are playing on mobile device, move your ' +
                    '<span style="color: hotpink"><strong>fingers</strong></span> onto the game field and ' +
                    '<span style="color: #eda86d"><strong>tap on anywhere on the game field </strong></span> to ' +
                    '<span style="color: indianred"><strong>start the game!</strong></span></h4>' +
                    '<h4 style="margin-top: 10px;font-family: Segoe UI; font-weight: bold; font-size: 22px">' +
                    '3. Keep <strong style="color: #7c4d2a">Tapping or Left clicking</strong> on the game field to let the little bird ' +
                    'keep flying in the sky. <strong style="color:red">Avoid from hitting the pipes</strong> and <strong style="color:red">Landing</strong> to fly further!' +
                    '<strong style="color: mediumpurple"> Let\'s see how far you can get through!</strong></h4>' +
                    '<h4 style="margin-top: 50px;font-family: Segoe UI; font-weight: bold; font-size: 22px">* Noted that you are given ' +
                    '<span style="color: #103770"><strong>3 chances</strong></span> for single play, the best score amoung these 3 attemptions will be ' +
                    'taken as the final result~~</h4>',
                width: 600,
                background: '#fff url("/assets/games_and_quizzes/games/image/tutorial.jpg")',
                showCloseButton: true,
                allowOutsideClick: false,
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Start the game!',
                /*backdrop: 'rgba(224,196,206,0.5) url("/assets/games_and_quizzes/quizzes/sweetalert_background.gif") left',*/
                backdrop: 'rgba(224,196,206,0.5)',
            }
        )
    };
    loop();

    var guide = $('#guide');
    var close = $('#close');
    var close2 = $('#close2');
    var Speech = document.getElementById("Speech");
    var menuBubble = document.getElementById("menuBubble");
    $("#SpeechBubble").hide();
    $("#menuBubble").hide();

    var speech = [
        "Click on the HELP button above the game field, then you shall get the tutorial of Flappy Bird! You may also check the " +
        "area below game field for getting tutorial in another view~",
        "You want some tips on Flappy Bird? This is interesting......the only tips for playing Flappy Bird is keep you mind aware and make sure" +
        " your finger and hand works together with your mind!",
        "Leaving Flappy Bird before game over or win means that you will lose everything so far you have archive in current gameplay! You " +
        "must leave this game through the RETURN TO GAME STATION button that appear after game over or win if you want to have the reward points!",
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

    function  help() {
        Swal.fire({
                title: 'WELCOME TO FLAPPY BIRD!',
                html: '<img class="rotate" src="/assets/games_and_quizzes/games_icon/clumsy_bird.jpg" ' +
                    'style="width: 110px; height: 110px; margin: 30px auto 30px auto" alt="img">' +
                    '<h3 style="font-family: Segoe UI; font-weight: bold">' +
                    'Want to challenges your <span style="color: coral">REFLECTION</span> and ' +
                    '<span style="color: mediumseagreen">AGILITY</span>? Flappy Bird is here for you to test on them!</h3>' +
                    '<h4 style="margin-top: 50px ;font-family: Segoe UI; font-weight: bold"><u>HOW TO PLAY</u></h4>' +
                    '<h4 style="margin-top: 10px;font-family: Segoe UI; font-weight: bold; font-size: 22px">' +
                    '1. If you are playing on computer, move your <span style="color: dodgerblue"><strong>Mouse cursor</strong></span> onto the game field and ' +
                    '<span style="color: #eda86d"><strong>click on anywhere on the game field </strong></span> to ' +
                    '<span style="color: indianred"><strong>start the game!</strong></span></h4>' +
                    '<h4 style="margin-top: 10px;font-family: Segoe UI; font-weight: bold; font-size: 22px">' +
                    '2. If you are playing on mobile device, move your ' +
                    '<span style="color: hotpink"><strong>fingers</strong></span> onto the game field and ' +
                    '<span style="color: #eda86d"><strong>tap on anywhere on the game field </strong></span> to ' +
                    '<span style="color: indianred"><strong>start the game!</strong></span></h4>' +
                    '<h4 style="margin-top: 10px;font-family: Segoe UI; font-weight: bold; font-size: 22px">' +
                    '3. Keep <strong style="color: #7c4d2a">Tapping or Left clicking</strong> on the game field to let the little bird ' +
                    'keep flying in the sky. <strong style="color:red">Avoid from hitting the pipes</strong> and <strong style="color:red">Landing</strong> to fly further!' +
                    '<strong style="color: mediumpurple"> Let\'s see how far you can get through!</strong></h4>' +
                    '<h4 style="margin-top: 50px;font-family: Segoe UI; font-weight: bold; font-size: 22px">* Noted that you are given ' +
                    '<span style="color: #103770"><strong>3 chances</strong></span> for single play, the best score amoung these 3 attemptions will be ' +
                    'taken as the final result~~</h4>',
                width: 600,
                background: '#fff url("/assets/games_and_quizzes/games/image/tutorial.jpg")',
                showCloseButton: true,
                allowOutsideClick: false,
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Start the game!',
                /*backdrop: 'rgba(224,196,206,0.5) url("/assets/games_and_quizzes/quizzes/sweetalert_background.gif") left',*/
                backdrop: 'rgba(224,196,206,0.5)',
            }
        )
    }

    // LOOP
    function loop() {
        if (counter > 0) {
            document.getElementById("myText").innerHTML = counter;
            update();
            draw();
            frames++;

            requestAnimationFrame(loop);
        } else {
            document.getElementById("myText").innerHTML = counter;
            Swal.fire(
                {
                    title: 'Yeah~ You have tried Flappy Bird for three times and your best score is '+ score.best + '!',
                    text: 'Your points and medals will be updated once you return to the stations through the button below!',
                    width: 600,
                    background: '#fff url("/assets/games_and_quizzes/quizzes/sweetalert_background2.jpg")',
                    allowOutsideClick: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Return to the Games & Quizzes Station',
                    backdrop: 'rgba(224,196,206,0.5) url("/assets/games_and_quizzes/games/gif/congratulation.gif") ',
                }
            ).then((result) => {
                if (result.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ route('l_participant.finishFlappyBird') }}",
                        method: "POST",
                        data: {
                            score: score.best,
                        },
                        dataType: "json",
                        sendBefore: function (data) {
                            console.log('before, ' + score.best);

                        },
                        complete: function (data) {
                            console.log('complete, ' + score.best);

                        },
                        success: function (data) {
                            console.log('success');
                            window.location = data.url;
                        }
                    })
                }
            });
        }
    }

    function show_ranking() {
        Swal.fire({
                title: 'Flappy Bird Top-10 Ranking',
                html: '<table class="table table-striped table-hover table-bordered table-responsive-sm" width="100%" >' +
                    '<thead><tr> ' +
                    '<th scope="col">No.</th>' +
                    '<th scope="col">Name</th>' +
                    '<th scope="col">Points</th>' +
                    '</tr></thead><tbody>' +
                    '<?php $count = 1; ?>' +
                    '@foreach($top_10 as $tops)' +
                    '<td align="center">{{ $count++ }}</td>' +
                    '<td align="center">{{ $tops[0]->participant_name }}</td>' +
                    '<td align="center">{{ $tops[0]->scores }}</td>' +
                    '</tr>' +
                    '@endforeach' +
                    '</tbody></table>',
                width: 600,
                background: '#fff url("/assets/games_and_quizzes/quizzes/sweetalert_background2.jpg") width: 100%;',
                showCloseButton: true,
                allowOutsideClick: true,
                showCancelButton: true,
                showConfirmButton: false,
                /*confirmButtonColor: '#3085d6',
                confirmButtonText: 'I am ready!',*/
                cancelButtonText: 'Close',
                backdrop: 'rgba(224,196,206,0.5) url("/assets/games_and_quizzes/quizzes/sweetalert_background.gif") left',
            }
        )
    }
</script>
