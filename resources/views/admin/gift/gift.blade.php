@include('template.admin')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<style>
    table {
        border-collapse: collapse;
    }

    table td, table th {
        border: 1px solid #ddd;
        padding: 8px;
    }
</style>

{{--<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href=""><h2>Virtual Roadshow<em>.</em></h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">LOG OUT</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>--}}

<!-- Banner Starts Here -->
<div class="heading-page header-text">
    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-content">
                        <h4>Welcome, Dear {{$name}}</h4>
                        <h2>You are now managing the gift</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Banner Ends Here -->

<body class="antialiased">
<div
    class="relative {{--flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0--}}">
    {{--<audio id="my_audio" src="resources/elements/bgm.mp3" loop="loop"></audio>--}}
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        {{--<h1 style="text-align:center; margin-top: 110px;margin-bottom: 70px; /*color: white*/">Welcome, Dear Admin.</h1>
        <p style="text-align:center; margin-bottom: 70px; --}}{{--color: white--}}{{--">What can I help you?</p>--}}
        {{--<div class="box">--}}
        <section class="blog-posts grid-system">
            <div class="all-blog-posts">
                <div class="col-lg-12" {{--style="margin-bottom: 50px"--}}>
                    <div class="sidebar-item submit-comment">
                        <div class="row" style="width: 93%;">
                            <div class="col-md-12" style="margin-bottom: 5%">
                                <a href="{{url('/admin/addGift')}}" class="float-right">
                                    <button type="button" class="btn btn-success btn-md"><i
                                            {{--class="fas fa-plus"--}}></i> Add Gift
                                    </button>
                                </a>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        {{--<h2>List of campaigns</h2>--}}
                        <div class="container col-md-10" {{--style="overflow-x:auto;"--}} id="gift_table">
                            <!-- /.table -->

                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{--</div>--}}
        {{--<button class="button button2">?</button>--}}
    </div>
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

@if(session('success'))
    <script>
        Swal.fire({
            /*position: 'top-end',*/
            type: 'success',
            icon: "success",
            title: '{{ session("success") }}',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
@endif

<script>
    $(function () {
        refresh();
        $('#gift').addClass('active');
    });

    function refresh() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('admin.render.giftTable') }}",
            method: "POST",
            /*data: {
                data: '<?php //echo json_encode($measurements); ?>'
                },*/
            dataType: "json",
            beforeSend: function () {
                $('#overlay').removeClass('d-none');
                $('#gift_table').html('<div class="overlay margin-bottom-100px margin-top-100px">\n' +
                    '                                        <i class="fas fa-5x fa-spinner fa-spin"></i>\n' +
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
                    "searching": true,
                    "columnDefs": [
                        {"searchable": false, "targets": [0, 2, 6, 7, 8 ,9]}
                    ],
                    "ordering": true,
                    "info": true,
                    "scrollX": true,
                    "autoWidth": true,
                });
                setTimeout(
                    function () {
                        $('#gifts_table').DataTable().columns.adjust();
                    },
                    500);
            }
        });
    }

    function inactivate_gift(id) {
        Swal.fire({
            title: 'Are you sure to deactivate this gift?',
            /*text: "You will not able to revert this.",*/
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Deactivate'
        }).then((result) => {
            if (result.value) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('admin.inactivateGift') }}",
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
                                    title: 'Gift has been deactivated',
                                    showConfirmButton: false,
                                    timer: 1500
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

    function activate_gift(id) {
        Swal.fire({
            title: 'Are you sure to activate this gift?',
            /*text: "You will not able to revert this.",*/
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Activate'
        }).then((result) => {
            if (result.value) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('admin.activateGift') }}",
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
                                    title: 'Gift has been activated',
                                    showConfirmButton: false,
                                    timer: 1500
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

    function delete_gift(id) {
        Swal.fire({
            title: 'Are you sure to delete this gift?',
            text: "You will not able to revert this.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete'
        }).then((result) => {
            if (result.value) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('admin.deleteGift') }}",
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
                                    title: 'Gift has been deleted',
                                    showConfirmButton: false,
                                    timer: 1500
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

