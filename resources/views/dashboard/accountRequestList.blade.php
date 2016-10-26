@extends('layouts.dashboard.master')

@section('title')
  EMRS Online | Account Request
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
    <a href="/">Dashboard</a>
  </li>
  <li class="crumb-icon">
    <a href="/">
      <span class="glyphicon glyphicon-home"></span>
    </a>
  </li>
  <li class="crumb-link">
    <a href="/accountRequestList">Account Requests</a>
  </li>

@endsection

@section('content')

{{-- SAMPLE TABLE --}}
<div class="col-md-12">
  <div class="panel panel-visible" id="spy2">
    <div class="panel-heading">
      <div class="panel-title hidden-xs">
        <span class="glyphicon glyphicon-tasks"></span>Account Requests</div>
    </div>
    <div class="panel-body pn">
      <table class="table" id="datatable2" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Firt Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>DOB</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        @foreach($accounts as $account)
            <tr id="{{$account->id}}">
                <td id="first_name">{{$account->first_name}}</td>
                <td id="middle_name">{{$account->middle_name}}</td>
                <td id="last_name">{{$account->last_name}}</td>
                <td id="gender">{{$account->gender}}</td>
                <td id="dob">{{$account->dob}}</td>
                <td>
                  <a href="{{action('Dashboard\AccountRequestController@updateAccount')}}" class="btn btn-success account_update" data-id="{{ $account->id }}" name="approve">Approve</a>
                  <a href="{{action('Dashboard\AccountRequestController@updateAccount')}}" class="btn btn-danger account_update" data-id="{{ $account->id }}" name ="deny">Deny</a>
                </td>
            </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>
</div>




<!-- Twitter Bootstrap Modal -->

@endsection

@section('script')
<script>
    //When the approve or deny button is clicked
    $('.account_update').click(function(){
        //Get the clicked row
        var row = $(this).closest('tr');
        row.remove();
        // Fire ajax call to update account table
        $.post('/accountRequestList', {id: $(this).attr('data-id'), name : $(this).attr('name')}, function(data, textStatus, xhr) {
            if(data.success)
                alert('account successfully updated');
            else
                alert('Something went wrong!');
        });
    });
</script>
@endsection
