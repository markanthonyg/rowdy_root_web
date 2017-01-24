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
  {{ Html::style('http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700') }}

  <!-- FullCalendar Plugin CSS -->
  {{ Html::style('vendor/plugins/fullcalendar/fullcalendar.min.css') }}

  <!-- Theme CSS -->
  {{ Html::style('assets/skin/default_skin/css/theme.css') }}

  <!-- Admin Forms CSS -->
  {{ Html::style('assets/admin-tools/admin-forms/css/admin-forms.min.css') }}

  <!-- Favicon -->
  {{ Html::style('assets/img/emrs.ico') }}

  <!-- CSS For live search -->
  {{ Html::style('css/livesearch.css') }}

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
        <a class="navbar-brand" href="/">
          <b>EMRS</b> Online
        </a>
        <!--<span id="toggle_sidemenu_l" class="ad ad-lines"></span>-->
      </div>
      <!--
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
    </ul>-->
      <form class="navbar-form navbar-left navbar-search alt" role="search">
        <div class="form-group col-md-12">
          {{-- Search bar w/ results div (coming from jquery) --}}
          <input type="text" class="search form-control col-md-12" id="searchid" placeholder="Search Patient...">
          <br />
          <br />
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
              <span class="sidebar-title" onmouseover="this.style.color='#dddddd'" onmouseout="this.style.color='#ffffff'">Home</span>
            </a>
          </li>
          <li>
            <a href="/patients">
              <span class="fa fa-street-view"></span>
              <span class="sidebar-title" onmouseover="this.style.color='#dddddd'" onmouseout="this.style.color='#ffffff'">Patients</span>
            </a>
          </li>
          <li>
            <a href="/visits">
              <span class="fa fa-stethoscope"></span>
              <span class="sidebar-title" onmouseover="this.style.color='#dddddd'" onmouseout="this.style.color='#ffffff'">View Visits</span>
            </a>
          </li>
          <li>
            <a href="/new_visit">
              <span class="fa fa-plus"></span>
              <span class="sidebar-title" onmouseover="this.style.color='#dddddd'" onmouseout="this.style.color='#ffffff'">New Visit</span>
            </a>
          </li>
          @if($user->role == "sys_admin")
            <li class="sidebar-label pt20">Admin Tools</li>
            <li>
              <a href="/accountRequestList">
                <span class="fa fa-user-plus"></span>
                <span class="sidebar-title" onmouseover="this.style.color='#dddddd'" onmouseout="this.style.color='#ffffff'">Account Request</span>
                <span class="badge badge-danger" style="color:#dbd9d9; margin-left: 30px;">{{$num_unapproved_users}}</span>
              </a>
            </li>
            <li>
              <a href="/accountList">
                <span class="fa fa-users"></span>
                <span class="sidebar-title" onmouseover="this.style.color='#dddddd'" onmouseout="this.style.color='#ffffff'">Users</span>
              </a>
            </li>
            <li>
              <a href="/clinics">
                <span class="fa fa-hospital-o"></span>
                <span class="sidebar-title" onmouseover="this.style.color='#dddddd'" onmouseout="this.style.color='#ffffff'">Clinics</span>
              </a>
            </li>
          @endif
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
      <section id="content">
        @yield('content')
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
  {{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js') }}
  {{ Html::script('vendor/jquery/jquery_ui/jquery-ui.min.js') }}

  <!-- Theme Javascript -->
  {{ Html::script('assets/js/utility/utility.js') }}
  {{ Html::script('assets/js/demo/demo.js') }}
  {{ Html::script('assets/js/main.js') }}

  <!-- Bootstrap Timeout Plugin -->
  {{ Html::script('vendor/plugins/bstimeout/bs-timeout.js') }}

  @yield('script')

  <script type="text/javascript">
    jQuery(document).ready(function() {

      // Collect CSRF token to allow live search to be sent
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      // Init Timeout
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
      $('#searchid').keyup(function() {
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

      // Live search for drugs on keyup
      $('#drug_search').keyup(function() {
        var searchid = $(this).val();
        if($('#drug_search').val() == ''){
          jQuery('#drug_result').fadeOut();
        }
        var dataString = 'search='+searchid;
        if(searchid != '') {
            $.ajax({
              type: "POST",
              url: "/livesearchMeds",
              data: dataString,
              cache: false,
              success: function(html)
              {
                $("#drug_result").html(html).show();
              }
            });
        }
        return false;
      });

      // Live search bar on click result
      jQuery("#result").on("click",function(e){
          // Get div of the result user clicks
          var $clicked = $(e.target).closest('div');

          // Filter out finding the span class with id of id
          var $id = $clicked.find('.id').html();
          var decoded = $("<div/>").html($id).text();

          // Relocate user to that patients page
          window.location.href = '/patient/' + decoded;
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
