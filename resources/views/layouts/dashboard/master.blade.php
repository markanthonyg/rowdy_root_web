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
          <input type="text" class="form-control" placeholder="Search Patient..." value="">
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
            <a href="pages_calendar.html">
              <span class="fa fa-home"></span>
              <span class="sidebar-title">Home</span>
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
            <li class="crumb-active">
              <a href="dashboard.html">Dashboard</a>
            </li>
            <li class="crumb-icon">
              <a href="dashboard.html">
                <span class="glyphicon glyphicon-home"></span>
              </a>
            </li>
            <li class="crumb-link">
              <a href="index.html">Home</a>
            </li>
            <li class="crumb-trail">Dashboard</li>
          </ol>
        </div>
      </header>
      <!-- End: Topbar -->

      <!-- Begin: Content -->
      <section id="content" class="table-layout animated fadeIn">
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
  <script src="vendor/jquery/jquery-1.11.1.min.js"></script>
  <script src="vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

  <!-- HighCharts Plugin -->
  <script src="vendor/plugins/highcharts/highcharts.js"></script>

  <!-- JvectorMap Plugin + US Map (more maps in plugin/assets folder) -->
  <script src="vendor/plugins/jvectormap/jquery.jvectormap.min.js"></script>
  <script src="vendor/plugins/jvectormap/assets/jquery-jvectormap-us-lcc-en.js"></script>

  <!-- Bootstrap Tabdrop Plugin -->
  <script src="vendor/plugins/tabdrop/bootstrap-tabdrop.js"></script>

  <!-- FullCalendar Plugin + moment Dependency -->
  <script src="vendor/plugins/fullcalendar/lib/moment.min.js"></script>
  <script src="vendor/plugins/fullcalendar/fullcalendar.min.js"></script>

  <!-- Theme Javascript -->
  <script src="assets/js/utility/utility.js"></script>
  <script src="assets/js/demo/demo.js"></script>
  <script src="assets/js/main.js"></script>

  <!-- Widget Javascript -->
  <script src="assets/js/demo/widgets.js"></script>

  @yield('script')

  <script type="text/javascript">
    jQuery(document).ready(function() {

      "use strict";

      // Init Demo JS
      Demo.init();


      // Init Theme Core
      Core.init();


      // Init Widget Demo JS
      // demoHighCharts.init();

      // Because we are using Admin Panels we use the OnFinish
      // callback to activate the demoWidgets. It's smoother if
      // we let the panels be moved and organized before
      // filling them with content from various plugins

      // Init plugins used on this page
      // HighCharts, JvectorMap, Admin Panels

      // Init Admin Panels on widgets inside the ".admin-panels" container
      $('.admin-panels').adminpanel({
        grid: '.admin-grid',
        draggable: true,
        preserveGrid: true,
        // mobile: true,
        onStart: function() {
          // Do something before AdminPanels runs
        },
        onFinish: function() {
          $('.admin-panels').addClass('animated fadeIn').removeClass('fade-onload');

          // Init the rest of the plugins now that the panels
          // have had a chance to be moved and organized.
          // It's less taxing to organize empty panels
          demoHighCharts.init();
          runVectorMaps(); // function below
        },
        onSave: function() {
          $(window).trigger('resize');
        }
      });


      // Init plugins for ".calendar-widget"
      // plugins: FullCalendar
      //
      $('#calendar-widget').fullCalendar({
        // contentHeight: 397,
        editable: true,
        events: [{
            title: 'Sony Meeting',
            start: '2015-05-1',
            end: '2015-05-3',
            className: 'fc-event-success',
          }, {
            title: 'Conference',
            start: '2015-05-11',
            end: '2015-05-13',
            className: 'fc-event-warning'
          }, {
            title: 'Lunch Testing',
            start: '2015-05-21',
            end: '2015-05-23',
            className: 'fc-event-primary'
          },
        ],
        eventRender: function(event, element) {
          // create event tooltip using bootstrap tooltips
          $(element).attr("data-original-title", event.title);
          $(element).tooltip({
            container: 'body',
            delay: {
              "show": 100,
              "hide": 200
            }
          });
          // create a tooltip auto close timer
          $(element).on('show.bs.tooltip', function() {
            var autoClose = setTimeout(function() {
              $('.tooltip').fadeOut();
            }, 3500);
          });
        }
      });


      // Init plugins for ".task-widget"
      // plugins: Custom Functions + jQuery Sortable
      //
      var taskWidget = $('div.task-widget');
      var taskItems = taskWidget.find('li.task-item');
      var currentItems = taskWidget.find('ul.task-current');
      var completedItems = taskWidget.find('ul.task-completed');

      // Init jQuery Sortable on Task Widget
      taskWidget.sortable({
        items: taskItems, // only init sortable on list items (not labels)
        handle: '.task-menu',
        axis: 'y',
        connectWith: ".task-list",
        update: function( event, ui ) {
          var Item = ui.item;
          var ParentList = Item.parent();

          // If item is already checked move it to "current items list"
          if (ParentList.hasClass('task-current')) {
              Item.removeClass('item-checked').find('input[type="checkbox"]').prop('checked', false);
          }
          if (ParentList.hasClass('task-completed')) {
              Item.addClass('item-checked').find('input[type="checkbox"]').prop('checked', true);
          }

        }
      });

      // Custom Functions to handle/assign list filter behavior
      taskItems.on('click', function(e) {
        e.preventDefault();
        var This = $(this);
        var Target = $(e.target);

        if (Target.is('.task-menu') && Target.parents('.task-completed').length) {
          This.remove();
          return;
        }

        if (Target.parents('.task-handle').length) {
  		      // If item is already checked move it to "current items list"
  		      if (This.hasClass('item-checked')) {
  		        This.removeClass('item-checked').find('input[type="checkbox"]').prop('checked', false);
  		      }
  		      // Otherwise move it to the "completed items list"
  		      else {
  		        This.addClass('item-checked').find('input[type="checkbox"]').prop('checked', true);
  		      }
        }

      });


      var highColors = [bgSystem, bgSuccess, bgWarning, bgPrimary];

      // Chart data
      var seriesData = [{
        name: 'Phones',
        data: [5.0, 9, 17, 22, 19, 11.5, 5.2, 9.5, 11.3, 15.3, 19.9, 24.6]
      }, {
        name: 'Notebooks',
        data: [2.9, 3.2, 4.7, 5.5, 8.9, 12.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
      }, {
        name: 'Desktops',
        data: [15, 19, 22.7, 29.3, 22.0, 17.0, 23.8, 19.1, 22.1, 14.1, 11.6, 7.5]
      }, {
        name: 'Music Players',
        data: [11, 6, 5, 15, 17.0, 22.0, 30.8, 24.1, 14.1, 11.1, 9.6, 6.5]
      }];

      var ecomChart = $('#ecommerce_chart1');
      if (ecomChart.length) {
        ecomChart.highcharts({
          credits: false,
          colors: highColors,
          chart: {
            backgroundColor: 'transparent',
            className: '',
            type: 'line',
            zoomType: 'x',
            panning: true,
            panKey: 'shift',
            marginTop: 45,
            marginRight: 1,
          },
          title: {
            text: null
          },
          xAxis: {
            gridLineColor: '#EEE',
            lineColor: '#EEE',
            tickColor: '#EEE',
            categories: ['Jan', 'Feb', 'Mar', 'Apr',
              'May', 'Jun', 'Jul', 'Aug',
              'Sep', 'Oct', 'Nov', 'Dec'
            ]
          },
          yAxis: {
            min: 0,
            tickInterval: 5,
            gridLineColor: '#EEE',
            title: {
              text: null,
            }
          },
          plotOptions: {
            spline: {
              lineWidth: 3,
            },
            area: {
              fillOpacity: 0.2
            }
          },
          legend: {
            enabled: true,
            floating: false,
            align: 'right',
            verticalAlign: 'top',
            x: -15
          },
          series: seriesData
        });
      }

      // Widget VectorMap
      function runVectorMaps() {

        // Jvector Map Plugin
        var runJvectorMap = function() {
          // Data set
          var mapData = [900, 700, 350, 500];
          // Init Jvector Map
          $('#WidgetMap').vectorMap({
            map: 'us_lcc_en',
            //regionsSelectable: true,
            backgroundColor: 'transparent',
            series: {
              markers: [{
                attribute: 'r',
                scale: [3, 7],
                values: mapData
              }]
            },
            regionStyle: {
              initial: {
                fill: '#E8E8E8'
              },
              hover: {
                "fill-opacity": 0.3
              }
            },
            markers: [{
              latLng: [37.78, -122.41],
              name: 'San Francisco,CA'
            }, {
              latLng: [36.73, -103.98],
              name: 'Texas,TX'
            }, {
              latLng: [38.62, -90.19],
              name: 'St. Louis,MO'
            }, {
              latLng: [40.67, -73.94],
              name: 'New York City,NY'
            }],
            markerStyle: {
              initial: {
                fill: '#a288d5',
                stroke: '#b49ae0',
                "fill-opacity": 1,
                "stroke-width": 10,
                "stroke-opacity": 0.3,
                r: 3
              },
              hover: {
                stroke: 'black',
                "stroke-width": 2
              },
              selected: {
                fill: 'blue'
              },
              selectedHover: {}
            },
          });
          // Manual code to alter the Vector map plugin to
          // allow for individual coloring of countries
          var states = ['US-CA', 'US-TX', 'US-MO',
            'US-NY'
          ];
          var colors = [bgInfo, bgPrimaryLr, bgSuccessLr, bgWarningLr];
          var colors2 = [bgInfo, bgPrimary, bgSuccess, bgWarning];
          $.each(states, function(i, e) {
            $("#WidgetMap path[data-code=" + e + "]").css({
              fill: colors[i]
            });
          });
          $('#WidgetMap').find('.jvectormap-marker')
            .each(function(i, e) {
              $(e).css({
                fill: colors2[i],
                stroke: colors2[i]
              });
            });
        }

        if ($('#WidgetMap').length) {
          runJvectorMap();
        }
      }

    });
  </script>
  <!-- END: PAGE SCRIPTS -->

</body>

</html>
