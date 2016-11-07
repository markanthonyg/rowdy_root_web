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
  <li class="crumb-active">
    <a href="/clinics">Clinics</a>
  </li>
  <li class="crumb-icon">
    <a href="/">
      <span class="glyphicon glyphicon-home"></span>
    </a>
  </li>
  <li class="crumb-link">
    <a href="/clinics">Clinics</a>
  </li>

@endsection

@section('content')
  <p>Simple show clinics page</p>
  <!-- begin: .tray-center -->
  <div class="tray tray-center">

    {{-- ADD BUTTONS --}}
    <div class="col-md-4 hidden">
      <a href="/new_clinic" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Add Clinic</a>
    </div>

    {{-- <br /><br /><br /> --}}
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
@endsection
