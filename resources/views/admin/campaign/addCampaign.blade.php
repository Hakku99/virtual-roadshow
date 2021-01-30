@include('template.admin')

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<style>
    .main-button {
        border-radius: 4px;
    }

    .bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form {
        font-family: Arial, Helvetica, sans-serif;
        color: black
    }

    .bootstrap-iso form button, .bootstrap-iso form button:hover {
        color: white !important;
    }

    .asteriskField {
        color: red;
    }

    label {
        font-weight: bold;
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
                        <a class="nav-link" href="{{ route('admin.campaign') }}">Campaign</a>
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
                        <h2>You are now creating a new campaign</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Banner Ends Here -->

<section class="blog-posts grid-system">
    <div class="container">
        <div class="col-lg-12">
            <div class="sidebar-item submit-comment">
                <div class="sidebar-heading">
                    <h2>New Campaign</h2>
                </div>
                <div class="content">
                    <div class="col-md-12 col-sm-12">
                        <fieldset>
                            <span class="asteriskField">*</span>
                            <label>CAMPAIGN IMAGE</label>
                            <div class="container">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        Please Upload a file in supported format (JPEG, JPG, GIF, PNG, Maximum size: 4MB)<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    <img src="/images/{{ Session::get('path') }}" width="300"/>
                                @endif
                                    <img id="selected_img" style="display: none" alt="selected image" width="300"/>
                                <form method="post" action="{{url('/uploadfile')}}"
                                      enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>Select Image for
                                            Upload</label>
                                        {{--<td align="left"><input type="file" name="select_file" /></td>--}}
                                        <input type="file" onchange="readURL(this);" style="margin-bottom: 10px" name="select_file" />
                                        <p style="margin-bottom: 30px; color:black">Supported format: JPEG, JPG, PNG, GIF,
                                            Maximum size: 4MB</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <fieldset>
                                                <span class="asteriskField">*</span>
                                                <label>CAMPAIGN VIDEO</label>
                                                @if (session()->get('url_errors'))
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            Please Upload a valid youtube video URL<br>
                                                        </ul>
                                                    </div>
                                                @endif
                                                <input name="video_link" type="text" id="video_link"
                                                       placeholder="CAMPAIGN VIDEO URL"
                                                       value="{{ old('video_link') }}"
                                                       required="" style="margin-bottom: 10px">
                                                <p style="margin-bottom: 30px; color:black">Please insert a Youtube video url here</p>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <fieldset>
                                                <span class="asteriskField">*</span>
                                                <label>CAMPAIGN NAME</label>
                                                <input name="name" type="text" id="name" placeholder="CAMPAIGN NAME"
                                                       value="{{ old('name') }}" required="">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <fieldset>
                                                <span class="asteriskField">*</span>
                                                <label>ELABORATION 1</label>
                                                <textarea id="section1" name="section1" rows="3"
                                                          placeholder="ELABORATION 1">{{Request::old('section1')}}</textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <fieldset>
                                                <label>ELABORATION 2</label>
                                                <textarea id="section2" name="section2" rows="3"
                                                          placeholder="ELABORATION 2 (Optional)">{{Request::old('section2')}}</textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <fieldset>
                                                <label>ELABORATION 3</label>
                                                <textarea id="section3" name="section3" rows="3"
                                                          placeholder="ELABORATION 3 (Optional)">{{Request::old('section3')}}</textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <fieldset>
                                                <span class="asteriskField">*</span>
                                                <label>CONTACT NUMBER</label>
                                                <input type="tel" id="contact_number" name="contact_number"
                                                       placeholder="CONTACT NUMBER" pattern="[0-9]{3}-[0-9]{7,8}"
                                                       value="{{ old('contact_number') }}" required
                                                       style="margin-bottom: 10px">
                                                <p style="margin-bottom: 30px; color:black">Supported format: 012-456789 OR 012-34567890</p>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <fieldset>
                                                <span class="asteriskField">*</span>
                                                <label>CONTACT EMAIL</label>
                                                <input type="email" id="contact_email" name="contact_email"
                                                       value="{{ old('contact_email') }}"
                                                       placeholder="CONTACT EMAIL" required>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <span class="asteriskField">*</span>
                                            <label>START DATE</label>
                                            <div class="form-group ">
                                                <div class="input-group">
                                                    <input class="form-control" id="start_date" name="start_date"
                                                           value="{{ old('start_date') }}"
                                                           placeholder="YYYY-MM-DD" type="text" required=""/>
                                                    {{--<div class="input-group-addon">
                                                        <i class="fa fa-calendar">
                                                        </i>
                                                    </div>--}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <span class="asteriskField">*</span>
                                            <label>END DATE</label>
                                            <div class="form-group ">
                                                <div class="input-group">
                                                    <input class="form-control" id="end_date" name="end_date"
                                                           value="{{ old('end_date') }}"
                                                           placeholder="YYYY-MM-DD" type="text" required=""/>
                                                    {{--<div class="input-group-addon">
                                                        <i class="fa fa-calendar">
                                                        </i>
                                                    </div>--}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <fieldset>
                                                <button type="submit" id="form-submit" class="main-button"
                                                        style="float: right">
                                                    Submit
                                                </button>
                                            </fieldset>
                                        </div>
                                    </div>
                                </form>
                                <br/>
                            </div>
                        </fieldset>
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
    $(document).ready(function () {
        var date_input = $('input[name="date"]'); //our date input has the name "date"
        var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
            startDate: '+1d'
        })

        $("#start_date").datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
            /*startDate: '+1d'*/
        }).on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#end_date').datepicker('setStartDate', minDate);
            $("#end_date").val($("#start_date").val());
            $(this).datepicker('hide');
        });

        $("#end_date").datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
            startDate: '+1d'
        }).on('changeDate', function (selected) {
            $(this).datepicker('hide');
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            $('#selected_img').show();
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#selected_img')
                    .attr('src', e.target.result)
                    .width(300);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

