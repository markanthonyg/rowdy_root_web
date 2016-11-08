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
  <!-- begin: .tray-center -->
  <div class="tray tray-center">

    {{-- ADD BUTTONS --}}
    <div class="col-md-4 hidden">
      <a href="/new_clinic" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Add Clinic</a>
    </div>

    {{-- <br /><br /><br /> --}}

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
                <th>Clinic Name</th>
                <th>Phone Number</th>
              </tr>
            </thead>
            <tbody>
              @foreach($clinics as $clinic)
                <tr class="clickable-row" data-url="#">
                  <td>{{ $clinic->Name }}</td>
                  <td>123-456-7890</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
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
