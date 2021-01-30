@include('layouts.my_app')
<link href="{{ asset('/assets/website_template/css/bootstrap_multitabs.css') }}" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
    table {
        border-collapse: collapse;
    }

    table td, table th {
        border: 1px solid #ddd;
        padding: 8px;
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
                        <h2>My Gifts</h2>
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
        <div class="row col-12">
            <div class="col-12">
                <div class="all-blog-posts">
                    <div class="row">
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

                        <ul class="nav nav-tabs md-tabs col-12" id="myTabMD" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#waiting_approval"
                                   role="tab"
                                   aria-selected="true">Redemption waiting for approval</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#approved_redemption"
                                   role="tab"
                                   aria-selected="false">Approved Redemption</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#delivered_redemption" role="tab"
                                   aria-selected="false">Delivered</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#cancelled_redemption" role="tab"
                                   aria-selected="false">Cancelled</a>
                            </li>
                        </ul>

                        <div class="tab-content col-12">
                            <div id="waiting_approval" class="tab-pane active row">
                                <div class="sidebar-item submit-comment">
                                    <div class="col-12" id="my_gift_table" style="overflow-x: auto">
                                        <!--table-->
                                    </div>
                                </div>
                            </div>
                            <div id="approved_redemption" class="tab-pane row">
                                <div class="sidebar-item submit-comment">
                                    <div class="col-12" id="approved_gift_table" style="overflow-x: auto">
                                        <!--table-->
                                    </div>
                                </div>
                            </div>
                            <div id="delivered_redemption" class="tab-pane row">
                                <div class="sidebar-item submit-comment">
                                    <div class="col-12" id="delivered_gift_table" style="overflow-x: auto">
                                        <!--table-->
                                    </div>
                                </div>
                            </div>
                            <div id="cancelled_redemption" class="tab-pane row">
                                <div class="sidebar-item submit-comment">
                                    <div class="col-12" id="cancelled_gift_table" style="overflow-x: auto">
                                        <!--table-->
                                    </div>
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
    <p>Hi, welcome to My Gift! </p>
    <p style="margin-bottom: 8px">What can I help you?</p>
    <button class="guideBtn" value="0" onclick="speechText(this.value)">Can I cancel my gift redemption?</button>
    <button class="guideBtn" value="1" onclick="speechText(this.value)">Why my gift redemption was cancelled/disapproved?
    </button>
    <button class="guideBtn" value="2" onclick="speechText(this.value)">When will I received my gift?
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
        refresh();
        $('#my_gift').addClass('active');
    });

    var guide = $('#guide');
    var close = $('#close');
    var close2 = $('#close2');
    var Speech = document.getElementById("Speech");
    var menuBubble = document.getElementById("menuBubble");
    $("#SpeechBubble").hide();
    $("#menuBubble").hide();

    var speech = [
        "Yes, you can cancel your gift redemption but only before the redemption BEING APPROVED.",
        "There are many possibilities that might cause your redemption for being cancelled/disapproved, but every cancellation or disapproval will " +
        "come with valid reason from the admin, so do check on the reason provided by admin.",
        "For Virtual gift, you will received in one or two days after the redemption being approved. For Physical gift, it will depends on" +
        " the courier service! Related tracking ID will be sent to you through E-mail so that you can track on the gift!",
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

        $.ajax({
            url: "{{ route('l_participant.render.my_giftTable') }}",
            method: "POST",
            /*data: {
                data: ''
            },*/
            dataType: "json",
            beforeSend: function () {
                $('#overlay').removeClass('d-none');
                $('#my_gift_table').html('<div class="overlay margin-left-1000px margin-top-1000px">\n' +
                    '                                        <i class="fas fa-5x fa-spinner fa-spin" ></i>\n' +
                    '                                    </div>');
            },
            complete: function (data) {
                $('#overlay').addClass('d-none');
            },
            success: function (data) {
                $('#my_gift_table').html(data.html);

                $('#my_gifts_table').DataTable({
                    "paging": true,
                    //"lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                    "lengthMenu": [[5, 10, 50, 100, -1], [5, 10, 50, 100, "All"]],
                    /*"searching": true,*/
                    /*"columnDefs": [
                        {"searchable": false, "targets": [0, 2, 6, 7, 8 ,9]}
                    ],*/
                    "ordering": false,
                    "info": true,
                    "scrollX": true,
                    "autoWidth": true,
                    "drawCallback": function( settings ) {
                        $("#my_gift_table thead").remove();
                    }
                });
                setTimeout(
                    function () {
                        $('#my_gifts_table').DataTable().columns.adjust();
                    },
                    500);
            }
        });

        $.ajax({
            url: "{{ route('l_participant.render.approved_GiftsTable') }}",
            method: "POST",
            /*data: {
                data: ''
            },*/
            dataType: "json",
            beforeSend: function () {
                $('#overlay').removeClass('d-none');
                $('#approved_gift_table').html('<div class="overlay margin-left-1000px margin-top-1000px">\n' +
                    '                                        <i class="fas fa-5x fa-spinner fa-spin" ></i>\n' +
                    '                                    </div>');
            },
            complete: function (data) {
                $('#overlay').addClass('d-none');
            },
            success: function (data) {
                $('#approved_gift_table').html(data.html);

                $('#approved_gifts_table').DataTable({
                    "paging": true,
                    "lengthMenu": [[5, 10, 50, 100, -1], [5, 10, 50, 100, "All"]],
                    /*"searching": true,*/
                    /*"columnDefs": [
                        {"searchable": false, "targets": [0, 2, 6, 7, 8 ,9]}
                    ],*/
                    "ordering": false,
                    "info": true,
                    "scrollX": true,
                    "autoWidth": true,
                    "drawCallback": function( settings ) {
                        $("#approved_gift_table thead").remove();
                    }
                });
                setTimeout(
                    function () {
                        $('#approved_gifts_table').DataTable().columns.adjust();
                    },
                    500);
            }
        });

        $.ajax({
            url: "{{ route('l_participant.render.delivered_GiftsTable') }}",
            method: "POST",
            /*data: {
                data: ''
            },*/
            dataType: "json",
            beforeSend: function () {
                $('#overlay').removeClass('d-none');
                $('#delivered_gift_table').html('<div class="overlay margin-left-1000px margin-top-1000px">\n' +
                    '                                        <i class="fas fa-5x fa-spinner fa-spin" ></i>\n' +
                    '                                    </div>');
            },
            complete: function (data) {
                $('#overlay').addClass('d-none');
            },
            success: function (data) {
                $('#delivered_gift_table').html(data.html);

                $('#delivered_gifts_table').DataTable({
                    "paging": true,
                    //"lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                    "lengthMenu": [[5, 10, 50, 100, -1], [5, 10, 50, 100, "All"]],
                    /*"searching": true,*/
                    /*"columnDefs": [
                        {"searchable": false, "targets": [0, 2, 6, 7, 8 ,9]}
                    ],*/
                    "ordering": false,
                    "info": true,
                    "scrollX": true,
                    "autoWidth": true,
                    "drawCallback": function( settings ) {
                        $("#delivered_gift_table thead").remove();
                    }
                });
                setTimeout(
                    function () {
                        $('#delivered_gifts_table').DataTable().columns.adjust();
                    },
                    500);
            }
        });

        $.ajax({
            url: "{{ route('l_participant.render.cancelled_GiftsTable') }}",
            method: "POST",
            /*data: {
                data: ''
            },*/
            dataType: "json",
            beforeSend: function () {
                $('#overlay').removeClass('d-none');
                $('#cancelled_gift_table').html('<div class="overlay margin-left-1000px margin-top-1000px">\n' +
                    '                                        <i class="fas fa-5x fa-spinner fa-spin" ></i>\n' +
                    '                                    </div>');
            },
            complete: function (data) {
                $('#overlay').addClass('d-none');
            },
            success: function (data) {
                $('#cancelled_gift_table').html(data.html);

                $('#cancelled_gifts_table').DataTable({
                    "paging": true,
                    //"lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                    "lengthMenu": [[5, 10, 50, 100, -1], [5, 10, 50, 100, "All"]],
                    /*"searching": true,*/
                    /*"columnDefs": [
                        {"searchable": false, "targets": [0, 2, 6, 7, 8 ,9]}
                    ],*/
                    "ordering": false,
                    "info": true,
                    "scrollX": true,
                    "autoWidth": true,
                    "drawCallback": function( settings ) {
                        $("#cancelled_gift_table thead").remove();
                    }
                });
                setTimeout(
                    function () {
                        $('#cancelled_gifts_table').DataTable().columns.adjust();
                    },
                    500);
            }
        });
    }

    function cancel_redemption(id) {
        Swal.fire({
            title: 'Are you sure to cancel this redemption?',
            /*text: "You will not able to revert this.",*/
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: "No",
            background: '#fff url("/assets/background_image/gift_alert1.jpg") center',
            backdrop: 'rgba(224,196,206,0.5)',
        }).then((result) => {
            if (result.value) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('l_participant.cancelRedemption') }}",
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
                                    title: 'Redemption has been cancelled successfully',
                                    text: 'The points have been refunded to your account.',
                                    showConfirmButton: true,
                                    /*timer: 1500*/
                                });
                                refresh();
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

    function receive_gift(id) {
        Swal.fire({
            title: 'Are you sure to mark this redemption as "Delivered"?',
            text: "You will not able to revert this.",
            background: '#fff url("/assets/background_image/gift_alert1.jpg") center',
            backdrop: 'rgba(224,196,206,0.5)',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: "No",
        }).then((result) => {
            if (result.value) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('l_participant.gift_received') }}",
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
                                    title: 'Redemption has been mark as "Delivered" successfully!',
                                    text: 'Hope you enjoy with the gift XD',
                                    showConfirmButton: true,
                                    /*timer: 1500*/
                                });
                                refresh();
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
