@extends('layouts.dashboard.master')

@section('breadcrumb')

@endsection

@section('title')
 Patient Profile | {{ $patient->first_name }} {{ $patient->last_name }}
@endsection

@section('content')

@endsection
