@extends('layouts.dashboard.master')

@section('title')
  EMRS Online | Dashboard
@endsection

@section('style')
  <!-- Datatables CSS -->
  <link rel="stylesheet" type="text/css" href="vendor/plugins/datatables/media/css/dataTables.bootstrap.css">

  <!-- Datatables Editor Addon CSS -->
  <link rel="stylesheet" type="text/css" href="vendor/plugins/datatables/extensions/Editor/css/dataTables.editor.css">

  <!-- Datatables ColReorder Addon CSS -->
  <link rel="stylesheet" type="text/css" href="vendor/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css">
@endsection

@section('breadcrumb')
  <li class="crumb-active">
    <a href="/">Home</a>
  </li>
@endsection

@section('content')

  <!-- begin: .tray-center -->
  <div class="tray tray-center">

    {{-- Dashboard Tiles --}}
    <div class="row">
      <div class="col-sm-4 col-xl-3">
        <div class="panel panel-tile text-center br-a br-grey">
          <div class="panel-body">
            <h1 class="fs30 mt5 mbn">{{ $num_patients }}</h1>
            <h6 class="text-system">PATIENTS</h6>
          </div>
          <div class="panel-footer br-t p12">
            <span class="fs11">
              <i class="fa fa-arrow-up pr5"></i> -% INCREASE
              <b>1W AGO</b>
            </span>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-xl-3">
        <div class="panel panel-tile text-center br-a br-grey">
          <div class="panel-body">
            <h1 class="fs30 mt5 mbn">{{ $num_clinics }}</h1>
            <h6 class="text-success">CLINICS</h6>
          </div>
          <div class="panel-footer br-t p12">
            <span class="fs11">
              <i class="fa fa-arrow-up pr5"></i> -% INCREASE
              <b>1W AGO</b>
            </span>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-xl-3">
        <div class="panel panel-tile text-center br-a br-grey">
          <div class="panel-body">
            <h1 class="fs30 mt5 mbn">{{ $num_users }}</h1>
            <h6 class="text-warning">USERS</h6>
          </div>
          <div class="panel-footer br-t p12">
            <span class="fs11">
              <i class="fa fa-arrow-up pr5 text-success"></i> -% INCREASE
              <b>1W AGO</b>
            </span>
          </div>
        </div>
      </div>
      <div class="col-sm-3 col-xl-3 visible-xl">
        <div class="panel panel-tile text-center br-a br-grey">
          <div class="panel-body">
            <h1 class="fs30 mt5 mbn">{{ $num_visits }}</h1>
            <h6 class="text-danger">UNIQUE VISITS</h6>
          </div>
          <div class="panel-footer br-t p12">
            <span class="fs11">
              <i class="fa fa-arrow-down pr5 text-danger"></i> -% DECREASE
              <b>1W AGO</b>
            </span>
          </div>
        </div>
      </div>
  </div>
</div>



@endsection
