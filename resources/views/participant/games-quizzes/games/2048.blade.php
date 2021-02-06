@include('layouts.my_app')
<link rel="stylesheet" href="{{ URL::asset('/assets/website_template/css/font-awesome-animation.min.css') }}">

<link rel="stylesheet" href="{{ URL::asset('/assets/games_and_quizzes/games/2048/style/main.css') }}">
<link rel="shortcut icon" href="{{ URL::asset('/assets/games_and_quizzes/games/2048/favicon.ico') }}">
<link rel="apple-touch-icon" href="{{ URL::asset('/assets/games_and_quizzes/games/2048/meta/apple-touch-icon.png') }}">
<link rel="apple-touch-startup-image"
      href="{{ URL::asset('/assets/games_and_quizzes/games/2048/meta/apple-touch-startup-image-640x1096.png') }}"
      media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)"> <!-- iPhone 5+ -->
<link rel="apple-touch-startup-image"
      href="{{ URL::asset('/assets/games_and_quizzes/games/2048/meta/apple-touch-startup-image-640x920.png') }}"
      media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 2)"> <!-- iPhone, retina -->

<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">

<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">

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

        body.swal2-shown > [aria-hidden="true"] {
            filter: blur(3px);
        }

        body > * {
            transition: 0.1s filter linear;
        }

        .swal2-shown {
            z-index: 999999;
            max-height: 100% !important;
            /*overflow-y : auto !important;*/
        }

        .title {
            font-size: 80px;
            font-weight: bold;
            margin: 0;
            display: block;
            float: left;
            font-family: Roboto;
            color: #776E65;
        }

        hX span {
            position: relative;
            float: left;
            /*display: inline-block;*/
            font-weight: bold;
            font-family: Roboto;
            color: #776E65;
            -webkit-animation: bounce 0.5s ease infinite alternate;
            font-size: 70px;
        }

        .ranking {
            display: inline-block;
            background-color: #FF9800;
            width: 50px;
            height: 50px;
            text-align: center;
            border-radius: 4px;
            position: fixed;
            bottom: 100px;
            right: 30px;
            /*transition: background-color .3s,
            opacity .5s, visibility .5s;
            opacity: 0;*/
            z-index: 1000;
        }

        .swal2-title {
            font-family: Segoe UI;
            font-weight: bolder;
        }
    </style>
</head>

<!-- Banner Starts Here -->
{{--<div class="heading-page header-text" hidden>
    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-content">
                        --}}{{--<h2 class="hx" style="margin-top: 55px">Games and Quizzes</h2>--}}{{--
                        <hX style="float: left; margin-top: 55px">
                            <span>2</span>
                            <span>0</span>
                            <span>4</span>
                            <span>8</span>
                        </hX>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>--}}

<audio id="my_audio" src="/assets/games_and_quizzes/games/bgm/bensound-buddy.mp3" loop="loop"></audio>

