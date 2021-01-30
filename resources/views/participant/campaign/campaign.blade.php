@include('layouts.my_app')
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {{--<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    --}}{{--For sending AJAX in Laravel 5.8--}}{{--
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

    --}}{{--Sweet Alert--}}{{--
    <script type="text/javascript" src="{{ URL::asset('/assets/sweet_alert/sweetalert2.all.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/assets/sweet_alert/sweetalert2.min.js') }}"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

    --}}{{--Bootstrap datatable--}}{{--
    --}}{{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>--}}{{--
    --}}{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}{{--

<!-- Datatables CSS CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Datatables JS CDN -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>--}}

    <style>
        .box {
            background-color: #F7F7F7;
            /*width: 60%;*/
            width: 100%;
            margin-left: auto;
            margin-right: auto;
            margin-top: -40px;
        }

        .column {
            float: left;
            text-align: center;
            justify-content: center;
            width: 50%;
            padding: 10px;
            /*height: 100px;*/ /* Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .main-button {
            border-radius: 12px;
        }

        .card {
            width: 80%;
        }

        table {
            border-collapse: collapse;
        }

        table td, table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .button {
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
</head>

<!-- Banner Starts Here -->
<div class="heading-page header-text">
    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-content">
                        <h2>All Campaigns</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Banner Ends Here -->
<body class="antialiased">
<section class="blog-posts grid-system">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="all-blog-posts">
                    <div class="row">
                        <div class="col-lg-12" id="campaign_table" style="overflow-x: auto">
                            {{--table--}}

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sidebar-item recent-posts">
                                <div class="sidebar-heading">
                                    <h2>Latest campaigns</h2>
                                </div>
                                <div class="content">
                                    <ul>
                                        @foreach($latest_5 as $latest)
                                            <li>
                                                @if (Illuminate\Support\Facades\Auth::guest())
                                                    <a href="{{url('/participant/viewCampaign', $latest->id)}}">
                                                        <h5 style="font-weight: normal">{{ $latest->name }}</h5>
                                                        <span>Joined on {{ $latest->created_at }}</span>
                                                    </a>
                                                @else
                                                    <a href="{{url('/l_participant/viewCampaign', $latest->id)}}">
                                                        <h5 style="font-weight: normal">{{ $latest->name }}</h5>
                                                        <span>Joined on {{ $latest->created_at }}</span>
                                                    </a>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sidebar" style="margin-top: 70px">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sidebar-item recent-posts">
                                <div class="sidebar-heading">
                                    <h2>Campaigns ending in 1 Week</h2>
                                </div>
                                <div class="content">
                                    <ul>
                                        @foreach($campaings_left_1_week as $left_1_week)
                                            <li>
                                                @if (Illuminate\Support\Facades\Auth::guest())
                                                    <a href="{{url('/participant/viewCampaign', $left_1_week->id)}}">
                                                        <h5 style="font-weight: normal">{{ $left_1_week->name }}</h5>
                                                        <span>End in {{ $left_1_week->end_date }}</span>
                                                    </a>
                                                @else
                                                    <a href="{{url('/l_participant/viewCampaign', $left_1_week->id)}}">
                                                        <h5 style="font-weight: normal">{{ $left_1_week->name }}</h5>
                                                        <span>End in {{ $left_1_week->end_date }}</span>
                                                    </a>
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
    <p>Here are the list for all campaigns/events currently active in Virtual Roadshow!</p>
    <p style="margin-bottom: 8px">What can I help you?</p>
    <button class="guideBtn" value="0" onclick="speechText(this.value)">There are total how many campaigns/events in Virtual Roadshow currently?</button>
    <button class="guideBtn" value="1" onclick="speechText(this.value)">Does viewing campaigns require me to do anythings?
    </button>
    <button class="guideBtn" value="2" onclick="speechText(this.value)">Can I return to or go to other pages when I am viewing certain campaign?
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

{{--<script type="text/javascript" src="{{ URL::asset('/assets/website_template/js/custom.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/assets/website_template/js/owl.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/assets/website_template/js/slick.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/assets/website_template/js/isotope.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/assets/website_template/js/accordions.js') }}"></script>--}}

{{--To send AJAX--}}
{{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>--}}
{{--
<script type="text/javascript" src="{{ URL::asset('/assets/website_template/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/assets/website_template/js/bootstrap.bundle.min.js') }}"></script>--}}

<script>
    $(function () {
        refresh();
        $('#campaigns').addClass('active');
    });

    var guide = $('#guide');
    var close = $('#close');
    var close2 = $('#close2');
    var Speech = document.getElementById("Speech");
    var menuBubble = document.getElementById("menuBubble");
    $("#SpeechBubble").hide();
    $("#menuBubble").hide();

    var speech = [
        "Well, currently we have {{$campaigns->count()}} campaigns in Virtual Roadshow! Feel free to have a look on them, " +
        "maybe you will found something you interested in~",
        "No, you are not required to do anything, but you can choose whether you want to try on the games and quizzes " +
        "or not and have a look on the gifts!",
        "Of course, you are free to move around in this website! Moving to another page while viewing campaigns does not " +
        "affect anything. But it does if you move to another pages when you are playing games or answering quizzes! " +
        "Leaving current page when playing games or answering quizzes means all your achievement in games and quizzes will" +
        " be LOST!",
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

    function refresh() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        @if (Auth::guest())
        $.ajax({

            url: "{{ route('participant.render.campaignTable') }}",
            method: "POST",
            /*data: {
                data: '<?php //echo json_encode($measurements); ?>'
                },*/
            dataType: "json",
            beforeSend: function () {
                $('#overlay').removeClass('d-none');
                $('#campaign_table').html('<div class="overlay margin-bottom-100px margin-top-100px">\n' +
                    '                                        <i class="fas fa-5x fa-spinner fa-spin"></i>\n' +
                    '                                    </div>');
            },
            complete: function (data) {
                $('#overlay').addClass('d-none');
            },
            success: function (data) {
                $('#campaign_table').html(data.html);

                $('#campaigns_table').DataTable({
                    "paging": true,
                    "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
                    "searching": false,
                    /*"columnDefs": [
                        {"searchable": false, "targets": [0, 2, 6, 7, 8 ,9]}
                    ],*/
                    "ordering": false,
                    "info": true,
                    "scrollX": true,
                    "autoWidth": true,
                    "drawCallback": function( settings ) {
                        $("#campaign_table thead").remove();
                    }
                });
                setTimeout(
                    function () {
                        $('#campaigns_table').DataTable().columns.adjust();
                    },
                    500);
            }
        });
        @else
        $.ajax({

            url: "{{ route('l_participant.render.campaignTable') }}",
            method: "POST",
            /*data: {
                data: '<?php //echo json_encode($measurements); ?>'
                },*/
            dataType: "json",
            beforeSend: function () {
                $('#overlay').removeClass('d-none');
                $('#campaign_table').html('<div class="overlay margin-bottom-100px margin-top-100px">\n' +
                    '                                        <i class="fas fa-5x fa-spinner fa-spin"></i>\n' +
                    '                                    </div>');
            },
            complete: function (data) {
                $('#overlay').addClass('d-none');
            },
            success: function (data) {
                $('#campaign_table').html(data.html);

                $('#campaigns_table').DataTable({
                    "paging": true,
                    "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
                    "searching": false,
                    /*"columnDefs": [
                        {"searchable": false, "targets": [0, 2, 6, 7, 8 ,9]}
                    ],*/
                    "ordering": false,
                    "info": true,
                    "scrollX": true,
                    "autoWidth": true,
                    "drawCallback": function( settings ) {
                        $("#campaign_table thead").remove();
                    }
                });
                setTimeout(
                    function () {
                        $('#campaigns_table').DataTable().columns.adjust();
                    },
                    500);
            }
        });
        @endif
    }
</script>

