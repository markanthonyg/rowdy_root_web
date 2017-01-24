<!DOCTYPE html>
<html>

<head>
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <title>EMRS Online | Screen Lock</title>
  <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme" />
  <meta name="description" content="EMRS Online - A Portal Into Patient Records">
  <meta name="author" content="Rowdy Root">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Font CSS (Via CDN) -->
  <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>

  <!-- Theme CSS -->
  <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css">

  <!-- Admin Forms CSS -->
  <link rel="stylesheet" type="text/css" href="assets/admin-tools/admin-forms/css/admin-forms.css">

  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/img/emrs.ico">

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

        <div class="admin-form theme-info mw600" style="margin-top: 13%;" id="login">
          <div class="row mb15 table-layout">

            <div class="col-xs-6 pln">
              <a href="/logout" title="Return to Dashboard">
                <img src="assets/img/logos/logo_white.png" title="EMRS Online Logo" class="img-responsive w250">
              </a>
            </div>

            <div class="col-xs-6 text-right va-b pr5">
              <div class="login-links">
                <a href="/login" class="" title="False Credentials">Not {{ $first_name }} {{ $last_name }}?</a>
              </div>

            </div>

          </div>
          <div class="panel panel-info heading-border br-n">

            <!-- end .form-header section -->
            {!! Form::open(['action' => 'Auth\UnlockController@unlockScreen', 'id' => 'unlockform']) !!}
              <div class="panel-body bg-light pn-30">

                {{-- Show login error message --}}
                @if(Session::has('login_error_message'))
                  <div class="alert alert-danger fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ Session::get('login_error_message') }}
                  </div>
                @endif

                {{-- Set username (hidden) --}}
                {!! Form::hidden('username', $username) !!}

                {{-- Set first_name (hidden) --}}
                {!! Form::hidden('first_name', $first_name) !!}

                {{-- Set username (hidden) --}}
                {!! Form::hidden('last_name', $last_name) !!}

                <div class="row table-layout">
                  <div class="col-xs-3 p20 pv15 va-m br-r bg-light">
                    <img class="br-a bw4 br-grey img-responsive center-block" src="assets/img/avatars/3.jpg" title="Logo">
                  </div>
                  <div class="col-xs-9 p20 pv15 va-m bg-light">

                    <h3 class="mb5"> {{ $first_name }} {{ $last_name }}
                      <small> - Session locked
                    </h3>
                    <p class="text-muted">{{ $username }}</p>

                    <div class="section mt25">
                      <label for="password" class="field prepend-icon">
                        {!! Form::password('password', ['id' => 'password', 'class' => 'gui-input', 'placeholder' => 'Enter Password']) !!}
                        <label for="password" class="field-icon">
                          <i class="fa fa-lock"></i>
                        </label>
                      </label>
                    </div>
                    <!-- end section -->

                  </div>
                </div>
              </div>
              <!-- end .form-body section -->

          </div>
          {!! Form::submit('Unlock', ['class' => 'button btn-primary mr10 pull-right']) !!}
        </div>
        {!! Form::close() !!}
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
    "use strict";

    // Init Theme Core
    // Core.init();

    // Init Demo JS
    // Demo.init();

    // Init CanvasBG and pass target starting location
    CanvasBG.init({
      Loc: {
        x: window.innerWidth / 2.1,
        y: window.innerHeight / 2.3
      },
    });


  });
  </script>

  <!-- END: PAGE SCRIPTS -->

</body>

</html>