<!-- Banner Ends Here -->
<body class="antialiased">
<section class="blog-posts grid-system col-12" style="margin-top: 2%">
    <div class="scontainer" style="margin-top: 70px">
        <div class="row">
            <button style="float: right; margin-top: 80px; padding: 3px 12px; border-radius: 3px; background: #bbada0;
        color: #EEE4DA; text-transform: uppercase; font-weight: bold; font-size: 18px; border-width: 0"
                    onclick="help()">
                <i class="fas fa-info-circle"></i> Help
            </button>
        </div>
        <div class="row">
        
            @isset($top_10)
                <button style="float: right; margin-top: 20px; padding: 3px 12px; border-radius: 3px; background: #bbada0;
        color: #EEE4DA; text-transform: uppercase; font-weight: bold; font-size: 18px; border-width: 0"
                    onclick="show_ranking()">
                    <i class="fas fa-crown faa-shake animated"></i> Show TOP-10 ranking
                </button>
            @endisset
            
        </div>
        <div class="row col-12">
        </div>
        <div class="heading">
            {{--<h1 class="title">2048</h1>--}}
            <div class="row">
                <hX class="title col-8" style="float: left; margin-top: 55px">
                    <span>2</span>
                    <span>0</span>
                    <span>4</span>
                    <span>8</span>
                </hX>
                <div class="scores-container col-4" style="float: right;margin-top: 65px">
                    <div class="score-container" id="score">0</div>
                    <div class="best-container" hidden>0</div>
                    {{--@if(empty($top))
                        <div class="best-container" hidden>0</div>
                    @else
                        <div class="best-container">{{ $top->scores }}</div>
                    @endif--}}
                </div>
            </div>

        </div>

        <div class="above-game">
            <p class="game-intro">Join the numbers and get to the <strong>2048 tile!</strong></p>
            <a class="restart-button" id="restart" style="color: #e8eaea" hidden>New Game</a>
        </div>

        <div class="game-container">
            <div class="game-message">
                <p></p>
                <div class="lower">
                    <a class="keep-playing-button" hidden>Keep going</a>
                    <a class="retry-button" hidden>Try again</a>
                </div>
            </div>

            <div class="grid-container">
                <div class="grid-row">
                    <div class="grid-cell"></div>
                    <div class="grid-cell"></div>
                    <div class="grid-cell"></div>
                    <div class="grid-cell"></div>
                </div>
                <div class="grid-row">
                    <div class="grid-cell"></div>
                    <div class="grid-cell"></div>
                    <div class="grid-cell"></div>
                    <div class="grid-cell"></div>
                </div>
                <div class="grid-row">
                    <div class="grid-cell"></div>
                    <div class="grid-cell"></div>
                    <div class="grid-cell"></div>
                    <div class="grid-cell"></div>
                </div>
                <div class="grid-row">
                    <div class="grid-cell"></div>
                    <div class="grid-cell"></div>
                    <div class="grid-cell"></div>
                    <div class="grid-cell"></div>
                </div>
            </div>

            <div class="tile-container">

            </div>
        </div>

        <p class="game-explanation">
            <strong class="important">How to play:</strong> Use your <strong>arrow keys</strong> to move the tiles.
            If you are playing on mobile device, swipe on the game field with your <strong>fingers</strong>. When
            two tiles with the same number touch, they <strong>merge into one</strong>! The <strong>emerge of 2048
                tile</strong> means you
            are <strong>wining this game!</strong>
        </p>
        {{--<hr>--}}
        <p hidden>
            <strong class="important">Note:</strong> This site is the official version of 2048. You can play it on your
            phone via <a href="http://git.io/2048">http://git.io/2048.</a> All other apps or sites are derivatives or
            fakes, and should be used with caution.
        </p>
        <hr>
        <p><strong><u>SCORES TO POINTS CONVERSION</u></strong></p>
        <p> Less than 500 = <strong>10</strong> points
            <br> 500 -- 999 = <strong>15</strong> points
            <br> 1000 -- 1499 = <strong>20</strong> points
            <br> 1500 -- 1999 = <strong>25</strong> points
            <br> 2000 -- 2999 = <strong>30</strong> points
            <br> 3000 -- 4999 = <strong>35</strong> points
            <br> 5000 -- 9999 = <strong>40</strong> points
            <br> 10000 -- 18999 = <strong>45</strong> points
            <br> More than or Equal to 19000 = <strong>50</strong> points
            <br> WIN = <strong>60</strong> points!
        </p>
        <hr>
        <p>
            Created by <a href="http://gabrielecirulli.com" target="_blank">Gabriele Cirulli.</a> Based on <a
                href="https://itunes.apple.com/us/app/1024!/id823499224" target="_blank">1024 by Veewo Studio</a> and
            conceptually similar to <a href="http://asherv.com/threes/" target="_blank">Threes by Asher Vollmer.</a>
        </p>
    </div>
</section>

<div class="bubble speech" id="menuBubble">
    <div class="row">
        <button class="close" id="close"><i class="fas fa-times" style="font-weight: bolder;"></i></button>
    </div>
    <p>Hi, welcome to 2048! </p>
    <p style="margin-bottom: 8px">What can I help you?</p>
    <button class="guideBtn" value="0" onclick="speechText(this.value)">How to play 2048?</button>
    <button class="guideBtn" value="1" onclick="speechText(this.value)">Is there any tips on playing 2048?
    </button>
    <button class="guideBtn" value="2" onclick="speechText(this.value)">What will happen if I leave this 2048 before game over or win?
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
        src="{{ URL::asset('/assets/games_and_quizzes/games/2048/js/bind_polyfill.js') }}"></script>
<script type="text/javascript"
        src="{{ URL::asset('/assets/games_and_quizzes/games/2048/js/classlist_polyfill.js') }}"></script>
<script type="text/javascript"
        src="{{ URL::asset('/assets/games_and_quizzes/games/2048/js/animframe_polyfill.js') }}"></script>
<script type="text/javascript"
        src="{{ URL::asset('/assets/games_and_quizzes/games/2048/js/keyboard_input_manager.js') }}"></script>
