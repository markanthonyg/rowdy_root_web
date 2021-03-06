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

  {{-- Admin Forms CSS Custom --}}
  <link rel="stylesheet" type="text/css" href="assets/admin-tools/admin-forms/css/admin-forms-custom.css">


  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/img/favicon.ico">

  {{-- Google recap --}}
  <script src='https://www.google.com/recaptcha/api.js'></script>

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

          {{-- Being FORM --}}
          <div class="panel panel-info mt10 br-n">
            {!! Form::open(['action' => 'Auth\RegistrationController@register', 'id' => 'registrationform', 'files' => 'true']) !!}
              <div class="panel-body p25 bg-light">

                {{-- Show registration error message --}}
                @if(Session::has('register_validation_messages'))
                  <div class="alert alert-danger alert-lg fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ Session::get('register_validation_messages') }}
                  </div>
                @endif

                <div class="section-divider mt10 mb40">
                  <span>Set up your account</span>
                </div>
                <!-- .section-divider -->

                <div class="section row">
                  <div class="col-md-6">
                    <label for="firstname" class="field prepend-icon">
                      {!! Form::text('firstname', null, ['id' => 'firstname', 'class' => 'gui-input', 'placeholder' => 'First name...']) !!}
                      <label for="firstname" class="field-icon">
                        <i class="fa fa-user"></i>
                      </label>
                    </label>
                  </div>
                  <!-- end section -->

                  <div class="col-md-6">
                    <label for="lastname" class="field prepend-icon">
                      {!! Form::text('lastname', null, ['id' => 'lastname', 'class' => 'gui-input', 'placeholder' => 'Last name...']) !!}
                      <label for="lastname" class="field-icon">
                        <i class="fa fa-user"></i>
                      </label>
                    </label>
                  </div>
                  <!-- end section -->
                </div>
                <!-- end .section row section -->

                <div class="section row">
                  <div class="col-md-1">

                  </div>
                  <div class="col-md-2">
                    <span class="form-label">Date of Birth:</span>
                  </div>
                  <div class="col-md-5">
                    {!! Form::select('month_dob', $months) !!}
                    {!! Form::selectrange('day_dob', 1, 31) !!}
                    {!! Form::selectrange('year_dob', 2016, 1900) !!}
                  </div>
                  <div class="col-md-3">
                    {!! Form::radio('gender', 'Male') !!} &nbsp <span class="form-label">Male</span> &nbsp &nbsp
                    {!! Form::radio('gender', 'Female') !!} &nbsp <span class="form-label">Female</span>
                  </div>
                </div>

                <div class="section">
                  <label for="email" class="field prepend-icon">
                    <input type="email" name="email" id="email" class="gui-input" placeholder="Email address">
                    <label for="email" class="field-icon">
                      <i class="fa fa-envelope"></i>
                    </label>
                  </label>
                </div>
                <!-- end section -->

                <div class="section">
                  <label for="username" class="field prepend-icon">
                    <input type="text" name="username" id="username" class="gui-input" placeholder="Choose your username">
                    <label for="username" class="field-icon">
                      <i class="fa fa-user"></i>
                    </label>
                  </label>
                  <!-- end .smart-widget section -->
                </div>
                <!-- end section -->

                <div class="section">
                  <label for="password" class="field prepend-icon">
                    <input type="password" name="password" id="password" class="gui-input" placeholder="Create a password">
                    <label for="password" class="field-icon">
                      <i class="fa fa-unlock-alt"></i>
                    </label>
                  </label>
                </div>
                <!-- end section -->

                <div class="section">
                  <label for="password_confirmation" class="field prepend-icon">
                    <input type="password" name="password_confirmation" id="password_confirmation" class="gui-input" placeholder="Retype your password">
                    <label for="password_confirmation" class="field-icon">
                      <i class="fa fa-lock"></i>
                    </label>
                  </label>
                </div>
                <!-- end section -->

                <div class="section">
                    {!! Form::select('clinic', $clinics, null, ['placeholder' => '---  Select Clinic  ---', 'class' => 'form-control']) !!}
                    <center>
                      <label for="clinic" class="field-icon" style="font-size: smaller;">
                         Account will remain inactive until <b>clinic</b> admin approves request
                      </label>
                    </center>
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

                {{-- Google Recaptcha --}}
                <div class="center">
                  <center>
                    {!! Recaptcha::render() !!}
                  </center>
                </div>
                <!-- end section -->

              </div>
              <!-- end .form-body section -->
              <div class="panel-footer clearfix">
                <button type="submit" class="button btn-primary pull-right">Create Account</button>
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

  <!-- CanvasBG Plugin(creates mousehover effect) -->
  <script src="vendor/plugins/canvasbg/canvasbg.js"></script>

  <!-- Theme Javascript -->
  <script src="assets/js/utility/utility.js"></script>
  <script src="assets/js/demo/demo.js"></script>
  <script src="assets/js/main.js"></script>

  <!-- Page Javascript -->
  <script type="text/javascript">
  jQuery(document).ready(function() {

    // Init CanvasBG and pass target starting location
    CanvasBG.init({
      Loc: {
        x: window.innerWidth / 2.1,
        y: window.innerHeight / 4.2
      },
    });
  });
  </script>

  <!-- END: PAGE SCRIPTS -->

</body>

</html>
