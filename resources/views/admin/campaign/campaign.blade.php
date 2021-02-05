@include('template.admin')
<link href="{{ asset('/assets/website_template/css/bootstrap_multitabs.css') }}" rel="stylesheet">

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

<!-- Banner Starts Here -->
<div class="heading-page header-text">
    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-content">
                        <h4>Welcome, Dear {{$name}}</h4>
                        <h2>You are now managing the campaign</h2>
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
        <div class="all-blog-posts">
            <div class="col-lg-12" {{--style="margin-bottom: 50px"--}}>
                <div class="sidebar-item submit-comment">
                    <div class="row" style="width: 93%;">
                        <div class="col-md-12" style="margin-bottom: 5%">
                            <a href="{{url('/admin/addCampaign')}}" class="float-right">
                                <button type="button" class="btn btn-success btn-md"><i
                                        {{--class="fas fa-plus"--}}></i> Add Campaign
                                </button>
                            </a>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <ul class="nav nav-tabs md-tabs col-12" id="myTabMD" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#ongoing_campaign"
                                   role="tab" aria-selected="true">Ongoing Campaign</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#ended_campaign"
                                   role="tab" aria-selected="false">Ended Campaign</a>
                            </li>
                        </ul>
                        <div class="tab-content col-12">
                            <div id="ongoing_campaign" class="tab-pane active row">
                                <div class="sidebar-item submit-comment">
                                    <div class="container col-md-11" id="campaign_table" style="overflow-x: auto">
                                        <!--table-->
                                    </div>
                                </div>
                            </div>
                            <div id="ended_campaign" class="tab-pane row">
                                <div class="sidebar-item submit-comment">
                                    <div class="container col-md-11" id="endedCampaign_table"
                                         style="overflow-x: auto">
                                        <!--table-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--<div class="container col-md-10" --}}{{--style="overflow-x:auto;"--}}{{-- id="campaign_table">
                        <!-- /.table -->

                    </div>--}}
                </div>
            </div>
        </div>
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
        $('#campaign').addClass('active');
    });

    function refresh() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('admin.render.campaignTable') }}",
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
                    "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                    "searching": true,
                    "columnDefs": [
                        {"searchable": false, "targets": [0, 2, 6, 7, 8, 9]}
                    ],
                    "ordering": true,
                    "info": true,
                    "scrollX": true,
                    "autoWidth": true,
                });
                $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                    $($.fn.dataTable.tables(true)).DataTable()
                        .columns.adjust();
                });
            }
        });

        $.ajax({
            url: "{{ route('admin.render.endedCampaignTable') }}",
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
                $('#endedCampaign_table').html(data.html);

                $('#endedCampaigns_table').DataTable({
                    "paging": true,
                    "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                    "searching": true,
                    "columnDefs": [
                        {"searchable": false, "targets": [0, 2, 6, 7, 8, 9]}
                    ],
                    "ordering": true,
                    "info": true,
                    "scrollX": true,
                    "autoWidth": true,
                });
                $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                    $($.fn.dataTable.tables(true)).DataTable()
                        .columns.adjust();
                });
            }
        });
    }

    function delete_quiz(id) {
        Swal.fire({
            title: 'Are you sure to delete this quiz?',
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
                    url: "{{ route('admin.deleteQuiz') }}",
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
                                    title: 'Quiz has been deleted',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                /*setTimeout(function () {// wait for 5 secs(2)
                                    location.reload(); // then reload the page.(3)
                                }, 1600);*/
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

    function delete_campaign(id) {
        Swal.fire({
            title: 'Are you sure to delete this campaign? Note that deleting campaign will delete the related quiz together.',
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
                    url: "{{ route('admin.deleteCampaign') }}",
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
                                    title: 'Campaign has been deleted',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                /*setTimeout(function () {// wait for 5 secs(2)
                                    location.reload(); // then reload the page.(3)
                                }, 1600);*/
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

    function inactivate_quiz(id) {
        Swal.fire({
            title: 'Are you sure to deactivate this quiz?',
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
                    url: "{{ route('admin.inactivateQuiz') }}",
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
                                    title: 'Quiz has been deactivated',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                /*setTimeout(function () {// wait for 5 secs(2)
                                    location.reload(); // then reload the page.(3)
                                }, 1600);*/
                                refresh();
                                break;

                            case 2:
                                Swal.fire({
                                    type: 'error',
                                    icon: 'error',
                                    title: 'You are unable to activate/deactivate quiz when the campaign is deactivated!',
                                    showConfirmButton: false,
                                    timer: 2500
                                });
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

    function activate_quiz(id) {
        Swal.fire({
            title: 'Are you sure to activate this quiz?',
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
                    url: "{{ route('admin.activateQuiz') }}",
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
                                    title: 'Quiz has been activated',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                /*setTimeout(function () {// wait for 5 secs(2)
                                    location.reload(); // then reload the page.(3)
                                }, 1600);*/
                                refresh();
                                break;

                            case 2:
                                Swal.fire({
                                    type: 'error',
                                    icon: 'error',
                                    title: 'You are unable to activate/deactivate quiz when the campaign is deactivated!',
                                    showConfirmButton: false,
                                    timer: 2500
                                });
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

    function activate_campaign(id) {
        Swal.fire({
            title: 'Are you sure to activate this campaign?',
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
                    url: "{{ route('admin.activateCampaign') }}",
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
                                    title: 'Campaign has been activated',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                /*setTimeout(function () {// wait for 5 secs(2)
                                    location.reload(); // then reload the page.(3)
                                }, 1600);*/
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

    function inactivate_campaign(id) {
        Swal.fire({
            title: 'Are you sure to deactivate this campaign?',
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
                    url: "{{ route('admin.inactivateCampaign') }}",
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
                                    title: 'Campaign has been deactivated',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                /*setTimeout(function () {// wait for 5 secs(2)
                                    location.reload(); // then reload the page.(3)
                                }, 1600);*/
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

