@extends('layouts.dashboard.master')

@section('title')
  EMRS Online | New Vital
@endsection

@section('style')
  <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css">

  <!-- Admin Forms CSS -->
  <link rel="stylesheet" type="text/css" href="assets/admin-tools/admin-forms/css/admin-forms.css">

@endsection

@section('breadcrumb')
  <li class="crumb-active">
    <a href="/patient_profile">What is this? It used to say Patients</a>
  </li>
  <li class="crumb-icon">
    <a href="/">
      <span class="glyphicon glyphicon-home"></span>
    </a>
  </li>
  <li class="crumb-link">
    <a href="/new_vital">New Vital</a>
  </li>

@endsection

@section('content')

  <!-- begin: .tray-center -->
  <div class="tray tray-center">
    <div class="form-group">
    <div class="admin-form theme-primary mw1000 center-block">
      <div class="panel heading-border">
        {{-- <form method="post" action="/" id="newVitalForm"> --}}
        {!! Form::open(['action' => 'Dashboard\VitalsController@insertVital', 'id' => 'admin-form', 'method' => 'post']) !!}
          <div class="panel-body bg-light">
            <div class="section-divider mt20 mb40">
              <span> Add a new vital </span>
            </div>
              <div class="section row"  > <!-- BLOOD PRESSURE  ROW -->
                <div class="col-md-4">
                  <label for="BPS" class="field prepend-icon">
                    {!! Form::text('bps', '', ['placeholder' => 'BP Systolic...', 'class' => 'gui-input', 'name' => 'bps', 'id' => 'bps']) !!}
                    <label for="BPS" class="field-icon">
                      <i class="fa fa-user"></i>
                    </label>
                  </label>
                </div>
                <div class="col-md-4">
                  <label for="BPD" class="field prepend-icon">
                    {!! Form::text('bpd', '', ['placeholder' => 'BP Diastolic...', 'class' => 'gui-input', 'name' => 'bpd', 'id' => 'bpd']) !!}
                    <label for="BPD" class="field-icon">
                      <i class="fa fa-user"></i>
                    </label>
                  </label>
                </div>
              </div>
              <div class="section"> <!-- need to modify schema in DB so saves as string, not double-->
                <label class="field select">
                  {{ Form::select('bpunit', array(
                      'mmHg' => '1',
                      'Pa' => '2'),
                      '',
                      ['id' => 'bpunit']
                  ) }}
                  <i class="arrow double"></i>
                </label>
              </div>
              <div class="section row"> <!-- BLOOD GLUCOSE ROW -->
                <div class="col-md-4"> <!-- need to modify schema in DB so saves as string, not double-->
                  <label class="field select">
                    {{ Form::select('fasting', array(
                        'Yes' => '1',
                        'No' => '0'),
                        '',
                        ['id' => 'fasting']
                    ) }}
                    <i class="arrow double"></i>
                  </label>
                </div>
                <div class ="col-md-4">
                  <label for="bg" class="field prepend-icon">
                    {!! Form::text('bg', '', ['placeholder' => 'Enter Blood Glucose Value...', 'class' => 'gui-input', 'name' => 'bg', 'id' => 'bg']) !!}
                    <label for="bg" class="field-icon">
                      <i class="fa fa-tint"></i>
                    </label>
                  </label>
                </div>
                <div class="col-md-4"> <!-- need to modify schema in DB so saves as string, not double--> <!-- COLUM or section???? -->
                  <label class="field select">
                    {{ Form::select('bgUnit', array(
                        'mg/dL' => '1',
                        'mmol/L' => '2'),
                        '',
                        ['id' => 'bgUnit']
                    ) }}
                    <i class="arrow double"></i>
                  </label>
                </div>
              </div>
              <div class="section row"> <!-- O2 AND HB ROW -->
                <div class="col-md-6">
                  <label for="o2sat" class="field prepend-icon"> <!-- I WANT TO HAVE % APPENDED IN INPUT FIELD -->
                    {!! Form::text('o2sat', '', ['placeholder' => 'O2 Saturation %...', 'class' => 'gui-input', 'name' => 'o2sat', 'id' => 'o2sat']) !!}
                    <label for="o2sat" class="field-icon">
                      <i class="fa fa-map-marker"></i>
                    </label>
                  </label>
                </div>
                <div class="col-md-6">
                  <label for="hb" class="field prepend-icon">
                    {!! Form::text('hb', '', ['placeholder' => 'Hemoglobin...', 'class' => 'gui-input', 'name' => 'hb', 'id' => 'hb']) !!}
                    <label for="hb" class="field-icon">
                      <i class="fa fa-map-marker"></i>
                    </label>
                  </label>
                </div>
              </div>
              <div class="section row"> <!-- HEIGHT, WOULDN'T IT BE NICE TO BE ABLE TO CONVERT FROM ENGLISH TO METRIC, VISAVERSA AND PUSH BOTH VALUES orsomething-->
                <div class="col-md-3">
                  <label for="hfeet" class="field prepend-icon">
                    {!! Form::text('hfeet', '', ['placeholder' => 'Height, feet...', 'class' => 'gui-input', 'name' => 'hfeet', 'id' => 'hfeet']) !!}
                    <label for="hfeet" class="field-icon">
                      <i class="fa fa-map-marker"></i>
                    </label>
                  </label>
                </div>
                <div class="col-md-3">
                  <label for="hinches" class="field prepend-icon">
                    {!! Form::text('hinches', '', ['placeholder' => 'Height, inches...', 'class' => 'gui-input', 'name' => 'hinches', 'id' => 'hinches']) !!}
                    <label for="hinches" class="field-icon">
                      <i class="fa fa-map-marker"></i>
                    </label>
                  </label>
                </div>
                <div class="col-md-3">
                  <label for="hcm" class="field prepend-icon">
                    {!! Form::text('hcm', '', ['placeholder' => 'Height, cm...', 'class' => 'gui-input', 'name' => 'hcm', 'id' => 'hcm']) !!}
                    <label for="hcm" class="field-icon">
                      <i class="fa fa-map-marker"></i>
                    </label>
                  </label>
                </div>
              </div>
              <div class="section row"> <!-- WEIGHT, WOULDN'T IT BE NICE TO BE ABLE TO CONVERT FROM ENGLISH TO METRIC, VISAVERSA AND PUSH BOTH VALUES orsomething-->
                <div class="col-md-3">
                  <label for="weight" class="field prepend-icon">
                    {!! Form::text('weight', '', ['placeholder' => 'Weight...', 'class' => 'gui-input', 'name' => 'weight', 'id' => 'weight']) !!}
                    <label for="weight" class="field-icon">
                      <i class="fa fa-map-marker"></i>
                    </label>
                  </label>
                </div>
                <div class="col-md-3"> <!--  -->
                  <label class="field select">
                    {{ Form::select('wunit', array(
                        'lbs' => 'lbs',
                        'kg' => 'kg'),
                        '',
                        ['id' => 'wunit']
                    ) }}
                    <i class="arrow double"></i>
                  </label>
                </div>
              </div>
              <div class="section"> <!-- NOTES -->
                <label for="notes" class="field prepend-icon">
                  {!! Form::text('notes', '', ['placeholder' => 'Additional Notes...', 'class' => 'gui-input', 'name' => 'notes', 'id' => 'notes']) !!}
                  <label for="notes" class="field-icon">
                    <i class="fa fa-mobile"></i>
                  </label>
                </label>
              </div>
            </div>
            <div class="panel-footer text-right">
              <button type="submit" class="button btn-primary"> Add Vitals </button>
            </div>
          </div>
        </div>
      </div>
      {{-- </form> --}}
      {!! Form::close() !!}
    </div>

@endsection

@section('script')
<!-- jQuery -->
<script src="vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

<!-- jQuery Validate Plugin-->
<script src="assets/admin-tools/admin-forms/js/jquery.validate.min.js"></script>

<!-- jQuery Validate Addon -->
<script src="assets/admin-tools/admin-forms/js/additional-methods.min.js"></script>

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
