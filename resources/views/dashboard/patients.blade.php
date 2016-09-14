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
    <div class="col-md-4">
      <a href="#" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Add Patient</a>
    </div>

    <br /><br /><br />

    {{-- ADD TABLE --}}
    <div class="col-md-12">
      <div class="panel panel-visible" id="spy2">
        <div class="panel-heading">
          <div class="panel-title hidden-xs">
            <span class="glyphicon glyphicon-tasks"></span>Patients</div>
        </div>
        <div class="panel-body pn">
          <table class="table" id="datatable2" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Patient ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Phone Number</th>
              </tr>
            </thead>
            <tbody>
              @foreach($patients as $patient)
                @if($patient->unidentified_patient == 1)
                  <tr>
                    <td>{{ $patient->id }}</td>
                    <td>N/A</td>
                    <td>N/A</td>
                    <td>{{ $patient->gender }}</td>
                    <td>N/A</td>
                    <td>{{ $patient->phone_number }}</td>
                  </tr>
                @else
                  <tr>
                    <td>{{ $patient->id }}</td>
                    <td>{{ $patient->first_name }}</td>
                    <td>{{ $patient->last_name }}</td>
                    <td>{{ $patient->gender }}</td>
                    <td>{{ $patient->age }}</td>
                    <td>{{ $patient->phone_number }}</td>
                  </tr>
                @endif
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection
