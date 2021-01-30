@include('template.admin')
<link href="{{ asset('/assets/website_template/css/bootstrap_multitabs.css') }}" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
                        <h2>You are now managing the gift redemption</h2>
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
                        <ul class="nav nav-tabs md-tabs col-12" id="myTabMD" role="tablist" >
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#waiting_approval"
                                   role="tab" aria-selected="true">Redemption waiting for approval</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#approved_redemption"
                                   role="tab" aria-selected="false">Approved Redemption</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#shipped_out_redemption"
                                   role="tab" aria-selected="false">Shipped Out Redemption</a>
                            </li>
                        </ul>
                        <div class="tab-content col-12">
                            <div id="waiting_approval" class="tab-pane active row">
                                <div class="sidebar-item submit-comment">
                                    <div class="container col-md-11" id="giftRedemption_table" style="overflow-x: auto">
                                        <!--table-->
                                    </div>
                                </div>
                            </div>
                            <div id="approved_redemption" class="tab-pane row">
                                <div class="sidebar-item submit-comment">
                                    <div class="container col-md-11" id="approvedRedemption_table"
                                         style="overflow-x: auto">
                                        <!--table-->
                                    </div>
                                </div>
                            </div>
                            <div id="shipped_out_redemption" class="tab-pane row">
                                <div class="sidebar-item submit-comment">
                                    <div class="container col-md-11" id="shipped_outRedemption_table"
                                         style="overflow-x: auto">
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
        $('#gift_redemption').addClass('active');
    });

    function refresh() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('admin.render.giftRedemptionTable') }}",
            method: "POST",
            /*data: {
                data: '<?php //echo json_encode($measurements); ?>'
                },*/
            dataType: "json",
            beforeSend: function () {
                $('#overlay').removeClass('d-none');
                $('#giftRedemption_table').html('<div class="overlay margin-bottom-100px margin-top-100px">\n' +
                    '                                        <i class="fas fa-5x fa-spinner fa-spin"></i>\n' +
                    '                                    </div>');
            },
            complete: function (data) {
                $('#overlay').addClass('d-none');
            },
            success: function (data) {
                $('#giftRedemption_table').html(data.html);

                $('#gift_Redemption_table').DataTable({
                    "paging": true,
                    "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                    "searching": true,
                    "columnDefs": [
                        {"searchable": false, "targets": [0, 2]}
                    ],
                    "ordering": true,
                    "info": true,
                    "scrollX": true,
                    "autoWidth": true,
                });
                setTimeout(
                    function () {
                        $('#gift_Redemption_table').DataTable().columns.adjust();
                    },
                    500);
            }
        });

        $.ajax({
            url: "{{ route('admin.render.approvedRedemptionTable') }}",
            method: "POST",
            /*data: {
                data: '<?php //echo json_encode($measurements); ?>'
                },*/
            dataType: "json",
            beforeSend: function () {
                $('#overlay').removeClass('d-none');
                $('#approvedRedemption_table').html('<div class="overlay margin-bottom-100px margin-top-100px">\n' +
                    '                                        <i class="fas fa-5x fa-spinner fa-spin"></i>\n' +
                    '                                    </div>');
            },
            complete: function (data) {
                $('#overlay').addClass('d-none');
            },
            success: function (data) {
                $('#approvedRedemption_table').html(data.html);

                $('#approved_Redemption_table').DataTable({
                    "paging": true,
                    "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                    "searching": true,
                    "columnDefs": [
                        {"searchable": false, "targets": [0, 2]}
                    ],
                    "ordering": true,
                    "info": true,
                    "scrollX": true,
                    "autoWidth": true,
                });
                setTimeout(
                    function () {
                        $('#approved_Redemption_table').DataTable().columns.adjust();
                    },
                    500);
                $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                    $($.fn.dataTable.tables(true)).DataTable()
                        .columns.adjust();
                });
            }
        });

        $.ajax({
            url: "{{ route('admin.render.shippedOut_RedemptionTable') }}",
            method: "POST",
            /*data: {
                data: '<?php //echo json_encode($measurements); ?>'
                },*/
            dataType: "json",
            beforeSend: function () {
                $('#overlay').removeClass('d-none');
                $('#shipped_outRedemption_table').html('<div class="overlay margin-bottom-100px margin-top-100px">\n' +
                    '                                        <i class="fas fa-5x fa-spinner fa-spin"></i>\n' +
                    '                                    </div>');
            },
            complete: function (data) {
                $('#overlay').addClass('d-none');
            },
            success: function (data) {
                $('#shipped_outRedemption_table').html(data.html);

                $('#shipped_out_Redemption_table').DataTable({
                    "paging": true,
                    "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                    "searching": true,
                    "columnDefs": [
                        {"searchable": false, "targets": [0, 2]}
                    ],
                    "ordering": true,
                    "info": true,
                    "scrollX": true,
                    "autoWidth": true,
                });
                setTimeout(
                    function () {
                        $('#shipped_out_Redemption_table').DataTable().columns.adjust();
                    },
                    500);
                $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                    $($.fn.dataTable.tables(true)).DataTable()
                        .columns.adjust();
                });
            }
        });
    }

    function cancel_redemption(id) {
        Swal.fire({
            title: 'Are you sure to cancel this redemption?',
            /*text: "You will not able to revert this.",*/
            text: "You will need to provide reason for the participant.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: "No",
        }).then((result) => {
            if (result.value) {
                Swal.fire({
                    input: 'text',
                    title: 'Please provide a reason for the participant.',
                    inputPlaceholder: 'Your reason',
                    confirmButtonText: 'Submit',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    cancelButtonText: "No",
                    inputValidator: function(value) {
                        if(value === '') {
                            return !value && 'Please provide a valid reason!'}
                    }
                }).then((result) => {
                    if (result.value) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: "{{ route('admin.cancel_disapproveRedemption') }}",
                            method: "POST",
                            data: {
                                id: id,
                                reason: result.value,
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
                                            title: 'Redemption has been cancelled',
                                            showConfirmButton: true,
                                            showCloseButton: true,
                                        });
                                        refresh();
                                }

                            }
                        })
                    }
                })
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                //press cancel will happen something
            }
        });
    }

    function disapprove(id) {
        Swal.fire({
            title: 'Are you sure to disapprove this redemption?',
            /*text: "You will not able to revert this.",*/
            text: "You will need to provide reason for the participant.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Disapprove'
        }).then((result) => {
            if (result.value) {
                Swal.fire({
                    input: 'text',
                    title: 'Please provide a reason for the participant.',
                    inputPlaceholder: 'Your reason',
                    confirmButtonText: 'Submit',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    cancelButtonText: "No",
                    inputValidator: function(value) {
                        if(value === '') {
                            return !value && 'Please provide a valid reason!'}
                    }
                }).then((result) => {
                    if (result.value) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: "{{ route('admin.cancel_disapproveRedemption') }}",
                            method: "POST",
                            data: {
                                id: id,
                                reason: result.value,
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
                                            title: 'Redemption has been disapproved',
                                            showConfirmButton: true,
                                            showCloseButton: true,
                                        });
                                        refresh();
                                }

                            }
                        })
                    }
                })
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                //press cancel will happen something
            }
        });
    }

    function approve(id) {
        Swal.fire({
            title: 'Are you sure to approve this redemption?',
            text: "You will not able to revert this.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Approve'
        }).then((result) => {
            if (result.value) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('admin.approveRedemption') }}",
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
                                    title: 'Redemption has been approved',
                                    showConfirmButton: true,
                                    showCloseButton: true,
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

    function ship_out(id) {
        Swal.fire({
            title: 'Are you sure to mark this redemption as "Shipped out"?',
            text: "Status of redemption will be updated on the participant side too.",
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
                    url: "{{ route('admin.markRedemption_as_ShippedOut') }}",
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
                                    title: 'Redemption has been marked as "Shipped Out" successfully!',
                                    showConfirmButton: true,
                                    showCloseButton: true,
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

    function shipment_failure(id) {
        Swal.fire({
            title: 'Are you sure to mark this redemption as "Shipment failure"?',
            text: "You will need to provide reason for the participant.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: "No",
            function(inputValue){
                if (inputValue === false) return false;

                if (inputValue === "") {
                    swal.showInputError("You need to write something!");
                    return false
                }

                swal("Nice!", "You wrote: " + inputValue, "success");
            }
        }).then((result) => {
            if (result.value) {
                Swal.fire({
                    input: 'text',
                    title: 'Please provide a reason for the participant.',
                    inputPlaceholder: 'Your reason',
                    confirmButtonText: 'Submit',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    cancelButtonText: "No",
                    inputValidator: function(value) {
                        if(value === '') {
                            return !value && 'Please provide a valid reason!'}
                    }
                }).then((result) => {
                    if (result.value) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: "{{ route('admin.mark_redemption_as_Shipment_failure') }}",
                            method: "POST",
                            data: {
                                id: id,
                                reason: result.value,
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
                                            title: 'Redemption has been mark as cancelled and reason has been provided.',
                                            showConfirmButton: true,
                                            showCloseButton: true,
                                        });
                                        refresh();
                                }

                            }
                        })
                    }
                });
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                //press cancel will happen something
            }
        });
    }
</script>