<script type="text/javascript"
        src="{{ URL::asset('/assets/games_and_quizzes/games/2048/js/html_actuator.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/assets/games_and_quizzes/games/2048/js/grid.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/assets/games_and_quizzes/games/2048/js/tile.js') }}"></script>
<script type="text/javascript"
        src="{{ URL::asset('/assets/games_and_quizzes/games/2048/js/local_storage_manager.js') }}"></script>
<script type="text/javascript"
        src="{{ URL::asset('/assets/games_and_quizzes/games/2048/js/game_manager.js') }}"></script>
<script type="text/javascript"
        src="{{ URL::asset('/assets/games_and_quizzes/games/2048/js/application.js') }}"></script>

<script>
    window.onload = function () {
        document.getElementById("restart").click();
        document.getElementById("my_audio").play();

        Swal.fire({
                title: 'WELCOME TO 2048!',
                html: '<img class = "rotate" src="/assets/games_and_quizzes/games_icon/2048.jpg" ' +
                    'style="width: 110px; height: 110px; margin: 30px auto 30px auto" alt="img">' +
                    '<h3 style="font-family: Segoe UI; font-weight: bold">' +
                    '2048 is a game which challenges your <span style="color: coral">MATH</span> and ' +
                    '<span style="color: mediumseagreen">STRATEGY FORMULATION skill</span>!</h3>' +
                    '<h4 style="margin-top: 50px ;font-family: Segoe UI; font-weight: bold"><u>HOW TO PLAY</u></h4>' +
                    '<h4 style="margin-top: 10px;font-family: Segoe UI; font-weight: bold; font-size: 22px">' +
                    'If you are playing on computer, use your <span style="color: dodgerblue"><strong>arrow keys (↑, ↓, ←, →)</strong></span> to move the tiles.</h4>' +
                    '<h4 style="margin-top: 10px;font-family: Segoe UI; font-weight: bold; font-size: 22px">' +
                    'If you are playing on mobile device, swipe on the game field with your ' +
                    '<span style="color: hotpink"><strong>fingers</strong></span> instead of ' +
                    '<span style="color: dodgerblue"><strong>arrow keys</strong></span>.</h4>' +
                    '<h4 style="margin-top: 10px;font-family: Segoe UI; font-weight: bold; font-size: 22px">' +
                    'When two tiles with the same number touch, they <strong>merge into one</strong>!</h4>' +
                    '<h4 style="margin-top: 10px;font-family: Segoe UI; font-weight: bold; font-size: 22px">' +
                    'The <strong style="color: mediumpurple">emerge of 2048 tile</strong> means you are <strong style="color: mediumpurple">wining this game!</strong></h4>',
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

    var guide = $('#guide');
    var close = $('#close');
    var close2 = $('#close2');
    var Speech = document.getElementById("Speech");
    var menuBubble = document.getElementById("menuBubble");
    $("#SpeechBubble").hide();
    $("#menuBubble").hide();

    var speech = [
        "Click on the HELP button above the game field, then you shall get the tutorial of 2048! You may also check the " +
        "area below game field for getting tutorial in another view~",
        "Alright, let me show you with some tips on 2048. 1st, understand how the board move. 2nd, don't chase large tiles. 3rd, work your way toward the corners. 4th, plan ahead. 5th, " +
        "slow down and think. 6th, always make moves where multiple tiles merge first!",
        "Leaving 2048 before game over or win means that you will lose everything so far you have archive in current gameplay! You " +
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

    var score;

    function help(){
        Swal.fire({
                title: 'WELCOME TO 2048!',
                html: '<img class = "rotate" src="/assets/games_and_quizzes/games_icon/2048.jpg" ' +
                    'style="width: 110px; height: 110px; margin: 30px auto 30px auto" alt="img">' +
                    '<h3 style="font-family: Segoe UI; font-weight: bold">' +
                    '2048 is a game which challenges your <span style="color: coral">MATH</span> and ' +
                    '<span style="color: mediumseagreen">STRATEGY FORMULATION skill</span>!</h3>' +
                    '<h4 style="margin-top: 50px ;font-family: Segoe UI; font-weight: bold"><u>HOW TO PLAY</u></h4>' +
                    '<h4 style="margin-top: 10px;font-family: Segoe UI; font-weight: bold; font-size: 22px">' +
                    'If you are playing on computer, use your <span style="color: dodgerblue"><strong>arrow keys (↑, ↓, ←, →)</strong></span> to move the tiles.</h4>' +
                    '<h4 style="margin-top: 10px;font-family: Segoe UI; font-weight: bold; font-size: 22px">' +
                    'If you are playing on mobile device, swipe on the game field with your ' +
                    '<span style="color: hotpink"><strong>fingers</strong></span> instead of ' +
                    '<span style="color: dodgerblue"><strong>arrow keys</strong></span>.</h4>' +
                    '<h4 style="margin-top: 10px;font-family: Segoe UI; font-weight: bold; font-size: 22px">' +
                    'When two tiles with the same number touch, they <strong>merge into one</strong>!</h4>' +
                    '<h4 style="margin-top: 10px;font-family: Segoe UI; font-weight: bold; font-size: 22px">' +
                    'The <strong style="color: mediumpurple">emerge of 2048 tile</strong> means you are <strong style="color: mediumpurple">wining this game!</strong></h4>',
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

    function win() {
        setTimeout(function () {
            Swal.fire(
                {
                    title: 'Congratulation! You have clear 2048 successfully and your score is '
                        + score + '!',
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
                        url: "{{ route('l_participant.finish2048') }}",
                        method: "POST",
                        data: {
                            score: score,
                            win: 1,
                        },
                        dataType: "json",
                        sendBefore: function (data) {
                            console.log('before, ' + score);

                        },
                        complete: function (data) {
                            console.log('complete, ' + score);

                        },
                        success: function (data) {
                            console.log('success');
                            window.location = data.url;
                        }
                    })
                }
            });
        }, 2200)
    }

    function lose() {
        setTimeout(function () {
            Swal.fire(
                {
                    title: "Owww..... Seem like you didn't managed to reached the end of the game. But it's ok! I know you have tried your best! " +
                        "Your score is " + score + "!",
                    text: 'Your points and medals will be updated once you return to the stations through the button below!',
                    width: 600,
                    background: '#fff url("/assets/games_and_quizzes/quizzes/sweetalert_background2.jpg")',
                    allowOutsideClick: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Return to the Games & Quizzes Station',
                    backdrop: 'rgba(224,196,206,0.5) url("/assets/games_and_quizzes/games/gif/lose.gif") round',
                }
            ).then((result) => {
                if (result.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ route('l_participant.finish2048') }}",
                        method: "POST",
                        data: {
                            score: score,
                            win: 0,
                        },
                        dataType: "json",
                        sendBefore: function (data) {
                            console.log('before, ' + score);

                        },
                        complete: function (data) {
                            console.log('complete, ' + score);

                        },
                        success: function (data) {
                            console.log('success');
                            window.location = data.url;
                        }
                    })
                }
            });
        }, 2600)
    }

    GameManager.prototype.move = function (direction) {
        // 0: up, 1: right, 2: down, 3: left
        var self = this;

        if (this.isGameTerminated()) return; // Don't do anything if the game's over

        var cell, tile;

        var vector = this.getVector(direction);
        var traversals = this.buildTraversals(vector);
        var moved = false;

        // Save the current tile positions and remove merger information
        this.prepareTiles();

        // Traverse the grid in the right direction and move tiles
        traversals.x.forEach(function (x) {
            traversals.y.forEach(function (y) {
                cell = {x: x, y: y};
                tile = self.grid.cellContent(cell);

                if (tile) {
                    var positions = self.findFarthestPosition(cell, vector);
                    var next = self.grid.cellContent(positions.next);

                    // Only one merger per row traversal?
                    if (next && next.value === tile.value && !next.mergedFrom) {
                        var merged = new Tile(positions.next, tile.value * 2);
                        merged.mergedFrom = [tile, next];

                        self.grid.insertTile(merged);
                        self.grid.removeTile(tile);

                        // Converge the two tiles' positions
                        tile.updatePosition(positions.next);

                        // Update the score
                        self.score += merged.value;

                        // The mighty 2048 tile
                        if (merged.value === 2048) {
                            score = self.score;
                            self.won = true;
                            win();
                            /*self.over = true;
                            lose();*/
                            /*console.log(self.score);*/
                        }
                    } else {
                        self.moveTile(tile, positions.farthest);
                    }

                    if (!self.positionsEqual(cell, tile)) {
                        moved = true; // The tile moved from its original cell!
                    }
                }
            });
        });

        if (moved) {
            this.addRandomTile();

            //if (!this.movesAvailable()) {
            if (!this.movesAvailable()) {
                this.over = true; // Game over!
                score = self.score;
                lose();
            }

            this.actuate();
        }
    };
    
    @isset($top_10)
        function show_ranking() {
        Swal.fire({
                title: '2048 Top-10 Ranking',
                html: '<table class="table table-striped table-hover table-bordered table-responsive-sm" >' +
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
    @endisset
</script>
