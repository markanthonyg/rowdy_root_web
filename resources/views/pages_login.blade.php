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
      <section id="content">

        <div class="admin-form theme-info" id="login">

          <div class="row mb15 table-layout">

            <div class="col-xs-6 va-m pln">
              <a href="/" title="Return to Dashboard">
                <img src="assets/img/logos/logo_white.png" title="EMRS Online Logo" class="img-responsive w250">
              </a>
            </div>

            <div class="col-xs-6 text-right va-b pr5">
              <div class="login-links">
                <a href="/login" class="active" title="Sign In">Sign In</a>
                <span class="text-white"> | </span>
                <a href="/register" class="" title="Register">Register</a>
              </div>

            </div>

          </div>

          <div class="panel panel-info mt10 br-n">

            <!-- end .form-header section -->
            {{-- <form method="POST" action="/login" id="loginform"> --}}
            {!! Form::open(['action' => 'Auth\LoginController@login', 'id' => 'loginform']) !!}
              <div class="panel-body bg-light p30">
                {{-- Show login error message --}}
                @if(Session::has('registration_success'))
                  <div class="alert alert-info alert-lg fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ Session::get('registration_success') }}
                  </div>
                @endif
                @if(Session::has('login_error_message'))
                  <div class="alert alert-danger alert-lg fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ Session::get('login_error_message') }}
                  </div>
                @endif
                @if(Session::has('activation_message'))
                  <div class="alert alert-warning alert-lg fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ Session::get('activation_message') }}
                  </div>
                @endif
                <div class="row">
                  <div class="col-sm-7 pr30">
                    <div class="section">
                      {!! Form::label('username', 'Username', ['class' => 'field-label text-muted fs18 mb10']) !!}
                      <label for="username" class="field prepend-icon">
                        {!! Form::text('username', null, ['id' => 'username', 'class' => 'gui-input', 'placeholder' => 'Enter Username']) !!}
                        <label for="username" class="field-icon">
                          <i class="fa fa-user-md"></i>
                        </label>
                      </label>
                    </div>
                    <!-- end section -->

                    <div class="section">
                      <label for="username" class="field-label text-muted fs18 mb10">Password</label>
                      <label for="password" class="field prepend-icon">
                        {!! Form::password('password', ['id' => 'password', 'class' => 'gui-input', 'placeholder' => 'Enter Password']) !!}
                        <label for="password" class="field-icon">
                          <i class="fa fa-lock"></i>
                        </label>
                      </label>
                    </div>
                    <!-- end section -->

                    {{-- Token must be passed or else 500 error --}}
                    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}

                  </div>
                  <div class="col-sm-5 br-l br-grey pl30">
                    <h3 class="mb25"> Sign In To:</h3>
                    <p class="mb15">
                      <span class="fa fa-check text-success pr5"></span> View Your Patients History</p>
                    <p class="mb15">
                      <span class="fa fa-check text-success pr5"></span> Record Patient Information</p>
                    <p class="mb15">
                      <span class="fa fa-check text-success pr5"></span> Contact Your Patients</p>
                  </div>
                </div>
              </div>
              <!-- end .form-body section -->
              <div class="panel-footer clearfix p10 ph15">
                {!! Form::submit('Sign In', ['class' => 'button btn-primary mr10 pull-right']) !!}
                <label class="switch ib switch-primary pull-left input-align mt10">
                  <input type="checkbox" name="remember" id="remember" checked>
                  <label for="remember" data-on="YES" data-off="NO"></label>
                  <span>Remember me</span>
                </label>
              </div>
              <!-- end .form-footer section -->
            {{-- </form> --}}
            {!! Form::close() !!}
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
  {{-- <script src="assets/js/demo/demo.js"></script> --}}
  {{-- <script src="assets/js/main.js"></script> --}}
  <!--<script src="assets/js/login/Login.js"></script>-->

  <!-- Page Javascript -->
  <script type="text/javascript">
  jQuery(document).ready(function() {

    "use strict";

    // Init Theme Core
    // Core.init();

    // Init Demo JS
    // Demo.init();

    // Init Login JS
    // Login.init();

    // Init CanvasBG and pass target starting location
    CanvasBG.init({
      Loc: {
        x: window.innerWidth / 2,
        y: window.innerHeight / 3.3
      },
    });

  });
  </script>

  <!-- END: PAGE SCRIPTS -->

</body>

</html>
