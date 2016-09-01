<!DOCTYPE html>
<html>

<head>
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <title>AbsoluteAdmin - A Responsive Bootstrap 3 Admin Dashboard Template</title>
  <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme" />
  <meta name="description" content="AbsoluteAdmin - A Responsive HTML5 Admin UI Framework">
  <meta name="author" content="AbsoluteAdmin">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Font CSS (Via CDN) -->
  <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>

  <!-- Theme CSS -->
  <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css">

  <!-- Admin Forms CSS -->
  <link rel="stylesheet" type="text/css" href="assets/admin-tools/admin-forms/css/admin-forms.css">

  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/img/favicon.ico">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
   <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
   <![endif]-->
</head>

<body class="external-page sb-l-c sb-r-c">


  <!-- Start: Main -->
  <div id="main" class="animated fadeIn">

    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">

      <!-- begin canvas animation bg -->
      <div id="canvas-wrapper">
        <canvas id="demo-canvas"></canvas>
      </div>

      <!-- Begin: Content -->
      <section id="content" class="">
        @if(Session::has('signup_missing_fields'))
        <div class="bs-component">
              <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-remove pr10"></i>
                <strong>test</strong>
              </div>
            </div>
        @endif
        <div class="admin-form theme-info mw700" style="margin-top: 3%;" id="login1">

          <div class="row mb15 table-layout">

            <div class="col-xs-6 va-m pln">
              <a href="/" title="Return to Dashboard">
                <img src="assets/img/logos/logo_white.png" class="img-responsive w250">
              </a>
            </div>

            <div class="col-xs-6 text-right va-b pr5">
              <div class="login-links">
                <a href="/login" class="" title="Sign In">Sign In</a>
                <span class="text-white"> | </span>
                <a href="/register" class="active" title="Register">Register</a>
              </div>

            </div>

          </div>

          <div class="panel panel-info mt10 br-n">
            {!! Form::open(['action' => 'RegistrationController@signUpUser', 'method' => 'POST', 'id' => 'signUpForm']) !!}
              <div class="panel-body p25 bg-light">
                <div class="section-divider mt10 mb40">
                  <span>Set up your account</span>
                </div>
                <!-- .section-divider -->

                <div class="section row">
                  <div class="col-md-6">
                    <label for="firstname" class="field prepend-icon">
                      {!! Form::text('firstname', null, ['placeholder'=>'First name...', 'required', 'class' => 'gui-input']) !!}
                      <label for="firstname" class="field-icon">
                        <i class="fa fa-user"></i>
                      </label>
                    </label>
                  </div>
                  <!-- end section -->

                  <div class="col-md-6">
                    <label for="lastname" class="field prepend-icon">
                      {!! Form::text('lastname', null, ['placeholder'=>'Last name...', 'required', 'class' => 'gui-input']) !!}
                      <label for="lastname" class="field-icon">
                        <i class="fa fa-user"></i>
                      </label>
                    </label>
                  </div>
                  <!-- end section -->
                </div>
                <!-- end .section row section -->

                <div class="section">
                  <label for="email" class="field prepend-icon">
                    {!! Form::text('email', null,  ['placeholder'=>'Email address', 'class' => 'gui-input']) !!}
                    <label for="email" class="field-icon">
                      <i class="fa fa-envelope"></i>
                    </label>
                  </label>
                </div>
                <!-- end section -->

                <div class="section">
                  <label for="username" class="field prepend-icon">
                    {!! Form::text('username', null, ['placeholder'=>'Choose your username.', 'required', 'class' => 'gui-input']) !!}
                    <label for="username" class="field-icon">
                      <i class="fa fa-user"></i>
                    </label>
                  </label>
                  <!-- end .smart-widget section -->
                </div>
                <!-- end section -->

                <div class="section">
                  <label for="password" class="field prepend-icon">
                    {!! Form::password('password',  ['placeholder'=>'Create a password', 'required', 'class' => 'gui-input']) !!}
                    <label for="password" class="field-icon">
                      <i class="fa fa-unlock-alt"></i>
                    </label>
                  </label>
                </div>
                <!-- end section -->

                <div class="section">
                  <label for="confirmPassword" class="field prepend-icon">
                    {!! Form::password('password',  ['placeholder'=>'Retype your password', 'required', 'class' => 'gui-input']) !!}
                    <label for="confirmPassword" class="field-icon">
                      <i class="fa fa-lock"></i>
                    </label>
                  </label>
                </div>
                <!-- end section -->

                <div class="section-divider mv40">
                  <span>Review the Terms</span>
                </div>
                <!-- .section-divider -->

                <div class="section mb15">
                  <label class="option block mt15">
                    <input type="checkbox" name="terms">
                    <span class="checkbox"></span>I agree to the
                    <a href="/terms" class="theme-link"> terms of use. </a>
                  </label>
                </div>
                <!-- end section -->

              </div>
              <!-- end .form-body section -->
              <div class="panel-footer clearfix">
                {!! Form::submit('Create Account', ['class' => 'button btn-primary pull-right', 'id' => 'signUpSubmitBtn']) !!}
                {!! Form::close() !!}
              </div>
              <!-- end .form-footer section -->
            </form>
          </div>
        </div>

      </section>
      <!-- End: Content -->

    </section>
    <!-- End: Content-Wrapper -->

  </div>
  <!-- End: Main -->

  <!-- BEGIN: PAGE SCRIPTS -->

  <!-- jQuery -->
  <script src="vendor/jquery/jquery-1.11.1.min.js"></script>
  <script src="vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

  <!-- Theme Javascript -->
  <script src="assets/js/utility/utility.js"></script>
  <script src="assets/js/demo/demo.js"></script>
  <script src="assets/js/main.js"></script>
  <script type="text/javascript">
  jQuery(document).ready(function() {

    "use strict";

    // Init Theme Core
    Core.init();

    // Init Demo JS
    Demo.init();

    // Demo Javascript- SlideIn alert on click
    $('#alert-demo-call-1').on('click', function() {
      $('#alert-demo-1').slideToggle('fast');
    });

    // Demo Javascript- Fades alert on click
    $('#alert-demo-call-2').on('click', function() {
      $('#alert-demo-2').fadeToggle();
    });

  });
  </script>
  <!-- END: PAGE SCRIPTS -->

</body>

</html>
