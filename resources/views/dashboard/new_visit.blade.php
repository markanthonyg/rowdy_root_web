@extends('layouts.dashboard.master')

@section('title')
  New Patient
@endsection

@section('style')
  <!-- Admin Forms CSS -->
  <link rel="stylesheet" type="text/css" href="assets/admin-tools/admin-forms/css/admin-forms.css">
  <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css">

  {{ Html::style('css/new_visit.css') }}
@endsection

@section('breadcrumb')
  <li class="crumb-active">
    <a href="#">Visits</a>
  </li>
  <li class="crumb-icon">
    <a href="/">
      <span class="glyphicon glyphicon-home"></span>
    </a>
  </li>
  <li class="crumb-link">
    <a href="/new_visit">New Visit</a>
  </li>
@endsection

@section('content')
  <!-- begin: .tray-center -->
  <div class="tray tray-center">
    <div class="form-group">
    <div class="admin-form theme-primary mw1000 center-block">
      {{-- FORM BEGIN --}}
      {!! Form::open(['action' => 'Dashboard\VisitsController@insertVisit', 'id' => 'admin-form', 'method' => 'post']) !!}

      {{-- Begin panels --}}
      {{-- Row 1: Patient and demographics --}}
      <div class="row">
        <div class="col-md-4">
          <div class="panel heading-border">
            <div class="panel-body bg-light">
              <div class="section-divider mt20 mb40">
                <span> Patient </span>
              </div>
              <div class="row">
                {!! Form::select('patient', ['1' => 'jacob'], null, ['placeholder' => '---  Select Patient  ---', 'class' => 'form-control']) !!}
              </div>
              <div class="row">
                <input type="checkbox" name="new_patient"> New Patient
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="panel heading-border">
            <div class="panel-body bg-light">
              <div class="section-divider mt20 mb40">
                <span> Demographics </span>
              </div>
              <div class="row">
                <div class="col-md-2 vcenter">
                  First Name
                </div>
                <div class="col-md-10">
                  {!! Form::text('demo_firstname', '', ['value' => 'blahblah', 'class' => 'gui-input', 'name' => 'demo_firstname', 'id' => 'demo_firstname']) !!}
                </div>
              </div>
              <br />
              <div class="row">
                <div class="col-md-2 vcenter">
                  Last Name
                </div>
                <div class="col-md-10">
                  {!! Form::text('demo_lastname', '', ['value' => 'blahblah', 'class' => 'gui-input', 'name' => 'demo_lastname', 'id' => 'demo_lastname']) !!}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- Row 2: Chief complaint --}}
      <div class="row">
        <div class="col-md-12">
          <div class="panel heading-border">
            <div class="panel-body bg-light">
              <div class="section-divider mt20 mb40">
                <span> Cheif Complaint </span>
              </div>
              <div class="row">
                {!! Form::textarea('chief_complaint', '', ['id' => 'chief_complaint']) !!}
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- Row 3: Distance Vision --}}
      <div class="row">
        <div class="col-md-3">
          <div class="panel heading-border">
            <div class="panel-body bg-light">
              <div class="section-divider mt20 mb40">
                <span> Vision (Glasses) </span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="panel heading-border">
            <div class="panel-body bg-light">
              <div class="section-divider mt20 mb40">
                <span> Vision (No Glasses) </span>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- FORM: SUBMIT --}}
      <div class="row">
        <div class="col-md-12">
          <button type="submit" class="btn btn-block btn-lg btn-primary"> Submit Visit </button>
        </div>
      </div>

      {{-- FORM: CLOSE --}}
      {!! Form::close() !!}
    </div>
    </div>
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
  <script src="assets/js/main.js"></script>
@endsection
