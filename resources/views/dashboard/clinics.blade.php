@extends('layouts.dashboard.master')

@section('title')
  EMRS Online | Clinics
@endsection

@section('style')
  <!-- Datatables CSS -->
  <link rel="stylesheet" type="text/css" href="vendor/plugins/datatables/media/css/dataTables.bootstrap.css">

  <!-- Datatables Editor Addon CSS -->
  <link rel="stylesheet" type="text/css" href="vendor/plugins/datatables/extensions/Editor/css/dataTables.editor.css">

  <!-- Datatables ColReorder Addon CSS -->
  <link rel="stylesheet" type="text/css" href="vendor/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css">

  <!-- CSS For clickable row -->
  {{ Html::style('css/clickable_row.css') }}
@endsection

@section('breadcrumb')
  <li class="crumb-icon">
    <a href="/">
      <span class="glyphicon glyphicon-home"></span>
    </a>
  </li>
  <li class="crumb-active">
    <a href="/clinics">Clinics</a>
  </li>

@endsection

@section('content')
  <!-- begin: .tray-center -->
  <div class="tray tray-center">

    {{-- ADD BUTTONS --}}
    <div class="col-md-4 hidden">
      <a href="/new_clinic" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Add Clinic</a>
    </div>

    {{-- <br /><br /><br /> --}}

    <div class="col-md-12">
      <button class="btn btn-primary" id="addClinicBtn" style="float: left;margin: 10px; "><i class="fa fa-plus fa-lg"></i> Add Clinic </button>
    </div>

    {{-- SAMPLE TABLE --}}
    <div class="col-md-12">
      <div class="panel panel-visible" id="spy2">
        <div class="panel-heading">
          <div class="panel-title hidden-xs">
            <span class="glyphicon glyphicon-tasks"></span>Clinics</div>
        </div>
        <div class="panel-body pn">
          <table class="table table-hover" id="datatable2" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>Clinic Name</th>
              </tr>
            </thead>
            <tbody>
              @foreach($clinics as $clinic)
                <tr class="clickable-row" data-url="#">
                  <td>{{ $clinic->id }}</td>
                  <td>{{ $clinic->Name }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div>
    <div class="modal fade" id="myModal" style="padding:0;">
      <div class="modal-dialog" style="padding:0;">
        <div class="modal-content" style="padding:0;">
          <div class="modal-header" style="padding:0;">
            <div class="header panel-footer text-right">
              <a href="#" id="test" class="fa fa-times fa-2x" data-dismiss="modal"></a>
            </div>
          </div>
          <div class="modal-body" style="padding:0;">
            <div class="tray tray-center">
              <div class="form-group">
              <div class="admin-form theme-primary mw1000 center-block" style="border:none;">
                <div class="panel heading-border">
                  {{-- <form method="post" action="/" id="insertClinicForm"> --}}
                  {!! Form::open(['action' => 'Dashboard\ClinicController@updateClinic', 'id' => 'admin-form', 'method' => 'post']) !!}
                    {!! Form::hidden('id', '', ['class' => 'gui-input', 'name' => 'id', 'id' => 'id']) !!}
                    <div class="panel-body bg-light">
                      <div class="section-divider mt20 mb40">
                        <span id="modalTitle">Add new clinic details</span>
                      </div>
                      <div class="section row">
                        <div class="col-md-12">
                          <label for="clinicName" class="field prepend-icon">
                            {!! Form::text('clinicName', '', ['placeholder' => 'Name of clinic', 'class' => 'gui-input', 'name' => 'clinicName', 'id' => 'clinicName']) !!}
                            <label for="clinicName" class="field-icon">
                              <i class="fa fa-hospital-o"></i>
                            </label>
                          </label>
                        </div>
                      </div>
                      <div class="panel-footer text-right">
                        <button type="submit" class="btn btn-primary" name="action" value="Add" id="Add" style="margin-right: 5px;"> Add Clinic</button>
                        <button type="submit" class="btn btn-primary" name="action" value="Update" id="Update" style="margin-right: 5px;"> Save</button>
                        <button type="submit" class="btn btn-danger" name="action" value="Delete" id="Delete"> Delete</button>
                      </div>
                    </div>
                  </div>
                </div>
                {{-- </form> --}}
                {!! Form::close() !!}
              </div>
          </div>
          <div class="modal-footer" style="padding:0;">

          </div><!-- /.modal-footer-->
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  </div>
@endsection
@section('script')

  <!-- Datatables -->
  <script src="{{ URL::asset('vendor/plugins/datatables/media/js/jquery.dataTables.js')}}"></script>

  <!-- Datatables Tabletools addon -->
  <script src="{{ URL::asset('vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js')}}"></script>

  <!-- Datatables ColReorder addon -->
  <script src="{{ URL::asset('vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js')}}"></script>

  <!-- Datatables Bootstrap Modifications  -->
  <script src="{{ URL::asset('vendor/plugins/datatables/media/js/dataTables.bootstrap.js')}}"></script>

  <!-- jQuery Validate Plugin-->
  <script src="{{ URL::asset('assets/admin-tools/admin-forms/js/jquery.validate.min.js')}}"></script>

  <!-- jQuery Validate Addon -->
  <script src="{{ URL::asset('assets/admin-tools/admin-forms/js/additional-methods.min.js')}}"></script>

  <!-- Bootstrap Date-Picker Plugin -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>


  <script>
    jQuery(document).ready(function(){
      var date_input=$('input[name="dob"]');
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
  </script>

  <script>
  $(document).ready(function () {
    $('#addClinicBtn').on('click',function(){
      $('#Delete').hide();
      $('#Update').hide();
      $('#Add').show();
      $('#modalTitle').text('Add new clinic details');
      $("#myModal").modal("show");
    });
  });
  </script>

  <script>
  $(document).ready(function () {
    $('table tbody td').on('click',function(){
      $("#myModal").modal("show");
      $('#Delete').show();
      $('#Update').show();
      $('#Add').hide();
      $('#modalTitle').text('Edit clinic details');
      $("#id").val($(this).closest('tr').children()[0].textContent);
      $("#clinicName").val($(this).closest('tr').children()[1].textContent);
    });
  });
  </script>

  <script type="text/javascript">
   jQuery(document).ready(function() {
     // Make rows clickable with 'clickable-row' class
     $('.clickable-row').click(function() {
         window.location = $(this).data('url');
     });
     // Init DataTables
     $('#datatable').dataTable({
       "sDom": 't<"dt-panelfooter clearfix"ip>',
       "oTableTools": {
         "sSwfPath": "vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
       }
     });
     $('#datatable2').dataTable({
       "aoColumnDefs": [{
         'bSortable': false,
         'aTargets': []
       }],
       "oLanguage": {
         "oPaginate": {
           "sPrevious": "",
           "sNext": ""
         }
       },
       "iDisplayLength": 10,
       "aLengthMenu": [
         [5, 10, 25, 50, -1],
         [5, 10, 25, 50, "All"]
       ],
       "sDom": '<"dt-panelmenu clearfix"lfr>t<"dt-panelfooter clearfix"ip>',
       "oTableTools": {
         "sSwfPath": "vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
       }
     });
     // MISC DATATABLE HELPER FUNCTIONS
     // Add Placeholder text to datatables filter bar
     $('.dataTables_filter input').attr("placeholder", "Search...");
   });
 </script>

  <!-- Theme Javascript -->
  <script src="assets/js/utility/utility.js"></script>
  <!--<script src="assets/js/demo/demo.js"></script>-->
  <script src="assets/js/main.js"></script>
  <script type="text/javascript">
  jQuery(document).ready(function() {
    "use strict";

    // Init Theme Core
    // Core.init();

    // Init Demo JS
    //Demo.init();

    /* @custom validation method (smartCaptcha)
    ------------------------------------------------------------------ */

    $.validator.methods.smartCaptcha = function(value, element, param) {
      return value == param;
    };

    $("#admin-form").validate({

      /* @validation states + elements
      ------------------------------------------- */

      errorClass: "state-error",
      validClass: "state-success",
      errorElement: "em",

      /* @validation rules
      ------------------------------------------ */

      rules: {
        firstname: {
          required: true
        },
        country: {
          required: true
        },
        city: {
          required: true
        },
        state: {
          required: true
        },
        birthyear: {
          required: true
        },
        useremail: {
          required: true,
          email: true
        },
        website: {
          required: true,
          url: true
        },
        upload1: {
          required: true,
          extension: "jpg|png|gif|jpeg|doc|docx|pdf|xls|rar|zip"
        },
        mobileos: {
          required: true
        },
        comment: {
          required: true,
          minlength: 30
        },
        mobile_phone: {
          require_from_group: [1, ".phone-group"]
        },
        home_phone: {
          require_from_group: [1, ".phone-group"]
        },
        password: {
          required: true,
          minlength: 6,
          maxlength: 16
        },
        repeatPassword: {
          required: true,
          minlength: 6,
          maxlength: 16,
          equalTo: '#password'
        },
        gender: {
          required: true
        },
        role: {
          required: true
        },
        languages: {
          required: true
        },
        verification: {
          required: true,
          smartCaptcha: 19
        },
        applicant_age: {
          required: true,
          min: 16
        },
        licence_no: {
          required: function(element) {
            return $("#applicant_age").val() > 19;
          }
        },
        child_name: {
          required: "#parents:checked"
        }

      },

      /* @validation error messages
      ---------------------------------------------- */

      messages: {
        firstname: {
          required: 'Enter first name or alias if unkown'
        },
        country: {
          required: 'Enter country'
        },
        city: {
          required: 'Enter city/village'
        },
        state: {
          required: 'Enter state/province'
        },
        birthyear: {
          required: 'Enter birth year or estimated birth year'
        },
        useremail: {
          required: 'Enter email address',
          email: 'Enter a VALID email address'
        },
        website: {
          required: 'Enter your website URL',
          url: 'URL should start with - http://www'
        },
        gender: {
          required: 'Choose a gender'
        },
        role: {
          required: 'Choose a role'
        },
        upload1: {
          required: 'Please browse a file',
          extension: 'File format not supported'
        },
        mobileos: {
          required: 'Please select a mobile platform'
        },
        comment: {
          required: 'Oops you forgot to comment',
          minlength: 'Enter at least 30 characters or more'
        },
        mobile_phone: {
          require_from_group: 'Fill at least a mobile contact'
        },
        home_phone: {
          require_from_group: 'Fill at least a home contact'
        },
        password: {
          required: 'Please enter a password'
        },
        repeatPassword: {
          required: 'Please repeat the above password',
          equalTo: 'Password mismatch detected'
        },
        gender: {
          required: 'Please choose gender'
        },
        languages: {
          required: 'Select laguages spoken'
        },
        verification: {
          required: 'Please enter verification code',
          smartCaptcha: 'Oops - enter a correct verification code'
        },
        applicant_age: {
          required: 'Enter applicant age',
          min: 'Must be 16 years and above'
        },
        licence_no: {
          required: 'Enter licence number'
        },
        child_name: {
          required: 'Please enter your childs name'
        }

      },

      /* @validation highlighting + error placement
      ---------------------------------------------------- */

      highlight: function(element, errorClass, validClass) {
        $(element).closest('.field').addClass(errorClass).removeClass(validClass);
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).closest('.field').removeClass(errorClass).addClass(validClass);
      },
      errorPlacement: function(error, element) {
        if (element.is(":radio") || element.is(":checkbox")) {
          element.closest('.option-group').after(error);
        } else {
          error.insertAfter(element.parent());
        }
      }

    });
    // Cache several DOM elements
    var pageHeader = $('.content-header').find('b');
    var adminForm = $('.admin-form');
    var options = adminForm.find('.option');
    var switches = adminForm.find('.switch');
    var buttons = adminForm.find('.button');
    var Panel = adminForm.find('.panel');

    // Form Skin Switcher
    $('#skin-switcher a').on('click', function() {
      var btnData = $(this).data('form-skin');

      $('#skin-switcher a').removeClass('item-active');
      $(this).addClass('item-active')

      adminForm.each(function(i, e) {
        var skins = 'theme-primary theme-info theme-success theme-warning theme-danger theme-alert theme-system theme-dark'
        var panelSkins = 'panel-primary panel-info panel-success panel-warning panel-danger panel-alert panel-system panel-dark'
        $(e).removeClass(skins).addClass('theme-' + btnData);
        Panel.removeClass(panelSkins).addClass('panel-' + btnData);
        pageHeader.removeClass().addClass('text-' + btnData);
      });

      $(options).each(function(i, e) {
        if ($(e).hasClass('block')) {
          $(e).removeClass().addClass('block mt15 option option-' + btnData);
        } else {
          $(e).removeClass().addClass('option option-' + btnData);
        }
      });

      // var sliders = $('.ui-timepicker-div', adminForm).find('.ui-slider');
      $('body').find('.ui-slider').each(function(i, e) {
        $(e).addClass('slider-primary');
      });

      $(switches).each(function(i, ele) {
        if ($(ele).hasClass('switch-round')) {
          if ($(ele).hasClass('block')) {
            $(ele).removeClass().addClass('block mt15 switch switch-round switch-' + btnData);
          } else {
            $(ele).removeClass().addClass('switch switch-round switch-' + btnData);
          }
        } else {
          if ($(ele).hasClass('block')) {
            $(ele).removeClass().addClass('block mt15 switch switch-' + btnData);
          } else {
            $(ele).removeClass().addClass('switch switch-' + btnData);
          }
        }

      });
      buttons.removeClass().addClass('button btn-' + btnData);
    });

    setTimeout(function() {
      adminForm.addClass('theme-primary');
      Panel.addClass('panel-primary');
      pageHeader.addClass('text-primary');

      $(options).each(function(i, e) {
        if ($(e).hasClass('block')) {
          $(e).removeClass().addClass('block mt15 option option-primary');
        } else {
          $(e).removeClass().addClass('option option-primary');
        }
      });

      // var sliders = $('.ui-timepicker-div', adminForm).find('.ui-slider');
      $('body').find('.ui-slider').each(function(i, e) {
        $(e).addClass('slider-primary');
      });

      $(switches).each(function(i, ele) {
        if ($(ele).hasClass('switch-round')) {
          if ($(ele).hasClass('block')) {
            $(ele).removeClass().addClass('block mt15 switch switch-round switch-primary');
          } else {
            $(ele).removeClass().addClass('switch switch-round switch-primary');
          }
        } else {
          if ($(ele).hasClass('block')) {
            $(ele).removeClass().addClass('block mt15 switch switch-primary');
          } else {
            $(ele).removeClass().addClass('switch switch-primary');
          }
        }
      });
      buttons.removeClass().addClass('button btn-primary');
    }, 800);



  });
    </script>
      @endsection
