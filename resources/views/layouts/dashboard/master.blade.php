<!DOCTYPE html>
<html>

<head>
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme" />
  <meta name="description" content="EMRS Online - A Portal Into Patient Records">
  <meta name="author" content="Rowdy Root">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Font CSS (Via CDN) -->
  <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>

  <!-- FullCalendar Plugin CSS -->
  <link rel="stylesheet" type="text/css" href="vendor/plugins/fullcalendar/fullcalendar.min.css">

  <!-- Theme CSS -->
  <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css">

  <!-- Admin Forms CSS -->
  <link rel="stylesheet" type="text/css" href="assets/admin-tools/admin-forms/css/admin-forms.min.css">

  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/img/favicon.ico">

  <!-- CSS For live search -->
  <link rel="stylesheet" type="text/css" href="css/livesearch.css">

  {{-- Yield for custom styling --}}
  @yield('style')

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

</head>

<body class="dashboard-page">

<!-------------------------------------------------------------+
  <body> Helper Classes:
---------------------------------------------------------------+
  '.sb-l-o' - Sets Left Sidebar to "open"
  '.sb-l-m' - Sets Left Sidebar to "minified"
  '.sb-l-c' - Sets Left Sidebar to "closed"

  '.sb-r-o' - Sets Right Sidebar to "open"
  '.sb-r-c' - Sets Right Sidebar to "closed"
---------------------------------------------------------------+
 Example: <body class="example-page sb-l-o sb-r-c">
 Results: Sidebar left Open, Sidebar right Closed
