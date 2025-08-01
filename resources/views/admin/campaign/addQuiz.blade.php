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
                        <h2>You are now adding a quiz for campaign <span
                                style="color: #F48840; font-size: 55px">{{$campaign->name}}</span></h2>
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
                    <h2>New Quiz</h2>
                    <span class="text-muted">*Minimum 5 questions for 1 quiz, maximum 10.</span>
                </div>
                <div class="content">
                    <div class="col-md-12 col-sm-12">
                        <fieldset>
                            <div class="container">
                                <form method="post" action="{{url('/admin/storeQuiz', $campaign->id)}}">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <fieldset>
                                                <span class="asteriskField">*</span>
                                                <label>QUIZ NAME</label>
                                                <input name="name" type="text" id="name" placeholder="QUIZ NAME"
                                                       required="">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <fieldset>
                                                <span class="asteriskField">*</span>
                                                <label>QUESTION 1</label>
                                                <textarea id="question1" name="question1"
                                                          rows="3" placeholder="QUESTION 1" required=""></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <fieldset>
                                                <label>ANSWER FOR QUESTION 1</label>
                                                <textarea id="answer_for_question1" name="answer_for_question1" rows="3"
                                                          required=""
                                                          placeholder="ANSWER FOR QUESTION 1"></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <fieldset>
                                                <span class="asteriskField">*</span>
                                                <label>QUESTION 2</label>
                                                <textarea id="question2" name="question2" rows="3" required=""
                                                          placeholder="QUESTION 2"></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <fieldset>
                                                <label>ANSWER FOR QUESTION 2</label>
                                                <textarea id="answer_for_question2" name="answer_for_question2" rows="3"
                                                          required=""
                                                          placeholder="ANSWER FOR QUESTION 2"></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <fieldset>
                                                <span class="asteriskField">*</span>
                                                <label>QUESTION 3</label>
                                                <textarea id="question3" name="question3" rows="3" required=""
                                                          placeholder="QUESTION 3"></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <fieldset>
                                                <label>ANSWER FOR QUESTION 3</label>
                                                <textarea id="answer_for_question3" name="answer_for_question3" rows="3"
                                                          required=""
                                                          placeholder="ANSWER FOR QUESTION 3"></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <fieldset>
                                                <span class="asteriskField">*</span>
                                                <label>QUESTION 4</label>
                                                <textarea id="question4" name="question4" rows="3" required=""
                                                          placeholder="QUESTION 4"></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <fieldset>
                                                <label>ANSWER FOR QUESTION 4</label>
                                                <textarea id="answer_for_question4" name="answer_for_question4" rows="3"
                                                          required=""
                                                          placeholder="ANSWER FOR QUESTION 4"></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <fieldset>
                                                <span class="asteriskField">*</span>
                                                <label>QUESTION 5</label>
                                                <textarea id="question5" name="question5" rows="3" required=""
                                                          placeholder="QUESTION 5"></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <fieldset>
                                                <label>ANSWER FOR QUESTION 5</label>
                                                <textarea id="answer_for_question5" name="answer_for_question5" rows="3"
                                                          required=""
                                                          placeholder="ANSWER FOR QUESTION 5"></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-12" id="more_field">
                                            <label for="more_fields">Do you have more questions?</label>
                                            <select name="more_fields" id="more_fields" onchange="moreFields()">
                                                <option value="1">Yes</option>
                                                <option value="0" selected="selected">No</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 col-sm-12" id="q6" style="display:none">
                                            <fieldset>
                                                <label>QUESTION 6</label>
                                                <textarea id="question6" name="question6" rows="3"
                                                          placeholder="QUESTION 6 (OPTIONAL)"></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-sm-12" id="q6a" style="display:none">
                                            <fieldset>
                                                <label>ANSWER FOR QUESTION 6</label>
                                                <textarea id="answer_for_question6" name="answer_for_question6" rows="3"
                                                          placeholder="ANSWER FOR QUESTION 6 (REQUIRED IF QUESTION EXISTS)"></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-sm-12" id="q7" style="display:none">
                                            <fieldset>
                                                <label>QUESTION 7</label>
                                                <textarea id="question7" name="question7" rows="3"
                                                          placeholder="QUESTION 7 (OPTIONAL)"></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-sm-12" id="q7a" style="display:none">
                                            <fieldset>
                                                <label>ANSWER FOR QUESTION 7</label>
                                                <textarea id="answer_for_question7" name="answer_for_question7" rows="3"
                                                          placeholder="ANSWER FOR QUESTION 7 (REQUIRED IF QUESTION EXISTS)"></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-sm-12" id="q8" style="display:none">
                                            <fieldset>
                                                <label>QUESTION 8</label>
                                                <textarea id="question8" name="question8" rows="3"
                                                          placeholder="QUESTION 8 (OPTIONAL)"></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-sm-12" id="q8a" style="display:none">
                                            <fieldset>
                                                <label>ANSWER FOR QUESTION 8</label>
                                                <textarea id="answer_for_question8" name="answer_for_question8" rows="3"
                                                          placeholder="ANSWER FOR QUESTION 8 (REQUIRED IF QUESTION EXISTS)"></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-sm-12" id="q9" style="display:none">
                                            <fieldset>
                                                <label>QUESTION 9</label>
                                                <textarea id="question9" name="question9" rows="3"
                                                          placeholder="QUESTION 9 (OPTIONAL)"></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-sm-12" id="q9a" style="display:none">
                                            <fieldset>
                                                <label>ANSWER FOR QUESTION 9</label>
                                                <textarea id="answer_for_question9" name="answer_for_question9" rows="3"
                                                          placeholder="ANSWER FOR QUESTION 9 (REQUIRED IF QUESTION EXISTS)"></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-sm-12" id="q10" style="display:none">
                                            <fieldset>
                                                <label>QUESTION 10</label>
                                                <textarea id="question10" name="question10" rows="3"
                                                          placeholder="QUESTION 10 (OPTIONAL)"></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-sm-12" id="q10a" style="display:none">
                                            <fieldset>
                                                <label>ANSWER FOR QUESTION 10</label>
                                                <textarea id="answer_for_question10" name="answer_for_question10"
                                                          rows="3"
                                                          placeholder="ANSWER FOR QUESTION 10 (REQUIRED IF QUESTION EXISTS)"></textarea>
                                            </fieldset>
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

    function moreFields() {
        var x = $('#more_fields').val();
        console.log(x);
        if (x === 0) {
            document.getElementById('if_yes').style.display = 'none';
            document.getElementById('q6').style.display = 'none';
            document.getElementById('q7').style.display = 'none';
            document.getElementById('q8').style.display = 'none';
            document.getElementById('q9').style.display = 'none';
            document.getElementById('q10').style.display = 'none';
            document.getElementById('q6a').style.display = 'none';
            document.getElementById('q7a').style.display = 'none';
            document.getElementById('q8a').style.display = 'none';
            document.getElementById('q9a').style.display = 'none';
            document.getElementById('q10a').style.display = 'none';
        } else {
            document.getElementById('q6').style.display = 'block';
            document.getElementById('q7').style.display = 'block';
            document.getElementById('q8').style.display = 'block';
            document.getElementById('q9').style.display = 'block';
            document.getElementById('q10').style.display = 'block';
            document.getElementById('q6a').style.display = 'block';
            document.getElementById('q7a').style.display = 'block';
            document.getElementById('q8a').style.display = 'block';
            document.getElementById('q9a').style.display = 'block';
            document.getElementById('q10a').style.display = 'block';
            document.getElementById('more_field').style.display = 'none';
        }
    }

    $('#question6').change(function () {
        if ($('#question6').val() !== "") {
            $("#answer_for_question6").attr('required', '');
        } else {
            $("#answer_for_question6").removeAttr('required', '');
        }
    });
    $('#question7').change(function () {
        if ($('#question7').val() !== "") {
            $("#answer_for_question7").attr('required', '');
        } else {
            $("#answer_for_question7").removeAttr('required', '');
        }
    });
    $('#question8').change(function () {
        if ($('#question8').val() !== "") {
            $("#answer_for_question8").attr('required', '');
        } else {
            $("#answer_for_question8").removeAttr('required', '');
        }
    });
    $('#question9').change(function () {
        if ($('#question9').val() !== "") {
            $("#answer_for_question9").attr('required', '');
        } else {
            $("#answer_for_question9").removeAttr('required', '');
        }
    });
    $('#question10').change(function () {
        if ($('#question10').val() !== "") {
            $("#answer_for_question10").attr('required', '');
        } else {
            $("#answer_for_question10").removeAttr('required', '');
        }
    });
    $('#answer_for_question6').change(function () {
        if ($('#answer_for_question6').val() !== "") {
            $("#question6").attr('required', '');
        } else {
            $("#question6").removeAttr('required', '');
        }
    });
    $('#answer_for_question7').change(function () {
        if ($('#answer_for_question7').val() !== "") {
            $("#question7").attr('required', '');
        } else {
            $("#question7").removeAttr('required', '');
        }
    });
    $('#answer_for_question8').change(function () {
        if ($('#answer_for_question8').val() !== "") {
            $("#question8").attr('required', '');
        } else {
            $("#question8").removeAttr('required', '');
        }
    });
    $('#answer_for_question9').change(function () {
        if ($('#answer_for_question9').val() !== "") {
            $("#question9").attr('required', '');
        } else {
            $("#question9").removeAttr('required', '');
        }
    });
    $('#answer_for_question10').change(function () {
        if ($('#answer_for_question10').val() !== "") {
            $("#question10").attr('required', '');
        } else {
            $("#question10").removeAttr('required', '');
        }
    });
</script>

