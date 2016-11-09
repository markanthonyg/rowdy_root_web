@extends('layouts.dashboard.master')

@section('title')
  EMRS Online | New Clinic
@endsection

@section('style')
  <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css">

  <!-- Admin Forms CSS -->
  <link rel="stylesheet" type="text/css" href="assets/admin-tools/admin-forms/css/admin-forms.css">

@endsection

@section('breadcrumb')
  <li class="crumb-active">
    <a href="/patients">Clinics</a>
  </li>
  <li class="crumb-icon">
    <a href="/">
      <span class="glyphicon glyphicon-home"></span>
    </a>
  </li>
  <li class="crumb-link">
    <a href="/new_clinic">New Clinic</a>
  </li>

@endsection

@section('content')
  <!-- begin: .tray-center -->

  <div class="tray tray-center">
    <div class="form-group">
      <div class="admin-form theme-primary mw1000 center-block">
        <div class="panel heading-border">
          {{-- <form method="post" action="/" id="newClinicForm"> --}}
            {!! Form::open(['action' => 'Dashboard\ClinicController@insertClinic', 'id' => 'admin-form', 'method' => 'post']) !!}
            <div class="panel-body bg-light">

              {{-- Show registration error message --}}
              @if(Session::has('clinic_validation_messages'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{Session::get('clinic_validation_messages')}}
                </div>

                <!--
                <div class="alert alert-danger alert-lg fade in">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  {{ Session::get('clinic_validation_messages') }}
                </div>
                -->
              @endif

              <div class="section-divider mt20 mb40">
                <span> Add a Clinic </span>
              </div>
              <div class="section row">
                <div class="col-md-4">
                  <label for="clinicName" class="field prepend-icon">
                    {!! Form::text('clinicName', '', ['placeholder' => 'Name of clinic', 'class' => 'gui-input', 'name' => 'clinicName', 'id' => 'clinicName']) !!}
                    <label for="clinicName" class="field-icon">
                      <i class="fa fa-hospital-o"></i>
                    </label>
                  </label>
                </div>
              </div>
              <div class="panel-footer text-right">
                <button type="submit" class="button btn-primary"> Add Clinic </button>
              </div>
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

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

@endsection
