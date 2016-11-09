@extends('layouts.dashboard.master')

@section('title')
  EMRS Online | Patients
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

  {{ Html::style('css/accountList.css') }}
@endsection

@section('breadcrumb')
  <li class="crumb-active">
    <a href="/patients">Patients</a>
  </li>
  <li class="crumb-icon">
    <a href="/">
      <span class="glyphicon glyphicon-home"></span>
    </a>
  </li>
  <li class="crumb-link">
    <a href="/patients">Patients</a>
  </li>

@endsection

@section('content')

  <!-- begin: .tray-center -->
<div class="tray tray-center">

    {{-- ADD BUTTONS --}}
    <div class="col-md-4 hidden">
      <a href="/new_patient" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Add Patient</a>
    </div>

    {{-- <br /><br /><br /> --}}

    {{-- SAMPLE TABLE --}}
    <div class="col-md-12">
      <div class="panel panel-visible" id="spy2">
        <div class="panel-heading">
          <div class="panel-title hidden-xs">
            <span class="glyphicon glyphicon-tasks"></span>User Accounts</div>
        </div>
        <div class="panel-body pn">
          <table class="table table-hover" id="datatable2" cellspacing="0" width="100%">
            <thead>
              <tr>
                  <th>id</th>
                  <th>Firt Name</th>
                  <th>Middle Name</th>
                  <th>Last Name</th>
                  <th>Gender</th>
                  <th>DOB</th>
                  <th>Role</th>
                  <th>Eamil</th>
              </tr>
            </thead>
            @foreach($accounts as $account)
                <tr id="{{$account->id}}">
                    <td>{{$account->id}}</td>
                    <td>{{$account->first_name}}</td>
                    <td>{{$account->middle_name}}</td>
                    <td>{{$account->last_name}}</td>
                    <td>{{$account->gender}}</td>
                    <td>{{$account->dob}}</td>
                    <td>{{$account->role}}</td>
                    <td>{{$account->email}}</td>
                </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" style="padding:0;">
  <div class="modal-dialog" style="padding:0;">
    <div class="modal-content" style="padding:0;">
      <div class="modal-body" style="padding:0;">
        <div class="tray tray-center">
          <div class="form-group">
          <div class="admin-form theme-primary mw1000 center-block" style="border:none;">
            <div class="panel heading-border">
              {{-- <form method="post" action="/" id="newPatientForm"> --}}
              {!! Form::open(['action' => 'Dashboard\AccountController@updateAccount', 'id' => 'admin-form', 'method' => 'post']) !!}
                {!! Form::hidden('id', '', ['class' => 'gui-input', 'name' => 'id', 'id' => 'id']) !!}
                <div class="panel-body bg-light">
                  <div class="section-divider mt20 mb40">
                    <span>Edit user details</span>
                  </div>
                    <div class="section row"  >
                      <div class="col-md-4">
                        <label for="firstname" class="field prepend-icon">
                          {!! Form::text('firstname', '', ['placeholder' => 'First name...', 'class' => 'gui-input', 'name' => 'firstname', 'id' => 'firstname']) !!}
                          <label for="firstname" class="field-icon">
                            <i class="fa fa-user"></i>
                          </label>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label for="middlename" class="field prepend-icon">
                          {!! Form::text('middlename', '', ['placeholder' => 'Middle name...', 'class' => 'gui-input', 'name' => 'middlename', 'id' => 'middlename']) !!}
                          <label for="middlename" class="field-icon">
                            <i class="fa fa-user"></i>
                          </label>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label for="lastname" class="field prepend-icon">
                          {!! Form::text('lastname', '', ['placeholder' => 'Last name...', 'class' => 'gui-input', 'name' => 'lastname', 'id' => 'lastname']) !!}
                          <label for="lastname" class="field-icon">
                            <i class="fa fa-user"></i>
                          </label>
                        </label>
                      </div>
                    </div>
                    <div class="section row">
                      <div class="col-md-6">
                        <label class="field select">
                          {{ Form::select('role', array(
                              '' => 'Select a role...',
                              'sys_admin' => 'System Administrator',
                              'clinic_admin' => 'Clinic Administrator',
                              'emp' => 'Employee'),
                              '',
                              ['id' => 'role']
                          ) }}
                          <i class="arrow double"></i>
                        </label>
                      </div>
                      <div class ="col-md-6">
                        <label class="field select">
                          {{ Form::select('gender', array(
                              '' => 'Select a gender...',
                              'male' => 'Male',
                              'female' => 'Female'),
                              '',
                              ['id' => 'gender']
                          ) }}
                          <i class="arrow double"></i>
                        </div>
                    </div>
                    <div class="section row">
                      <div class ="col-md-6">
                        <label for="dob" class="field prepend-icon">
                          {!! Form::text('dob', '', ['placeholder' => 'Date of birth...', 'class' => 'gui-input', 'name' => 'dob', 'id' => 'dob']) !!}
                          <label for="dob" class="field-icon">
                            <i class="fa fa-birthday-cake"></i>
                          </label>
                        </label>
                      </div>
                      <div class="col-md-6">
                        <label for="address2" class="field prepend-icon">
                          {!! Form::text('email', '', ['placeholder' => 'Email...', 'class' => 'gui-input', 'name' => 'email', 'id' => 'email']) !!}
                          <label for="address2" class="field-icon">
                            <i class="fa fa-envelope"></i>
                          </label>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="panel-footer text-right">
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-right: 5px;">Close</button>
                    <button type="submit" class="btn btn-primary" name="action" value="Update" style="margin-right: 5px;"> Save</button>
                    <button type="submit" class="btn btn-danger" name="action" value="Delete" id="Delete" style="margin-right: 5px;"> Delete</button>
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
@endsection

@section('script')
  <!-- Datatables -->
  <script src="vendor/plugins/datatables/media/js/jquery.dataTables.js"></script>

  <!-- Datatables Tabletools addon -->
  <script src="vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>

  <!-- Datatables ColReorder addon -->
  <script src="vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>

  <!-- Datatables Bootstrap Modifications  -->
  <script src="vendor/plugins/datatables/media/js/dataTables.bootstrap.js"></script>

  <!-- jQuery Validate Plugin-->
  <script src="assets/admin-tools/admin-forms/js/jquery.validate.min.js"></script>

  <!-- jQuery Validate Addon -->
  <script src="assets/admin-tools/admin-forms/js/additional-methods.min.js"></script>

  <!-- Bootstrap Date-Picker Plugin -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>


  <script>
    $(document).ready(function(){
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
          'aTargets': [-1]
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

  <script>
  $(document).ready(function () {
    $('table tbody td').on('click',function(){
      $("#myModal").modal("show");
      $("#id").val($(this).closest('tr').children()[0].textContent);
      $("#firstname").val($(this).closest('tr').children()[1].textContent);
      $("#middlename").val($(this).closest('tr').children()[2].textContent);
      $("#lastname").val($(this).closest('tr').children()[3].textContent);
      $("#gender").val($(this).closest('tr').children()[4].textContent);
      $("#dob").val($(this).closest('tr').children()[5].textContent);
      $("#role").val($(this).closest('tr').children()[6].textContent);
      $("#email").val($(this).closest('tr').children()[7].textContent);
    });
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
