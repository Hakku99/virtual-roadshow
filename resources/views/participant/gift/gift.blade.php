@include('layouts.my_app')
<style>
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
        color: #fff;
        border-radius: 4px;
        font-size: 13px;
        font-weight: 500;
        padding: 12px 20px;
        text-transform: uppercase;
        transition: all .3s;
        border: none;
        outline: none;
    }

    .button:hover {
        background-color: #fb9857;
    }

    h2 {
        text-transform: uppercase;
        font-weight: bold;
        color: #003300;
    }

    @media only screen and (max-width: 480px) {
        h2 {
            font-size: 18px;
            text-transform: uppercase;
            font-weight: bold;
            color: #003300;
        }
    }
</style>

<!DOCTYPE html>
<html lang="en">

<!-- Banner Starts Here -->
<div class="heading-page header-text">
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
<section class="blog-posts grid-system col-12">
    <div class="container col-12">
        @if (Auth::guest())
            <div class="alert alert-danger col-12"
                 style="text-align: justify; text-justify: inter-word;">
                <ul>
                    Dear Participant, noted that you have not logged into our system as an user, you are
                    not able to
                    redeem the gifts and plays the games unless you have logged in.<br>
                </ul>
            </div>
        @endif
        <div class="row col-12" style="margin: 0; padding: 0; width: 100%">
            <div class="col-12" id="gift_table">
                {{--table--}}

            </div>
        </div>
    </div>
</section>

