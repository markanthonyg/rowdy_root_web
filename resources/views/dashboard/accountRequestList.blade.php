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

<div class="tray tray-center">

  {{-- ADD BUTTONS --}}
  <div class="col-md-4 hidden">
    <a href="/new_patient" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Add Patient</a>
  </div>

  {{-- <br /><br /><br /> --}}

  {{-- SAMPLE TABLE --}}
  <div class="col-md-12">
    <div class="panel panel-visible" id="spy2">
      <div class="panel-heading">
        <div class="panel-title hidden-xs">
          <span class="glyphicon glyphicon-tasks"></span>User Accounts</div>
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

<!-- Datatables -->
<script src="vendor/plugins/datatables/media/js/jquery.dataTables.js"></script>

<!-- Datatables Tabletools addon -->
<script src="vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>

<!-- Datatables ColReorder addon -->
<script src="vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>

<!-- Datatables Bootstrap Modifications  -->
<script src="vendor/plugins/datatables/media/js/dataTables.bootstrap.js"></script>

<script type="text/javascript">
  jQuery(document).ready(function() {

    // Make rows clickable with 'clickable-row' class
    $('.clickable-row').click(function() {
        window.location = $(this).data('url');
    });

    // Init DataTables
    $('#datatable').dataTable({
      "sDom": 't<"dt-panelfooter clearfix"ip>',
      "oTableTools": {
        "sSwfPath": "vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
      }
    });

    $('#datatable2').dataTable({
      "aoColumnDefs": [{
        'bSortable': false,
        'aTargets': [-1]
      }],
      "oLanguage": {
        "oPaginate": {
          "sPrevious": "",
          "sNext": ""
        }
      },
      "iDisplayLength": 10,
      "aLengthMenu": [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"]
      ],
      "sDom": '<"dt-panelmenu clearfix"lfr>t<"dt-panelfooter clearfix"ip>',
      "oTableTools": {
        "sSwfPath": "vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
      }
    });


    // MISC DATATABLE HELPER FUNCTIONS

    // Add Placeholder text to datatables filter bar
    $('.dataTables_filter input').attr("placeholder", "Search...");
  });
</script>

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
