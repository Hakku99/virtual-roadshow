@include('layouts.my_app')
<link rel="stylesheet" href="{{ URL::asset('/assets/website_template/css/font-awesome-animation.min.css') }}">
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <style>
        @media only screen and (max-width: 480px) {
            .page-heading {
                height: 250px;
                margin: 0px 10px;
                padding: 50px 0px;
            }
        }

        .new_button {
            color: white;
            border-radius: 50%;
            background-color: black;
            text-decoration: none;
            padding: 8px 16px;
            margin: 10px 15px 0 15px;
            display: inline-block;
            cursor: pointer;
            float: right;
            width: 60px;
            height: 60px;
            text-align:center;
            font-size: 30px;
        }

        .new_button a {
            text-decoration: none;
            color: black;
            line-height: 25px;
        }

        .new_container {
            width: 90%;
            /*margin: 150px auto;*/
            margin: auto;
            padding: 40px;
            /*background-image: url("/assets/games_and_quizzes/quizzes/sweetalert_background2.jpg");*/
            background-image: linear-gradient(rgba(234,154,145, 0.6), rgba(234,154,145, 0.6)), url("/assets/background_image/back2.jpg");
            background-repeat:no-repeat;
            background-color: #E5E8E8;
            background-size: cover;
            border-radius: 3px;
            color: black;
            box-shadow: 0 0 10px 0 #999;text-align: justify;
            text-justify: inter-word;
        }

        #prev {
            display: none;
        }

        #start {
            display: none;
            width: 100px;
        }

        input[type="radio"] {
            cursor: pointer;
        }

        .page-heading {
            background-image: url('/assets/uploaded_images/campaign_images//{{$campaign->name}}//{{$campaign->image_name}}');
            position: relative;
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        body.swal2-shown > [aria-hidden="true"] {
            filter: blur(3px);
        }

        body > * {
            transition: 0.1s filter linear;
        }

        .swal2-shown {
            z-index: 999999;
            max-height : 100% !important;
            /*overflow-y : auto !important;*/
        }

        .drop_caps:first-letter {
            float: outside;
            margin-top: 5px;
            font-size: 250%;
            line-height: 1;
            font-weight: bold;
            margin-right: 2px;
        }

        @keyframes stripe-slide {
            0% {
                background-position: 0% 0;
            }
            100% {
                background-position: 100% 0;
            }
        }

        .btn {
            /*overflow: visible;*/
            /*margin: 0;
            padding: 0;
            border: 0;*/
            display: inline-block;
            cursor: pointer;
            background: transparent;
            font: inherit;
            /*line-height: normal;*/
            cursor: pointer;
            -moz-user-select: text;
            /*display: block;*/
            text-decoration: none;
            text-transform: uppercase;
            padding: 12px 28px 18px;
            background-color: #fff;
            color: #666;
            border: 2px solid #666;
            border-radius: 6px;
            /*margin-bottom: 8px;*/
            transition: all 0.5s ease;
        }
        .btn:-moz-focus-inner {
            padding: 0;
            border: 0;
        }
        .btn--stripe {
            overflow: hidden;
            position: relative;
        }
        .btn--stripe:after {
            content: '';
            display: block;
            height: 7px;
            width: 100%;
            background-image: repeating-linear-gradient(45deg, #666, #666 1px, transparent 2px, transparent 5px);
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            border-top: 1px solid #666;
            position: absolute;
            left: 0;
            bottom: 0;
            background-size: 7px 7px;
        }
        .btn--stripe:hover {
            background-color: #666;
            color: #fff;
            border-color: #000;
        }
        .btn--stripe:hover:after {
            background-image: repeating-linear-gradient(45deg, #fff, #fff 1px, transparent 2px, transparent 5px);
            border-top: 1px solid #000;
            animation: stripe-slide 12s infinite linear forwards;
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
                        <hX style="float: left; margin-top: 55px">
                            <span> {{$quiz->name}}</span>
                        </hX>
                        {{--<h2> {{$quiz->name}} !</h2>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Banner Ends Here -->
<body class="antialiased">
<section class="blog-posts grid-system col-12">
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

    <div class="container col-12" style="width: 90%; padding: 0 0 25px">
        <button style="padding: 3px 12px; border-radius: 3px; background: #ea9a91;
        color: #f8ecf0; text-transform: uppercase; font-weight: bold; font-size: 18px; border-width: 0"
                onclick="help()">
            <i class="fas fa-info-circle"></i> TIPS
        </button>
    </div>


    <div class="new_container">
        <div id="quiz"></div>
        {{--<div class="new_button" id="next"><a href="#">Next</a></div>--}}
        {{--<div class="new_button" id="prev"><a href="#">Prev</a></div>--}}

        {{--<div class="new_button" id="next"><!--Next--><i class="fas fa-chevron-right"></i></div>
        <div class="new_button" id="prev"><!--Prev--><i class="fas fa-chevron-left"></i></div>--}}

        <div class="row col-12">
            <div class="col-6"><div class="btn btn--stripe" id="prev" style="float:left"><i class="fas fa-chevron-left"></i></div></div>
            <div class="col-6"><div class="btn btn--stripe" id="next" style="float:right;"><i class="fas fa-chevron-right"></i></div></div>
        </div>

        {{--<a href="{{url('/l_participant/answerQuiz', $quiz->id)}}" style="display: none; width: 380px;
        margin-top: 50px;"
           class="my_button" id="return">
            <div class="icons" style="float: right">
                <i class="fas fa-undo-alt icon-default"></i>
                --}}{{--<i class="fa fa-thumbs-up icon-hover"></i>--}}{{--
                <i class="fas fa-redo-alt icon-hover"></i>
            </div>
            Return to Games & Quizzes station!
        </a>--}}
    </div>
    {{--<div class="container">

            <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
    </div>--}}


</section>

<div class="bubble speech" id="menuBubble">
    <p>Yooo, welcome to {{ $quiz->name }}! </p>
    <p style="margin-bottom: 8px">What can I help you?</p>
    <button class="guideBtn" value="0" onclick="speechText(this.value)">I need tips on the quiz questions!</button>
    <button class="guideBtn" value="1" onclick="speechText(this.value)">What will I get after answering the quiz?
    </button>
    <button class="guideBtn" value="2" onclick="speechText(this.value)">What will happen if I leave this quiz before the quiz end?
    </button>
</div>

<p class="bubble speech" id="SpeechBubble"></p>

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
    Swal.fire({
        title: 'Welcome to the zone of {{$quiz->name}}!',
        /*text: "Before start answering the quiz, do you want to have a look on the video which are related to this quiz?",*/
        html: 'Before start answering the quiz, do you want to have a look on the video which are related to this quiz? ' +
            '<br><br>' + '* You might find something useful from the video~~~',
        width: 600,
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        allowOutsideClick: false,
        confirmButtonText: 'Yes, show it!',
        cancelButtonText: 'No, start the quiz!',
        background: '#fff url("/assets/games_and_quizzes/games/image/tutorial.jpg")',
        /*backdrop: ' rgba(0,0,123,0.3) ',*/
        backdrop: 'rgba(224,196,206,0.5) url("/assets/games_and_quizzes/quizzes/sweetalert_background.gif") left',
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                    title: 'Watch the video carefullly, so that you can get more score~~~',
                    html: '<iframe width=100% height=400 src="//www.youtube.com/embed/{{$video_id}}?autoplay=1" ' +
                        'allowfullscreen frameborder="0"></iframe>' +
                        '<p class="drop_caps" style:"margin-top: 20px;"> {{$campaign->section1}} </p>' +
                        '<p style="margin-top: 10px"> {{$campaign->section2}} </p>' +
                        '<p style="margin-top: 10px"> {{$campaign->section3}} </p>' +
                        '<p style="margin-top: 10px; font-weight: bold"> CAMPAIGN START DATE: {{$campaign->start_date}} </p>' +
                        '<p style="margin-top: 10px; font-weight: bold"> CAMPAIGN END DATE: {{$campaign->end_date}} </p>' +
                        '<p style="margin-top: 10px; font-weight: bold"> CONTACT NUMBER: {{$campaign->contact_number}} </p>'+
                        '<p style="margin-top: 10px; font-weight: bold"> CONTACT EMAIL: {{$campaign->contact_email}} </p>',
                    width: 600,
                background: '#fff url("/assets/games_and_quizzes/games/image/tutorial.jpg")',
                    showCloseButton: true,
                    allowOutsideClick: false,
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'I am ready!',
                    backdrop: 'rgba(224,196,206,0.5) url("/assets/games_and_quizzes/quizzes/sweetalert_background.gif") left',
                }
            )
        }
    });

    var quiz_id = '{{$quiz->id}}';

    var guide = $('#guide');
    var speechBubble = document.getElementById("SpeechBubble");
    var menuBubble = document.getElementById("menuBubble");
    $("#SpeechBubble").hide();
    $("#menuBubble").hide();

    var speech = [
        "Hoo Hoo... Click on the TIPS button above the quiz, then feel free to have the tips~~~",
        "Want to know the reward? Well, points and 1 BONUS MEDAL will be there for you! Try to get all correct for the quiz as" +
        " the number of points you get are depend on how many questions you answer correctly~~~",
        "Leaving quiz before quiz finish means that you will gain nothing from this quiz! You " +
        "must leave this quiz through the RETURN TO GAME STATION button that appear after quiz finish if you want to have the rewards!",
    ];

    guide.on('click', function (e) {
        e.preventDefault();
        /*document.getElementById("guide").style.pointerEvents = "none";*/

        $('#menuBubble').show();
        setTimeout(function () {
            $("#menuBubble").hide();
            /*document.getElementById("guide").style.pointerEvents = "auto";*/
        }, 6000);
        /*$('#SpeechBubble').style.visibility = 'visible'*/
    });

    function help(){
        Swal.fire({
                title: 'Watch the video carefullly, so that you can get more score~~~',
                html: '<iframe width=100% height=400 src="//www.youtube.com/embed/{{$video_id}}?autoplay=1" ' +
                    'allowfullscreen frameborder="0"></iframe>' +
                    '<p class="drop_caps" style:"margin-top: 20px;"> {{$campaign->section1}} </p>' +
                    '<p style="margin-top: 10px"> {{$campaign->section2}} </p>' +
                    '<p style="margin-top: 10px"> {{$campaign->section3}} </p>' +
                    '<p style="margin-top: 10px; font-weight: bold"> CAMPAIGN START DATE: {{$campaign->start_date}} </p>' +
                    '<p style="margin-top: 10px; font-weight: bold"> CAMPAIGN END DATE: {{$campaign->end_date}} </p>' +
                    '<p style="margin-top: 10px; font-weight: bold"> CONTACT NUMBER: {{$campaign->contact_number}} </p>'+
                    '<p style="margin-top: 10px; font-weight: bold"> CONTACT EMAIL: {{$campaign->contact_email}} </p>',
                width: 600,
                background: '#fff url("/assets/games_and_quizzes/games/image/tutorial.jpg")',
                showCloseButton: true,
                allowOutsideClick: false,
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'I am ready!',
                backdrop: 'rgba(224,196,206,0.5) url("/assets/games_and_quizzes/quizzes/sweetalert_background.gif") left',
            }
        )
    }

    function speechText(value) {
        document.getElementById("guide").style.pointerEvents = "none";
        $('#menuBubble').hide();

        newText = speech[value];
        speechBubble.innerHTML = newText;

        $('#SpeechBubble').show();
        setTimeout(function () {
            $("#SpeechBubble").hide();
            document.getElementById("guide").style.pointerEvents = "auto";
        }, 7000);
    }

    function decodeHtml(html) {
        var txt = document.createElement("textarea");
        txt.innerHTML = html;
        return txt.value;
    }


    (function () {
        var allQuestions = [{
            question: decodeHtml("{{$quiz->question1}}"),
            options: [decodeHtml("{{$random->answer_for_question4}}"), decodeHtml("{{$quiz->answer_for_question1}}"),
                decodeHtml("{{$quiz->answer_for_question5}}"), decodeHtml("{{$random->answer_for_question2}}")],
            answer: 1
        }, {
            question: decodeHtml("{{$quiz->question2}}"),
            options: [decodeHtml("{{$quiz->answer_for_question3}}"), decodeHtml("{{$random->answer_for_question1}}"),
                decodeHtml("{{$quiz->answer_for_question2}}"), decodeHtml("{{$random->answer_for_question4}}")],
            answer: 2
        }, {
            question: decodeHtml("{{$quiz->question3}}"),
            options: [decodeHtml("{{$quiz->answer_for_question3}}"), decodeHtml("{{$quiz->answer_for_question5}}"),
                decodeHtml("{{$random->answer_for_question1}}"), decodeHtml("{{$random->answer_for_question2}}")],
            answer: 0
        }, {
            question: decodeHtml("{{$quiz->question4}}"),
            options: [decodeHtml("{{$random->answer_for_question3}}"), decodeHtml("{{$random->answer_for_question5}}"),
                decodeHtml("{{$random->answer_for_question1}}"), decodeHtml("{{$quiz->answer_for_question4}}")],
            answer: 3
        }, {
            question: decodeHtml("{{$quiz->question5}}"),
            options: [decodeHtml("{{$quiz->answer_for_question5}}"), decodeHtml("{{$quiz->answer_for_question1}}"),
                decodeHtml("{{$quiz->answer_for_question3}}"), decodeHtml("{{$random->answer_for_question1}}")],
            answer: 0
        }
            @if($quiz->question6 !== null)
            , {
                question: decodeHtml("{{$quiz->question6}}"),
                options: [decodeHtml("{{$random->answer_for_question5}}"), decodeHtml("{{$quiz->answer_for_question1}}"),
                    decodeHtml("{{$random->answer_for_question2}}"), decodeHtml("{{$quiz->answer_for_question6}}")],
                answer: 3
            }
            @endif
            @if($quiz->question7 !== null)
            , {
                question: decodeHtml("{{$quiz->question7}}"),
                options: [decodeHtml("{{$quiz->answer_for_question5}}"), decodeHtml("{{$quiz->answer_for_question7}}"),
                    decodeHtml("{{$random->answer_for_question5}}"), decodeHtml("{{$quiz->answer_for_question6}}")],
                answer: 1
            }
            @endif
            @if($quiz->question8 !== null)
            , {
                question: decodeHtml("{{$quiz->question8}}"),
                options: [decodeHtml("{{$quiz->answer_for_question8}}"), decodeHtml("{{$random->answer_for_question1}}"),
                    decodeHtml("{{$random->answer_for_question2}}"), decodeHtml("{{$quiz->answer_for_question2}}")],
                answer: 0
            }
            @endif
            @if($quiz->question9 !== null)
            , {
                question: decodeHtml("{{$quiz->question9}}"),
                options: [decodeHtml("{{$quiz->answer_for_question7}}"), decodeHtml("{{$quiz->answer_for_question6}}"),
                    decodeHtml("{{$quiz->answer_for_question4}}"), decodeHtml("{{$quiz->answer_for_question9}}")],
                answer: 3
            }
            @endif
            @if($quiz->question10 !== null)
            , {
                question: decodeHtml("{{$quiz->question10}}"),
                options: [decodeHtml("{{$random->answer_for_question2}}"), decodeHtml("{{$random->answer_for_question5}}"),
                    decodeHtml("{{$quiz->answer_for_question10}}"), decodeHtml("{{$quiz->answer_for_question9}}")],
                answer: 2
            }
            @endif
        ];
        var quesCounter = 0;
        var selectOptions = [];
        var quizSpace = $('#quiz');

        nextQuestion();

        $('#next').click(function () {
            chooseOption();
            if (isNaN(selectOptions[quesCounter])) {
                alert('Please select an option !');
            } else {
                quesCounter++;
                nextQuestion();
            }
        });

        $('#prev').click(function () {
            chooseOption();
            quesCounter--;
            nextQuestion();
        });

        function createElement(index) {
            var element = $('<div>', {id: 'question'});
            var header = $('<h2 style="margin-bottom: 15px">Question No. ' + (index + 1) + ' :</h2>');
            element.append(header);

            var question = $('<p style="margin-bottom: 25px; font-size: 20px; color: black">').append(allQuestions[index].question);
            element.append(question);

            var radio = radioButtons(index);
            element.append(radio);

            return element;
        }

        function radioButtons(index) {
            var radioItems = $('<ul style="margin-bottom: 25px">');
            var item;
            var input = '';
            for (var i = 0; i < allQuestions[index].options.length; i++) {
                item = $('<li>');
                input = '<input style="margin-bottom: 15px; font-size: 16px" type="radio" id="answer" name="answer" value=' + i + ' />';
                input += " " + allQuestions[index].options[i];
                item.append(input);
                radioItems.append(item);
            }
            return radioItems;
        }

        function chooseOption() {
            selectOptions[quesCounter] = +$('input[name="answer"]:checked').val();
        }

        function nextQuestion() {
            quizSpace.fadeOut(function () {
                $('#question').remove();
                if (quesCounter < allQuestions.length) {
                    var nextQuestion = createElement(quesCounter);
                    quizSpace.append(nextQuestion).fadeIn();
                    if (!(isNaN(selectOptions[quesCounter]))) {
                        $('input[value=' + selectOptions[quesCounter] + ']').prop('checked', true);
                    }
                    if (quesCounter === 1) {
                        $('#prev').show();
                        $('#return').hide();
                    } else if (quesCounter === 0) {
                        $('#prev').hide();
                        /*$('#prev').show();*/
                        $('#next').show();
                        $('#return').hide();
                    }
                } else {
                    $('#prev').hide();
                    $('#next').hide();
                    let scoreRslt = displayResult();
                    const score = scoreRslt[0], total = scoreRslt[1];
                    Swal.fire(
                        {
                            title: 'Congratulation! You have finish the quiz successfully! Your mark is '
                                + score + '/' + total + '!',
                            text: 'Your points and medals will be updated once you return to the stations through the button below!',
                            width: 600,
                            background: '#fff url("/assets/games_and_quizzes/quizzes/sweetalert_background2.jpg")',
                            allowOutsideClick: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Return to the Games & Quizzes Station',
                            backdrop: 'rgba(224,196,206,0.5) url("/assets/games_and_quizzes/quizzes/sweetalert_background.gif") left',
                        }
                    ).then((result) => {
                        if (result.isConfirmed) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                url: "{{ route('l_participant.finishQuiz') }}",
                                method: "POST",
                                data: {
                                    score: score,
                                    quiz_id: quiz_id,
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
                                    window.location=data.url;
                                }
                            })
                        }
                    });
                }
            });
        }

        function displayResult() {
            var score = $('<p style="font-size: 30px">', {id: 'question'});
            var correct = 0;
            for (var i = 0; i < selectOptions.length; i++) {
                if (selectOptions[i] === allQuestions[i].answer) {
                    correct++;
                }
            }
            score.append('Hooray, You scored ' + correct + ' out of ' + allQuestions.length + '!');
            /*return score;*/
            return [correct, allQuestions.length];
        }
    })();
</script>

