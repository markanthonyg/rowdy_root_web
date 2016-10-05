@extends('layouts.dashboard.master')

@section('style')
  <!-- CSS For patient profile page -->
  {{ Html::style('css/patient_profile.css') }}
@endsection

@section('breadcrumb')

@endsection

@section('title')
 Patient Profile | {{ $patient->first_name }} {{ $patient->last_name }}
@endsection

@section('content')
  
@endsection