--------------------------------------------------------------->

  <!-- Start: Main -->
  <div id="main">

    <!-----------------------------------------------------------------+
       ".navbar" Helper Classes:
    -------------------------------------------------------------------+
       * Positioning Classes:
        '.navbar-static-top' - Static top positioned navbar
        '.navbar-static-top' - Fixed top positioned navbar

       * Available Skin Classes:
         .bg-dark    .bg-primary   .bg-success
         .bg-info    .bg-warning   .bg-danger
         .bg-alert   .bg-system
    -------------------------------------------------------------------+
      Example: <header class="navbar navbar-fixed-top bg-primary">
      Results: Fixed top navbar with blue background
    ------------------------------------------------------------------->

    <!-- Start: Header -->
    <header class="navbar navbar-fixed-top navbar-shadow">
      <div class="navbar-branding">
        <a class="navbar-brand" href="dashboard.html">
          <b>EMRS</b> Online
        </a>
        <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
      </div>
      <ul class="nav navbar-nav navbar-left">
        <li class="dropdown menu-merge hidden-xs">
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
        <li class="hidden-xs">
          <a class="request-fullscreen toggle-active" href="#">
            <span class="ad ad-screen-full fs18"></span>
          </a>
        </li>
      </ul>
      <form class="navbar-form navbar-left navbar-search alt" role="search">
        <div class="form-group">
          {{-- Search bar w/ results div (coming from jquery) --}}
          <input type="text" class="search form-control" id="searchid" placeholder="Search Patient...">
          <div id="result"></div>
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown menu-merge">
          <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown">
          	<img src="assets/img/avatars/1.jpg" alt="avatar" class="mw30 br64">
          	<span class="hidden-xs pl15"> {{ $user->first_name }} {{ $user->last_name[0] }}. </span>
            <span class="caret caret-tp hidden-xs"></span>
          </a>
          <ul class="dropdown-menu list-group dropdown-persist w250" role="menu">
            <li class="list-group-item">
              <a href="#" class="animated animated-short fadeInUp">
                <span class="fa fa-gear"></span> Settings </a>
            </li>
            <li class="dropdown-footer">
              <a href="/logout" class="">
              <span class="fa fa-power-off pr5"></span> Logout </a>
            </li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- End: Header -->

    <!-----------------------------------------------------------------+
       "#sidebar_left" Helper Classes:
    -------------------------------------------------------------------+
       * Positioning Classes:
        '.affix' - Sets Sidebar Left to the fixed position

       * Available Skin Classes:
         .sidebar-dark (default no class needed)
         .sidebar-light
         .sidebar-light.light
    -------------------------------------------------------------------+
       Example: <aside id="sidebar_left" class="affix sidebar-light">
       Results: Fixed Left Sidebar with light/white background
    ------------------------------------------------------------------->

    <!-- Start: Sidebar -->
    <aside id="sidebar_left" class="nano nano-light affix">

      <!-- Start: Sidebar Left Content -->
      <div class="sidebar-left-content nano-content">

        <!-- Start: Sidebar Header -->
        <header class="sidebar-header">

          <!-- Sidebar Widget - Author -->
          <div class="sidebar-widget author-widget">
            <div class="media">
              <a class="media-left" href="#">
                <img src="assets/img/avatars/3.jpg" class="img-responsive">
              </a>
              <div class="media-body">
                <div class="media-author"> {{ $user->first_name }} {{ $user->last_name }}</div>
                <div class="media-links">
                   <a href="/logout">Logout</a>
                </div>
              </div>
            </div>
          </div>

        </header>
        <!-- End: Sidebar Header -->

        <!-- Start: Sidebar Menu -->
        <ul class="nav sidebar-menu">
          <li class="sidebar-label pt20">Menu</li>
          <li>
            <a href="/">
              <span class="fa fa-home"></span>
              <span class="sidebar-title">Home</span>
            </a>
          </li>
          <li class="sidebar-label pt20">Patient</li>
          <li>
            <a href="/patients">
              <span class="fa fa-street-view"></span>
              <span class="sidebar-title">View Patients</span>
            </a>
          </li>
          <li>
            <a href="/new_patient">
              <span class="fa fa-plus"></span>
              <span class="sidebar-title">New Patient</span>
            </a>
          </li>
          <li class="sidebar-label pt20">Clinic</li>
          <li>
            <a href="#">
              <span class="fa fa-hospital-o"></span>
              <span class="sidebar-title">View Clinics</span>
            </a>
          </li>
          <li>
            <a href="#">
              <span class="fa fa-plus"></span>
              <span class="sidebar-title">New Clinic</span>
            </a>
          </li>
          <li class="sidebar-label pt20">Visit</li>
          <li>
            <a href="#">
              <span class="fa fa-stethoscope"></span>
              <span class="sidebar-title">View Visits</span>
            </a>
          </li>
          <li>
            <a href="#">
              <span class="fa fa-plus"></span>
              <span class="sidebar-title">New Visit</span>
            </a>
          </li>

        </ul>
        <!-- End: Sidebar Menu -->

      </div>
      <!-- End: Sidebar Left Content -->

    </aside>
    <!-- End: Sidebar Left -->

    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">

      <!-- Start: Topbar -->
      <header id="topbar" class="alt">
        <div class="topbar-left">
          <ol class="breadcrumb">
            @yield('breadcrumb')
          </ol>
        </div>
      </header>
      <!-- End: Topbar -->

      <!-- Begin: Content -->
      <section id="content" class="table-layout animated fadeIn">
        @yield('content')
        </div>
        <!-- end: .tray-center -->
      </section>
      <!-- End: Content -->

      <!-- Begin: Page Footer -->
      <footer id="content-footer" class="affix">
        <div class="row">
          <div class="col-md-6">
            <span class="footer-legal">© 2016 UTSA SOFTWARE ENGINEERING</span>
          </div>
        </div>
      </footer>
      <!-- End: Page Footer -->

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

  <!-- Bootstrap Timeout Plugin -->
  <script src="vendor/plugins/bstimeout/bs-timeout.js"></script>

  @yield('script')

  <script type="text/javascript">
    jQuery(document).ready(function() {

      // Collect CSRF token to allow live search to be sent
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      // Init Bootstrap Timeout Demo
      $.sessionTimeout({
          keepAliveUrl: '',
          logoutUrl: '/login',
          redirUrl: '/screenlock',
          warnAfter: 200000,
          redirAfter: 300000,
          // countdownBar: true,
          countdownMessage: 'Redirecting in {timer} seconds.',
          onStart: function (opts) {},
      });

      // Live search bar keyup
      $('.search').keyup(function() {
        var searchid = $(this).val();
        if($('#searchid').val() == ''){
          jQuery('#result').fadeOut();
        }
        var dataString = 'search='+searchid;
        if(searchid != '') {
            $.ajax({
              type: "POST",
              url: "/livesearch",
              data: dataString,
              cache: false,
              success: function(html)
              {
                $("#result").html(html).show();
              }
            });
        }
        return false;
      });

      // Live search bar on click result
      jQuery("#result").on("click",function(e){
          var $clicked = $(e.target);
          var $name = $clicked.find('.name').html();
          var decoded = $("<div/>").html($name).text();
          $('#searchid').val(decoded);
      });

      // Live search bar on click off bar
      jQuery(document).on("click", function(e) {
          var $clicked = $(e.target);
          if (! $clicked.hasClass("search")){
            jQuery("#result").fadeOut();
          }
      });

      // Live search bar fade out on empty box
      $('#searchid').click(function(){
        if($(this).val() != ''){
          jQuery("#result").fadeIn();
        }
      });


    });
  </script>
  <!-- END: PAGE SCRIPTS -->

</body>

</html>