<div class="bubble speech" id="menuBubble">
    <div class="row">
        <button class="close" id="close"><i class="fas fa-times" style="font-weight: bolder;"></i></button>
    </div>
    <p>Hi, welcome to Gift List! </p>
    <p style="margin-bottom: 8px">What can I help you?</p>
    <button class="guideBtn" value="0" onclick="speechText(this.value)">How can I redeem the gift?</button>
    <button class="guideBtn" value="1" onclick="speechText(this.value)">How may I check my gift redemption status?
    </button>
    <button class="guideBtn" value="2" onclick="speechText(this.value)">How will I receive the redeemed gift?
    </button>
    <button class="guideBtn" value="3" onclick="speechText(this.value)">Do I need to pay for receiving the redeemed
        gift?
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
        refresh();
        $('#gifts').addClass('active');
    });

    var guide = $('#guide');
    var close = $('#close');
    var close2 = $('#close2');
    var Speech = document.getElementById("Speech");
    var menuBubble = document.getElementById("menuBubble");
    $("#SpeechBubble").hide();
    $("#menuBubble").hide();

    var speech = [
        "To redeem the gift, you need to make sure you have enough points for that gift. Then, click on the REDEEM (orange) button" +
        " to create redemption and DONE! You will receive the gift once the redemption is approved!",
        "To check the status of your gift redemption, you may go to MY GIFTS tab under your username in the navigation bar! In there, " +
        "you may know whether the redemption is approved, delivered or cancelled~",
        "You will received the gift in either PHYSICAL or DIGITAL way depends on the gift you redeemed. If it is a physical gift, " +
        "then the gift will be delivered to the address registered with your account. If it is a virtual gift, then the gift " +
        "shall be delivered to the email address registered with your account.",
        "NO, NO, NO. We have stated that Virtual Roadshow is TOTALLY FREE website, so NO PAYMENT REQUIRED!",
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
            url: "{{ route('participant.render.giftTable') }}",
            method: "POST",
            /*data: {
                data: ''
            },*/
            dataType: "json",
            beforeSend: function () {
                $('#overlay').removeClass('d-none');
                $('#gift_table').html('<div class="overlay margin-left-1000px margin-top-1000px">\n' +
                    '                                        <i class="fas fa-5x fa-spinner fa-spin" ></i>\n' +
                    '                                    </div>');
            },
            complete: function (data) {
                $('#overlay').addClass('d-none');
            },
            success: function (data) {
                $('#gift_table').html(data.html);

                $('#gifts_table').DataTable({
                    "paging": true,
                    "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                    "searching": false,
                    /*"columnDefs": [
                        {"searchable": false, "targets": [0, 2, 6, 7, 8 ,9]}
                    ],*/
                    "ordering": false,
                    "info": true,
                    "scrollX": true,
                    "autoWidth": true,
                    "drawCallback": function (settings) {
                        $("#gift_table thead").remove();
                    }
                });
                setTimeout(
                    function () {
                        $('#gifts_table').DataTable().columns.adjust();
                    },
                    500);
            }
        });
        @else
        $.ajax({
            url: "{{ route('l_participant.render.giftTable') }}",
            method: "POST",
            /*data: {
                data: ''
            },*/
            dataType: "json",
            beforeSend: function () {
                $('#overlay').removeClass('d-none');
                $('#gift_table').html('<div class="overlay margin-left-1000px margin-top-1000px">\n' +
                    '                                        <i class="fas fa-5x fa-spinner fa-spin" ></i>\n' +
                    '                                    </div>');
            },
            complete: function (data) {
                $('#overlay').addClass('d-none');
            },
            success: function (data) {
                $('#gift_table').html(data.html);

                $('#gifts_table').DataTable({
                    "paging": true,
                    "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                    "searching": false,
                    /*"columnDefs": [
                        {"searchable": false, "targets": [0, 2, 6, 7, 8 ,9]}
                    ],*/
                    "ordering": false,
                    "info": true,
                    "scrollX": true,
                    "autoWidth": true,
                    /*"drawCallback": function (settings) {
                        $("#gift_table thead").remove();
                    }*/
                });
                setTimeout(
                    function () {
                        $('#gifts_table').DataTable().columns.adjust();
                    },
                    500);
            }
        });
        @endif
    }

    function redeem_gift(id) {
        var idd = id;
        Swal.fire({
            title: 'Do you want to redeem this gift?',
            /*text: "You will not able to revert this.",*/
            icon: 'question',
            background: '#fff url("/assets/background_image/gift_alert1.jpg") center',
            backdrop: 'rgba(224,196,206,0.5)',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Redeem'
        }).then((result) => {
            if (result.value) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('l_participant.redeem_gift') }}",
                    method: "POST",
                    data: {
                        id: id
                    },
                    dataType: "json",
                    sendBefore: function (data) {
                        console.log('before, ' + id);

                    },
                    complete: function (data) {
                        console.log('complete, ' + id);

                    },
                    success: function (data) {
                        console.log('success');
                        switch (data.success) {
                            case 1:
                                Swal.fire({
                                    type: 'success',
                                    icon: 'success',
                                    background: '#fff url("/assets/background_image/gift_alert1.jpg") center',
                                    backdrop: 'rgba(224,196,206,0.5)',
                                    title: 'Congrats, you have successfully create a redemption for the gift!',
                                    text: 'You may check your gift redemption status in "My Gifts" section!',
                                    showConfirmButton: true,
                                    showCloseButton: true,
                                });
                                refresh();
                                break;
                            case 2:
                                Swal.fire({
                                    type: 'error',
                                    icon: 'error',
                                    background: '#fff url("/assets/background_image/gift_alert1.jpg") center',
                                    backdrop: 'rgba(224,196,206,0.5)',
                                    title: 'Unfortunately, the gift was unavailable in current moment.',
                                    text: 'Maybe you will be interested in other gifts?',
                                    showConfirmButton: true,
                                    showCloseButton: true,
                                });
                                refresh();
                                break;
                            case 3:
                                Swal.fire({
                                    type: 'error',
                                    icon: 'error',
                                    background: '#fff url("/assets/background_image/gift_alert1.jpg") center',
                                    backdrop: 'rgba(224,196,206,0.5)',
                                    title: 'Unfortunately, the gift has been out of stock in just one moment.',
                                    text: 'Maybe you will be interested in other gifts?',
                                    showConfirmButton: true,
                                    showCloseButton: true,
                                });
                                refresh();
                                break;
                        }

                    }
                })
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                //press cancel will happen something
            }
        });
    }
</script>
