@extends('layouts.dashboard.master')

@section('title')
  EMRS Online | New Patient
@endsection

@section('style')
  <!-- Datatables CSS -->
  <link rel="stylesheet" type="text/css" href="vendor/plugins/datatables/media/css/dataTables.bootstrap.css">

  <!-- Datatables Editor Addon CSS -->
  <link rel="stylesheet" type="text/css" href="vendor/plugins/datatables/extensions/Editor/css/dataTables.editor.css">

  <!-- Datatables ColReorder Addon CSS -->
  <link rel="stylesheet" type="text/css" href="vendor/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css">

  <!-- Admin Forms CSS -->
  <link rel="stylesheet" type="text/css" href="assets/admin-tools/admin-forms/css/admin-forms.css">

  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.css">


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
    <a href="/new_patient">New Patient</a>
  </li>

@endsection

@section('content')

  <!-- begin: .tray-center -->
  <div class="tray tray-center">
    <div id="content" class="animated fadeIn">
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <!-- Input Fields -->
            <div class="panel">
              <div class="panel">
              <div class="panel-heading">
                <span class="panel-title">Add a new patient</span>

              </div>

                <div class="panel-body">
                  {{-- <form class="form-horizontal" role="form" method="post" action="/" id="newPatientForm"> --}}
                  {!! Form::open(['action' => 'Dashboard\PatientsController@insertPatient', 'class' => 'form-horizontal', 'id' => 'newPatientForm', 'role' => 'form']) !!}
                  <form class="form-horizontal" role="form" method="post" action="/" id="account2">
                    <div class="form-group">
                      {!! Form::label('firstnamelbl', 'First name', ['class' => 'col-lg-3 control-label', 'for' => 'inputStandard']) !!}
                      <div class="col-lg-8">
                        <div class="bs-component">
                          {!! Form::text('firstname', '', ['class' => 'form-control']) !!}
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('middlenamelbl', 'Middle name', ['class' => 'col-lg-3 control-label', 'for' => 'inputStandard']) !!}
                      <div class="col-lg-8">
                        <div class="bs-component">
                          {!! Form::text('middlename', '', ['class' => 'form-control']) !!}
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('lastnamelbl', 'Last name', ['class' => 'col-lg-3 control-label', 'for' => 'inputStandard']) !!}
                      <div class="col-lg-8">
                        <div class="bs-component">
                          {!! Form::text('lastname', '', ['class' => 'form-control']) !!}
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('genderlbl', 'Gender', ['class' => 'col-lg-3 control-label', 'for' => 'multiselect1']) !!}
                      <div class="col-lg-8">
                          {{ Form::select('gender', array(
                             'male' => 'Male',
                             'female' => 'Female'),
                             'male',
                             ['id' => 'multiselect1']
                          ) }}
                      </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('birthyear', 'Date of birth', ['class' => 'col-lg-3 control-label', 'for' => 'inputStandard']) !!}
                        <div class="col-xs-2">
                            {!! Form::text('birthyear', '', ['class' => 'form-control', 'id'=> 'inputStandard', 'placeholder' => 'year']) !!}
                        </div>
                        <div class="col-xs-2">
                            {!! Form::text('birthmonth', '', ['class' => 'form-control', 'id'=> 'inputStandard', 'placeholder' => 'month']) !!}
                        </div>
                        <div class="col-xs-2">
                            {!! Form::text('birthday', '', ['class' => 'form-control', 'id'=> 'inputStandard', 'placeholder' => 'day']) !!}
                        </div>
                    </div>
                     <div class="form-group">
                        {!! Form::label('addresslbl', 'Address', ['class' => 'col-lg-3 control-label', 'for' => 'inputStandard']) !!}
                       <div class="col-lg-8">
                         <div class="bs-component">
                           {!! Form::text('address', '', ['class' => 'form-control', 'id'=> 'inputStandard']) !!}
                         </div>
                       </div>
                     </div>
                     <div class="form-group">
                       {!! Form::label('address2lbl', 'Address 2', ['class' => 'col-lg-3 control-label', 'for' => 'inputStandard']) !!}
                       <div class="col-lg-8">
                         <div class="bs-component">
                           {!! Form::text('address2', '', ['class' => 'form-control', 'id'=> 'inputStandard']) !!}
                         </div>
                       </div>
                     </div>
                     <div class="form-group">
                       {!! Form::label('citylbl', 'City/Village', ['class' => 'col-lg-3 control-label', 'for' => 'inputStandard']) !!}
                       <div class="col-lg-8">
                         <div class="bs-component">
                           {!! Form::text('city', '', ['class' => 'form-control', 'id'=> 'inputStandard']) !!}
                         </div>
                       </div>
                     </div>
                     <div class="form-group">
                       {!! Form::label('statelbl', 'State/Province', ['class' => 'col-lg-3 control-label', 'for' => 'inputStandard']) !!}
                       <div class="col-lg-8">
                         <div class="bs-component">
                           {!! Form::text('state', '', ['class' => 'form-control', 'id'=> 'inputStandard']) !!}
                         </div>
                       </div>
                     </div>
                     <div class="form-group">
                       {!! Form::label('statelbl', 'Country', ['class' => 'col-lg-3 control-label', 'for' => 'inputStandard']) !!}
                       <div class="col-lg-8">
                         <div class="bs-component">
                           {!! Form::text('country', '', ['class' => 'form-control', 'id'=> 'inputStandard']) !!}
                         </div>
                       </div>
                     </div>
                     <div class="form-group">
                       {!! Form::label('statelbl', 'Postal code', ['class' => 'col-lg-3 control-label', 'for' => 'inputStandard']) !!}
                       <div class="col-lg-8">
                         <div class="bs-component">
                           {!! Form::text('zip', '', ['class' => 'form-control', 'id'=> 'inputStandard']) !!}
                         </div>
                       </div>
                     </div>
                     <div class="form-group">
                       {!! Form::label('statelbl', 'Phone number', ['class' => 'col-lg-3 control-label', 'for' => 'inputStandard']) !!}
                       <div class="col-lg-8">
                         <div class="bs-component">
                           {!! Form::text('phone', '', ['class' => 'form-control', 'id'=> 'inputStandard']) !!}
                         </div>
                       </div>
                     </div>
                     <div class="admin-form col-lg-12">
                       <button type="submit" class="button btn-primary pull-right">Add patient</button>
                     </div>
                {{-- </form> --}}
                {!! Form::close() !!}

               <div class="clearfix"></div>
             </div>
           </div>
                  </form>
                </div>
            </div>
          </div>
      </div>
    </div>
  </div>

@endsection

@section('script')
  <!-- DateTime Plugin -->
  <script src="assets/plugins/bootstrap-datetimepicker.min.js"></script>

  <!-- Datatables -->
  <script src="vendor/plugins/datatables/media/js/jquery.dataTables.js"></script>

  <!-- Datatables Tabletools addon -->
  <script src="vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>

  <!-- Datatables ColReorder addon -->
  <script src="vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>

  <!-- Time/Date Plugin Dependencies -->
  <script src="assets/plugins/globalize.min.js"></script>
  <script src="assets/plugins/moment.min.js"></script>

  <!-- Datatables Bootstrap Modifications  -->
  <script src="vendor/plugins/datatables/media/js/dataTables.bootstrap.js"></script>

  <script type="text/javascript">
    jQuery(document).ready(function() {

      // Init DateTimepicker - fields
      //$('#datetimepicker1').datetimepicker();


      // Init Boostrap Multiselects
     $('#multiselect1').multiselect();
     $('#multiselect2').multiselect({
       includeSelectAllOption: true
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
    @endsection
