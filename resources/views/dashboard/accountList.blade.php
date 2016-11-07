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

  <!-- CSS For clickable row -->
  {{ Html::style('css/clickable_row.css') }}

  {{ Html::style('css/accountList.css') }}
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
                  <th>Role</th>
                  <th>Eamil</th>
                  <th></th>
                  <th></th>
              </tr>
            </thead>
            @foreach($accounts as $account)
                <tr id="{{$account->id}}">
                    <td><input type="text" id="first_name" value="{{$account->first_name}}" style="border:none"/></td>
                    <td> <input type="text"  id="middle_name" value="{{$account->middle_name}}"/></td>
                    <td><input type="text"  id="last_name" value="{{$account->last_name}}"/></td>
                    <td> <input type="text"  id="gender" value="{{$account->gender}}"/></td>
                    <td> <input type="text"  id="dob" value="{{$account->dob}}"/></td>
                    <td> <input type="text"  id="role" value="{{$account->role}}"/></td>
                    <td> <input type="text"  id="email" value="{{$account->email}}"/></td>
                    <td><a href="{{action('Dashboard\AccountController@updateAccount')}}" class="btn btn-danger account_update" data-id="{{ $account->id }}" name ="delete">Delete</a></td>
                    <td><a href="{{action('Dashboard\AccountController@updateAccount')}}" data-id="{{ $account->id }}" disabled class="btn btn-success save_btn" name ="update">Update</a></td>
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
          'aTargets': [-2]
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
          $.post('/accountList', {
              id: $(this).attr('data-id'),
              name : $(this).attr('name'),
              class : $(this).attr('class')
             }, function(data, textStatus, xhr) {
              if(data.success)
                  alert('account successfully updated');
              else
                  alert('Something went wrong!');
          });
      });
  </script>

  <script>
  $(document).ready(function () {
    $('#datatable2').on('change', function () {
      var row = $(this).closest('tr');
      //test stuff please ignore
      //row.find('.btn btn-success save_btn').attr("contentEditable", true);
      //$('#datatable2 row.index td:eq(7)').attr("contentEditable", true);
      //$($(this).closest('tr') tr:eq(7)).attr("contentEditable", true);
      $("tr").each(function() {
        $(this).find("td:eq(7)").attr("contentEditable", true);
      });
  		///alert("change");
    });
  });
  </script>

<!--
  <script>
    $(document).ready(function () {
      $("#datatable2").on("change", function () {
        alert("change");
        /*
        $("tr").each(function() {
          $(this).find("td:eq(7)").attr("disabled", false);
        });
        */
      });
      /*
        $('.edit_btn').click(function () {
            var currentTD = $(this).parents('tr').find('td');
            if ($(this).html() == 'Edit') {
                $.each(currentTD, function () {
                    $(this).prop('contenteditable', true)
                    //makes last column uneditiable
                    $("tr").each(function() {
                      $(this).find("td:eq(7)").attr("contentEditable", false);
                    });
                });
            } else {
              $(".edit_btn").attr('class', 'btn btn-warning edit_btn');
               $.each(currentTD, function () {
                    $(this).prop('contenteditable', false)
                });
            }

            $(this).html($(this).html() == 'Edit' ? 'Save' : 'Edit')



        });
        */
    });
  </script>
-->
    @endsection
