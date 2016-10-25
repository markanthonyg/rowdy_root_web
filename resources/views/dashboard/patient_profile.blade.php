@extends('layouts.dashboard.master')

@section('style')
  <!-- CSS For patient profile page -->
  {{ Html::style('css/patient_profile.css') }}
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
  <a href="/new_patient">Patients</a>
</li>
<li class="crumb-link">
  <a href="{{ $patient->id }}">{{ $patient->first_name }} {{ $patient->last_name }}</a>
</li>
@endsection

@section('title')
 Patient Profile | {{ $patient->first_name }} {{ $patient->last_name }}
@endsection

@section('content')
<div class="panel">
  <div class="panel-heading">
    <span class="panel-icon">
      <i class="fa fa-star"></i>
    </span>
    <span class="panel-title"> Patient Information</span>
  </div>
  <div class="panel-body pn">
    <table class="table">
      <thead>
        <tr class="visible">
          <th>Name</th>
          <th>Sex</th>
          <th>Birth Date</th>
          <th>Address</th>
          <th>City/Village</th>
          <th>State/Province</th>
          <th>Postal Code</th>
          <th>Country</th>
          <th>Phone Number</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><h6>{{ $patient->first_name }} {{ $patient->middle }} {{ $patient->last_name }}</h6></td>
          <td><h6>{{ $patient->gender }}</h6></td>
          <td><h6>{{ $patient->birth_year }} / {{ $patient->birth_month }} / {{ $patient->birth_day }}</h6></td>
          <td><h6>{{ $patient->address }} {{ $patient->address_2 }}</h6></td>
          <td><h6>{{ $patient->city_village }}</h6></td>
          <td><h6>{{ $patient->state_province }}</h6></td>
          <td><h6>{{ $patient->postal_code }}</h6></td>
          <td><h6>{{ $patient->country }}</h6></td>
          <td><h6>{{ $patient->phone_number }}</h6></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<div class="col-md-12">
  <div class="tab-block">
    <ul class="nav nav-tabs">
      <li class="active">
        <a href="#tab1" data-toggle="tab">Health History</a>
      </li>
      <li>
        <a href="#tab2" data-toggle="tab">Physical Exam Details</a>
      </li>
      <li>
        <a href="#tab3" data-toggle="tab">Vitals</a>
      </li>
      <li>
        <a href="#tab4" data-toggle="tab">Surgical Procedures</a>
      </li>
      <li>
        <a href="#tab5" data-toggle="tab">Documents</a>
      </li>
    </ul>
    <div class="tab-content p30" style="height: 730px;">
      <div id="tab1" class="tab-pane active">

      </div>
      <div id="tab2" class="tab-pane"></div>
      <div id="tab3" class="tab-pane"></div>
      <div id="tab4" class="tab-pane"></div>
      <div id="tab5" class="tab-pane"></div>
    </div>
  </div>
</div>
</div>
@endsection

<!DOCTYPE html>
