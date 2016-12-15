@extends('layouts.dashboard.master')

@section('title')
  EMRS Online | Patients
@endsection

@section('style')
  <!-- Datatables CSS -->
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/datatables/media/css/dataTables.bootstrap.css')}}">

  <!-- Datatables Editor Addon CSS -->
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/datatables/extensions/Editor/css/dataTables.editor.css')}}">

  <!-- Datatables ColReorder Addon CSS -->
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css')}}">

  <!-- CSS For clickable row -->
  {{ Html::style('css/clickable_row.css') }}

  {{ Html::style('css/accountList.css') }}
@endsection

@section('breadcrumb')
<li class="crumb-icon">
  <a href="/">
    <span class="glyphicon glyphicon-home"></span>
  </a>
</li>
<li class="crumb-active">
  <a href="/patients">Patients</a>
</li>
<li class="crumb-active">
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
    <table class="table table-hover" id="demographicsTable" style="">
      <thead>
        <tr class="clickable-row" class="visible">
          <th>ID</th>
          <th>First Name</th>
          <th>Middle</th>
          <th>Last</th>
          <th>Sex</th>
          <th>Birth Date</th>
          <th>Address</th>
          <th>Address 2</th>
          <th>City/Village</th>
          <th>State/Province</th>
          <th>Postal Code</th>
          <th>Country</th>
          <th>Phone</th>
        </tr>
      </thead>
      <tbody>
        <tr class="clickable-row" id="{{$patient->id}}">
          <td><h6>{{ $patient->id }}</h6></td>
          <td><h6>{{ $patient->first_name }}</h6></td>
          <td><h6>{{ $patient->middle }}</h6></td>
          <td><h6>{{ $patient->last_name }}</h6></td>
          <td><h6>{{ $patient->gender }}</h6></td>
          <td><h6>{{ $patient->birth_year }} / {{ $patient->birth_month }} / {{ $patient->birth_day }}</h6></td>
          <td><h6>{{ $patient->address }}</h6></td>
          <td><h6>{{ $patient->address_2 }}</h6></td>
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

<!-- EDIT PATIENT Modal -->
<div class="modal fade" id="demographicsModal" style="padding:0;">
  <div class="modal-dialog" style="padding:0;">
    <div class="modal-content" style="padding:0;">
      <div class="modal-header" style="padding:0;">
        <div class="header panel-footer text-right">
          <a href="#" id="test" class="fa fa-times fa-2x" data-dismiss="modal"></a>
        </div>
      </div>
      <div class="modal-body" style="padding:0;">
        <div class="tray tray-center">
          <div class="form-group">
          <div class="admin-form theme-primary mw1000 center-block" style="border:none;">
            <div class="panel heading-border">
              {{-- <form method="post" action="/" id="newPatientForm"> --}}
              {!! Form::open(['action' => 'Dashboard\PatientsController@updatePatient', 'id' => 'admin-form', 'method' => 'post']) !!}
                {!! Form::hidden('id', '', ['class' => 'gui-input', 'name' => 'id', 'id' => 'id']) !!}
                <div class="panel-body bg-light">
                  <div class="section-divider mt20 mb40">
                    <span>Edit patient details</span>
                  </div>
                    <div class="section row"  >
                      <div class="col-md-4">
                        <label for="firstname" class="field prepend-icon">
                          {!! Form::text('firstname', '', ['placeholder' => 'First name...', 'class' => 'gui-input', 'name' => 'firstname', 'id' => 'firstname']) !!}
                          <label for="firstname" class="field-icon">
                            <i class="fa fa-user"></i>
                          </label>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label for="middlename" class="field prepend-icon">
                          {!! Form::text('middlename', '', ['placeholder' => 'Middle name...', 'class' => 'gui-input', 'name' => 'middlename', 'id' => 'middlename']) !!}
                          <label for="middlename" class="field-icon">
                            <i class="fa fa-user"></i>
                          </label>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label for="lastname" class="field prepend-icon">
                          {!! Form::text('lastname', '', ['placeholder' => 'Last name...', 'class' => 'gui-input', 'name' => 'lastname', 'id' => 'lastname']) !!}
                          <label for="lastname" class="field-icon">
                            <i class="fa fa-user"></i>
                          </label>
                        </label>
                      </div>
                    </div>
                    <div class="section row">
                      <div class="col-md-6">
                        <label for="dob" class="field prepend-icon">
                          {!! Form::text('dob', '', ['placeholder' => 'Date of birth...', 'class' => 'gui-input', 'name' => 'dob', 'id' => 'dob']) !!}
                          <label for="dob" class="field-icon">
                            <i class="fa fa-birthday-cake"></i>
                          </label>
                        </label>
                      </div>
                      <div class ="col-md-6">
                        <label class="field select">
                          {{ Form::select('gender', array(
                              '' => 'Select a gender...',
                              'male' => 'Male',
                              'female' => 'Female'),
                              '',
                              ['id' => 'gender']
                          ) }}
                          <i class="arrow double"></i>
                        </div>
                    </div>
                    <div class="section row">
                      <div class ="col-md-6">
                        <label for="address" class="field prepend-icon">
                          {!! Form::text('address', '', ['placeholder' => 'Address 1...', 'class' => 'gui-input', 'name' => 'address', 'id' => 'address']) !!}
                          <label for="address" class="field-icon">
                            <i class="fa fa-map-marker"></i>
                          </label>
                        </label>
                      </div>
                      <div class="col-md-6">
                        <label for="address2" class="field prepend-icon">
                          {!! Form::text('address2', '', ['placeholder' => 'Address 2...', 'class' => 'gui-input', 'name' => 'address2', 'id' => 'address2']) !!}
                          <label for="address2" class="field-icon">
                            <i class="fa fa-map-marker"></i>
                          </label>
                        </label>
                      </div>
                    </div>
                    <div class="section row">
                      <div class ="col-md-4">
                        <label for="city" class="field prepend-icon">
                          {!! Form::text('city', '', ['placeholder' => 'City/Village...', 'class' => 'gui-input', 'name' => 'city', 'id' => 'city']) !!}
                          <label for="city" class="field-icon">
                            <i class="fa fa-map-marker"></i>
                          </label>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label for="state" class="field prepend-icon">
                          {!! Form::text('state', '', ['placeholder' => 'State/Province ...', 'class' => 'gui-input', 'name' => 'state', 'id' => 'state']) !!}
                          <label for="state" class="field-icon">
                            <i class="fa fa-map-marker"></i>
                          </label>
                        </label>
                      </div>
                      <div class ="col-md-4">
                        <label for="postal" class="field prepend-icon">
                          {!! Form::text('postal', '', ['placeholder' => 'Zip Code...', 'class' => 'gui-input', 'name' => 'postal', 'id' => 'postal']) !!}
                          <label for="postal" class="field-icon">
                            <i class="fa fa-map-marker"></i>
                          </label>
                        </label>
                      </div>
                    </div>
                    <div class="section row">
                      <div class="col-md-6">
                        <label for="country" class="field prepend-icon">
                          {!! Form::text('country', '', ['placeholder' => 'Country...', 'class' => 'gui-input', 'name' => 'country', 'id' => 'country']) !!}
                          <label for="country" class="field-icon">
                            <i class="fa fa-map-marker"></i>
                          </label>
                        </label>
                      </div>
                      <div class ="col-md-6">
                        <label for="phone" class="field prepend-icon">
                          {!! Form::text('phone', '', ['placeholder' => 'Phone Number...', 'class' => 'gui-input', 'name' => 'phone', 'id' => 'phone']) !!}
                          <label for="phone" class="field-icon">
                            <i class="fa fa-mobile"></i>
                          </label>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="panel-footer text-right">
                    <button type="submit" class="btn btn-primary" name="action" value="Update" style="margin-right: 5px;"> Save</button>
                  </div>
                </div>
              </div>
            </div>
            {{-- </form> --}}
            {!! Form::close() !!}
          </div>
      </div>
      <div class="modal-footer" style="padding:0;">

      </div><!-- /.modal-footer-->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




<!-- Update Vital Modal -->
<div class="modal fade" id="myVitalModal" style="padding:0;">
  <div class="modal-dialog" style="padding:0;">
    <div class="modal-content" style="padding:0;">
      <div class="modal-header" style="padding:0;">
        <div class="header panel-footer text-right">
          <a href="#" id="test" class="fa fa-times fa-2x" data-dismiss="modal"></a>
        </div>
      </div>
      <div class="modal-body" style="padding:0;">
        <div class="tray tray-center">
          <div class="form-group">
          <div class="admin-form theme-primary mw1000 center-block">
            <div class="panel heading-border">
              {{-- <form method="post" action="/" id="myVitalForm"> --}}
              {!! Form::open(['action' => 'Dashboard\VitalsController@updateVital', 'id' => 'admin-form', 'method' => 'post']) !!}
                {!! Form::hidden('vid', '', ['class' => 'gui-input', 'name' => 'vid', 'id' => 'vid']) !!}
                {!! Form::hidden('vpid', '', ['class' => 'gui-input', 'name' => 'vpid', 'id' => 'vpid']) !!}
                <div class="panel-body bg-light">
                  <div class="section-divider mt20 mb40">
                    <span id="VitalModalTitle">Add New Vital Details</span>
                  </div>
                  <div class="section-divider mt10 mb10">
                    <span>Blood Pressure</span>
                  </div>
                    <div class="section row"  >
                      <div class="col-md-4">
                        <label for="BPS" class="field prepend-icon">
                          {!! Form::text('bps', '', ['placeholder' => 'BP Systolic...', 'class' => 'gui-input', 'name' => 'bps', 'id' => 'bps']) !!}
                          <label for="BPS" class="field-icon">
                            <i class="fa fa-heart"></i>
                          </label>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label for="BPD" class="field prepend-icon">
                          {!! Form::text('bpd', '', ['placeholder' => 'BP Diastolic...', 'class' => 'gui-input', 'name' => 'bpd', 'id' => 'bpd']) !!}
                          <label for="BPD" class="field-icon">
                            <i class="fa fa-heart-o"></i>
                          </label>
                        </label>
                      </div>
                    <div class="col-md-3">
                      <label class="field select">
                        {{ Form::select('bpunit', array(
                            '1' => 'mmHg',
                            '2' => 'Pa'),
                            '',
                            ['id' => 'bpunit']
                        ) }}
                        <i class="arrow double"></i>
                      </label>
                    </div>
                  </div>
                    <div class="section row">
                      <div class="section-divider mt10 mb10">
                        <span>Blood Glucose</span>
                      </div>
                      <div class="col-md-4"> <!-- need to modify schema in DB so saves as string, not double-->
                        <label class="field select">
                          {{ Form::select('fasting', array(
                              '-1'=> 'Fasting?',
                              '1' => 'Yes, Fasting',
                              '0' => 'No, Not Fasting'),
                              '',
                              ['id' => 'fasting']
                          ) }}
                          <i class="arrow double"></i>
                        </label>
                      </div>
                      <div class ="col-md-4">
                        <label for="bg" class="field prepend-icon">
                          {!! Form::text('bg', '', ['placeholder' => 'Blood Glucose...', 'class' => 'gui-input', 'name' => 'bg', 'id' => 'bg']) !!}
                          <label for="bg" class="field-icon">
                            <i class="fa fa-tint"></i>
                          </label>
                        </label>
                      </div>
                      <div class="col-md-3"> <!-- need to modify schema in DB so saves as string, not double--> <!-- COLUM or section???? -->
                        <label class="field select">
                          {{ Form::select('bgUnit', array(
                              'mg/dL' => 'mg/dL',
                              'mmol/L' => 'mmol/L'),
                              '',
                              ['id' => 'bgUnit']
                          ) }}
                          <i class="arrow double"></i>
                        </label>
                      </div>
                    </div>
                    <div class="section row">
                      <div class="section-divider mt10 mb10">
                        <span>O2 Saturation and Hemoglobin</span>
                      </div>
                      <div class="col-md-4">
                        <label for="o2sat" class="field append-icon">
                          {!! Form::text('o2sat', '', ['placeholder' => 'O2 Saturation...', 'class' => 'gui-input', 'name' => 'o2sat', 'id' => 'o2sat']) !!}
                          <label for="o2sat" class="field-icon">
                            <i>%</i>
                          </label>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label for="hb" class="field prepend-icon">
                          {!! Form::text('hemob', '', ['placeholder' => 'Hemoglobin...', 'class' => 'gui-input', 'name' => 'hb', 'id' => 'hb']) !!}
                          <label for="hb" class="field-icon">
                            <i class="fa fa-tint"></i>
                          </label>
                        </label>
                      </div>
                      <div class="col-md-3">
                        <label class="field select">
                          {{ Form::select('hgUnit', array(
                              'mg/dL' => 'mg/dL'),
                              '',
                              ['id' => 'hgUnit']
                          ) }}
                          <i class="arrow double"></i>
                        </label>
                      </div>
                    </div>
                    <div class="section row"> <!-- HEIGHT, WOULDN'T IT BE NICE TO BE ABLE TO CONVERT FROM ENGLISH TO METRIC, VISAVERSA AND PUSH BOTH VALUES orsomething-->
                      <div class="section-divider mt10 mb10">
                        <span>Height</span>
                      </div>
                      <div class="col-md-3">
                        <label for="hfeet" class="field prepend-icon">
                          {!! Form::text('hfeet', '', ['placeholder' => 'Height, feet...', 'class' => 'gui-input', 'name'=>'hfeet', 'id' => 'hfeet']) !!}
                          <label for="hfeet" class="field-icon">
                            <i class="fa fa-user" id="hfi"></i>
                          </label>
                        </label>
                      </div>
                      <div class="col-md-3">
                        <label for="hinches" class="field prepend-icon">
                          {!! Form::text('hinches', '', ['placeholder' => 'Height, inches...', 'class' => 'gui-input','name' => 'hinches', 'id' => 'hinches']) !!}
                          <label for="hinches" class="field-icon">
                            <i class="fa fa-user" id="hii"></i>
                          </label>
                        </label>
                      </div>
                      <div class="col-md-3">
                        <label for="hcm" class="field prepend-icon">
                          {!! Form::text('hcm', '', ['placeholder' => 'Height, cm...', 'class' => 'gui-input', 'name'=>'hcm', 'id' => 'hcm']) !!}
                          <label for="hcm" class="field-icon">
                            <i class="fa fa-user" id="hci"></i>
                          </label>
                        </label>
                      </div>
                      <div class="col-md-2">
                        <label class="field select">
                          {{ Form::select('hunit', array(
                              'ft/in' => 'ft/in',
                              'cm' => 'cm'),
                              '',
                              ['id' => 'hunit']
                          ) }}
                          <i class="arrow double"></i>
                        </label>
                      </div>
                    </div>
                    <div class="section row"> <!-- WEIGHT, WOULDN'T IT BE NICE TO BE ABLE TO CONVERT FROM ENGLISH TO METRIC, VISAVERSA AND PUSH BOTH VALUES orsomething-->
                      <div class="section-divider mt10 mb10">
                        <span>Weight</span>
                      </div>
                      <div class="col-md-3">
                        <label for="weight" class="field pre         pend-icon">
                          {!! Form::text('weight', '', ['placeholder' => 'Weight...', 'class' => 'gui-input', 'name' => 'weight', 'id' => 'weight']) !!}
                          <label for="weight" class="field-icon">
                            <i class="fa fa-cube"></i>
                          </label>
                        </label>
                      </div>
                      <div class="col-md-3">
                        <label class="field select">
                          {{ Form::select('wunit', array(
                              'lbs' => 'lbs',
                              'kg' => 'kg'),
                              '',
                              ['id' => 'wunit']
                          ) }}
                          <i class="arrow double"></i>
                        </label>
                      </div>
                    </div>
                    <div class="section"> <!-- NOTES -->
                      <div class="section-divider mt10 mb10">
                        <span>Notes</span>
                      </div>
                      <label for="notes" class="field prepend-icon">
                        {!! Form::text('notes', '', ['placeholder' => 'Additional Notes...', 'class' => 'gui-input', 'name' => 'notes', 'id' => 'notes']) !!}
                        <label for="notes" class="field-icon">
                          <i class="fa fa-mobile"></i>
                        </label>
                      </label>
                    </div>
                  </div>
                  <div class="panel-footer text-right">
                    <button type="submit" class="btn btn-primary" name="action" value="AddVital" id="AddVital" style="margin-right: 5px;"> Add Vitals</button>
                    <button type="submit" class="btn btn-primary" name="action" value="UpdateVital" id="UpdateVital" style="margin-right: 5px;"> Save</button>
                    <button type="submit" class="btn btn-danger" name="action" value="DeleteVital" id="DeleteVital"> Delete</button>
                  </div>
                </div>
              </div>
            </div>
            {{-- </form> --}}
            {!! Form::close() !!}
          </div>
      </div>
      <div class="modal-footer" style="padding:0;">

      </div><!-- /.modal-footer-->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


{{-- Show alert if patient has any known allergies --}}
@if ( $allergy_alert )
  <div class="alert alert-warning">
    <strong>This patient has one or more known allergies.</strong>
  </div>
@endif




<!-- Update HX PROTOTYPE Modal -->
<div class="modal fade" id="myHxModal" style="padding:0;">
  <div class="modal-dialog" style="padding:0;">
    <div class="modal-content" style="padding:0;">
      <div class="modal-header" style="padding:0;">
        <div class="header panel-footer text-right">
          <a href="#" id="test" class="fa fa-times fa-2x" data-dismiss="modal"></a>
        </div>
      </div>
      <div class="modal-body" style="padding:0;">
        <div class="tray tray-center">
          <div class="form-group">
          <div class="admin-form theme-primary mw1000 center-block">
            <!-- <div class="panel heading-border"> -->
              {{-- <form method="post" action="/" id="myHxForm"> --}}
              {!! Form::open(['action' => 'Dashboard\HxController@updateHealthHistory', 'id' => 'admin-form', 'method' => 'post']) !!}
                {!! Form::hidden('hpid', $patient->id, ['name' => 'hpid', 'id' => 'hpid']) !!}
                <div class="panel-body bg-light">
                  <div class="section-divider mt20 mb40">
                    <span id="hxTitle">Add Health History Details</span>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                  <!-- <div class="section-divider mt10 mb10"> -->
                    <div class="panel panel-primary">
                      <div class="panel-heading">Major Drug Allergies?</div>
                      <div class="panel-body">
                        <div class="checkbox-custom checkbox-primary">
                          <input type="checkbox" id="nkdaCheckbox">
                          <label for="nkdaCheckbox">NKDA</label>
                        </div>
                      </br>
                        <div class="checkbox-custom checkbox-primary">
                          <input type="checkbox" id="drug_allergyCheckbox">
                          <label for="drug_allergyCheckbox">Drug Allergies:</label>
                        </div>
                          </br>
                            <div class="panel">
                              <div class="panel-heading bg-dark">
                                <span class="panel-title">Med Finder</span>
                              </div>
                              <div class="panel-body">
                                <div class="form-group">
                                  {{-- Search bar w/ results div (coming from jquery) --}}
                                  <input type="text" class="search form-control input-sm" id="drug_search" placeholder="Search drugs...">
                                  <div id="drug_result"></div>
                                </div>
                              </div>
                            </div>

                      </div>
                    </div>
                  <!-- </div> -->
                </div>
              </div>
                    <div class="row">
                      <div class="col-md-12">
                      <div class="panel panel-primary">
                        <div class="panel-heading">Past Medical History</div>
                        <div class="panel-body">
                          <div class="checkbox-custom checkbox-primary">
                            <input type="checkbox" id="diabetesCheckbox">
                            <label for="diabetesCheckbox">Diabetes</label>
                          </div>
                        </br>
                          <div class="checkbox-custom checkbox-primary">
                            <input type="checkbox" id="copdCheckbox">
                            <label for="copdCheckbox">COPD</label>
                          </div>
                        </br>
                          <div class="checkbox-custom checkbox-primary">
                            <input type="checkbox" id="htnCheckbox">
                            <label for="htnCheckbox">Hypertension (HTN)</label>
                          </div>
                        </br>
                          <div class="checkbox-custom checkbox-primary">
                            <input type="checkbox" id="cadCheckbox">
                            <label for="cadCheckbox">Coronary Artery Disease (CAD)</label>
                          </div>
                        </br>
                          <div class="checkbox-custom checkbox-primary">
                            <input type="checkbox" id="pvdCheckbox">
                            <label for="pvdCheckbox">Peripheral Vascular Disease (PVD)</label>
                          </div>
                        </br>
                          <div class="checkbox-custom checkbox-primary">
                            <input type="checkbox" id="chfCheckbox">
                            <label for="chfCheckbox">Congestive Heart Failure (CHF)</label>
                          </div>
                        </br>
                          <div class="checkbox-custom checkbox-primary">
                            <input type="checkbox" id="hypoCheckbox">
                            <label for="hypoCheckbox">Hypothyroidism</label>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
                    <div class="row">
                      <div class="col-md-12">
                      <div class="panel panel-primary">
                        <div class="panel-heading">Bleeding Tendency?</div>
                        <div class="panel-body">
                          <div class="checkbox-custom checkbox-primary">
                            <input type="checkbox" id="aspirinCheckbox">
                            <label for="aspirinCheckbox">Aspirin</label>
                          </div>
                        </br>
                          <div class="checkbox-custom checkbox-primary">
                            <input type="checkbox" id="plavixCheckbox">
                            <label for="plavixCheckbox">Plavix</label>
                          </div>
                        </br>
                          <div class="checkbox-custom checkbox-primary">
                            <input type="checkbox" id="bleedingCheckbox">
                            <label for="bleedingCheckbox">Blood Disorder?</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                    <div class="row">
                      <div class="col-md-12">
                      <div class="panel panel-primary">
                        <div class="panel-heading">Past Surgical History Notes:</div>
                        <div class="panel-body">
                          <textarea class="form-control" id="textArea3" rows="8"></textarea>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="panel-footer text-right">
                    <button type="submit" class="btn btn-primary" name="action" value="AddHx" id="addHx" style="margin-right: 5px;"> Save </button>
                  </div>
                </div>
              <!-- </div> -->
            </div>
            {{-- </form> --}}
            {!! Form::close() !!}
          </div>
      </div>
      <div class="modal-footer" style="padding:0;">

      </div><!-- /.modal-footer-->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>


<div class="alert alert-warning">
  <strong>This patient has one or more known allergies.</strong>
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
      <!-- TABSHERE-->
      <div id="tab1" class="tab-pane active">
        @if ($health_history->count() == 0)
          <div class="row">
            <div class="col-md-12">
              <h3><i>No health history found</i></h3>
            </div>
            <div class="col-md-12">
              <button class="btn btn-primary" id="hxModalButton" style="float: left;margin: 10px;"><i class="fa fa-plus fa-lg"></i> Fill Out Health History </button>
            </div>
          </div>

        @else
        <div class="row">
          <div class="col-md-6">
            <div class="panel panel-primary">
              <div class="panel-heading">Major Drug Allergies?</div>
              <div class="panel-body">
                <div class="checkbox-custom checkbox-primary">
                  <input type="checkbox" checked="" disabled="" id="nkdaCheckbox">
                  <label for="nkdaCheckbox">NKDA</label>
                </div>
                    <div class="checkbox-custom checkbox-primary">
                      <input type="checkbox" checked="" disabled="" id="drug_allergyCheckbox">
                      <label for="drug_allergyCheckbox">Drug Allergies:</label>
                    </div>
                  </br>
                    <div class="panel">
                      <div class="panel-heading">
                        <span class="panel-title">Med Finder</span>
                      </div>
                      <div class="panel-body">
                        <div class="form-group">
                          {{-- Search bar w/ results div (coming from jquery) --}}
                          <input type="text" class="search form-control input-sm" id="drug_search" placeholder="Search drugs...">
                          <div id="drug_result"></div>
                        </div>
                      </div>
                    </div>

              </div>
            </div>
          </div>
          <!-- past medical history here -->
          <div class="col-md-6">
            <div class="panel panel-primary">
              <div class="panel-heading">Past Medical History</div>
              <div class="panel-body">
                <div class="checkbox-custom checkbox-primary">
                  <input type="checkbox" checked="" disabled="" id="diabetesCheckbox">
                  <label for="diabetesCheckbox">Diabetes</label>
                </div>
                <div class="checkbox-custom checkbox-primary">
                  <input type="checkbox" id="copdCheckbox">
                  <label for="copdCheckbox">COPD</label>
                </div>
                <div class="checkbox-custom checkbox-primary">
                  <input type="checkbox" checked="" disabled="" id="htnCheckbox">
                  <label for="htnCheckbox">Hypertension (HTN)</label>
                </div>
                <div class="checkbox-custom checkbox-primary">
                  <input type="checkbox" id="cadCheckbox">
                  <label for="cadCheckbox">Coronary Artery Disease (CAD)</label>
                </div>
                <div class="checkbox-custom checkbox-primary">
                  <input type="checkbox" checked="" disabled="" id="pvdCheckbox">
                  <label for="pvdCheckbox">Peripheral Vascular Disease (PVD)</label>
                </div>
                <div class="checkbox-custom checkbox-primary">
                  <input type="checkbox" id="chfCheckbox">
                  <label for="chfCheckbox">Congestive Heart Failure (CHF)</label>
                </div>
                <div class="checkbox-custom checkbox-primary">
                  <input type="checkbox" id="hypoCheckbox">
                  <label for="hypoCheckbox">Hypothyroidism</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">

          <div class="col-md-6">
            <div class="panel panel-primary">
              <div class="panel-heading">Bleeding Tendency?</div>
              <div class="panel-body">
                <div class="checkbox-custom checkbox-primary">
                  <input type="checkbox" checked="" disabled="" id="aspirinCheckbox">
                  <label for="aspirinCheckbox">Aspirin</label>
                </div>
                <div class="checkbox-custom checkbox-primary">
                  <input type="checkbox" id="plavixCheckbox">
                  <label for="plavixCheckbox">Plavix</label>
                </div>
                <div class="checkbox-custom checkbox-primary">
                  <input type="checkbox" id="bleedingCheckbox">
                  <label for="bleedingCheckbox">Blood Disorder?</label>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="panel panel-primary">
              <div class="panel-heading">Past Surgical History Notes:</div>
              <div class="panel-body">
                <textarea class="form-control" id="textArea3" rows="8" disabled="">Eye surgery,
cataract removal</textarea>
              </div>
            </div>
          </div>
        </div>
      @endif
      </div>

      {{-- Patient profile tab --}}
      <div id="tab2" class="tab-pane">
          <div class="col-md-12">
            <button type="button" class="btn btn-primary" onclick="window.location.href='/new_patient_visit/{{$patient->id}}'" name="new_physical_exam" style="float: left;margin: 10px;"><span class="glyphicon glyphicon-plus-sign"></span> New Visit</button>
          </div>


        @if (count($visits) == 0 )
          <br />
          <br />
          <div class="text-center" id="no_visits">
            No previous visits recorded
          </div>
        @else
          <div class="col-md-12">
            <div class="panel panel-visible" id="spy2">
              <div class="panel-heading">
                <div class="panel-title hidden-xs">
                  <span class="glyphicon glyphicon-calendar"></span>Previous Visits</div>
              </div>
              <div class="panel-body pn">
                <table class="table table-hover table-striped" id="datatable2" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Visit ID</th>
                      <th>Date</th>
                      <th>Chief Complaint</th>
                      <th>Assesment</th>
                      <th>Plan</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($visits as $visit)
                      <tr class="clickable-visit-row" data-url="{{ url('visit/'.$visit->id) }}">
                        <td>{{ $visit->id }}</td>
                        <td>{{ date('m/d/Y', strtotime($visit->dateCreated)) }}</td>
                        <td>{{ $visit->chiefComplaint }}</td>
                        <td>{{ $visit->assessment }}</td>
                        <td>{{ $visit->plan }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        @endif
      </div>

      <div id="tab3" class="tab-pane">

        <!-- BEGIN VITALS TAB -->
        <!-- begin: .tray-center -->
        <div class="tray tray-center">

          {{-- ADD BUTTONS --}}
          <div class="col-md-4 hidden">
            <a href="/new_vital" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Add Vital</a>
            <br/><br/><br/>
          </div>


          <div class="col-md-12">
            <button class="btn btn-primary" id="addVitalBtn" style="float: left;margin: 10px;"><i class="fa fa-plus fa-lg"></i> Add Vital </button>
          </div>

          {{-- <br /><br /><br /> --}}

          <!-- BVITALS TABLE -->

          {{-- SAMPLE TABLE --}}
          <div class="col-md-12">
            <div class="panel panel-visible" id="spy2">
              <div class="panel-heading">
                <div class="panel-title hidden-xs">
                  <span class="glyphicon glyphicon-tasks"></span>Vitals</div>
              </div>
              <div class="panel-body pn">
                <table class="table table-hover" id="vitalTable" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>BP</th>
                      <th>Fasting</th>
                      <th>BG</th>
                      <th>O2</th>
                      <th>Hb</th>
                      <th>Height</th>
                      <th>Weight</th>
                      <th>Notes</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($vitals as $vital)
                        <tr class="clickable-row" onclick="getVitalIndex(this)" data-url="{{ $vital->id }}">
                          <td>{{ $vital->dateCreated }}</td>
                          <td>
                            {{ $vital->bps }}/{{ $vital->bpd}} {{ ($vital->bpunit == 2) ? 'Pa' : 'mmHg' }}
                          </td>
                          <td>
                            {{ ($vital->fasting == 1) ? 'Yes' : 'No'  }}
                          </td>
                          <td>{{ $vital->bg }} {{ $vital->bgUnit }}</td>
                          <td>{{ $vital->o2sat }}%</td>
                          <td>{{ $vital->hb}} mg/dL</td>
                          <td>
                            @if ($vital->hunit == 'ft/in')
                              {{ $vital->hfeet}}'{{ $vital->hinches}}"
                            @else
                              {{ $vital->hcm }} cm
                            @endif
                          </td>
                          <td>{{ $vital->weight}} {{ $vital-> wunit}}</td>
                          <td>{{ $vital->notes}}</td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- END VITALS TABLE -->
      </div>

      <div id="tab4" class="tab-pane">
      {!! Form::open(['action' => 'Dashboard\SurgicalProceduresController@addProcedure', 'id' => 'admin-form', 'method' => 'post']) !!}
        <label for="#templateSelect">Add a Surgery:</label>

         {{ Form::select('templateSelect', array(
                              '' => 'Select a template...',
                              'none' => 'None',
                              'AC injection of Healon via 30 Gauge needle' => 'AC injection of Healon via 30 Gauge needle',
                              'Anterior Chamber injection of Healon via 30 Guage needle' => 'Anterior Chamber injection of Healon via 30 Guage needle',
                              'Ahmed Valve/Graft-Right Eye' => 'Ahmed Valve/Graft-Right Eye',
                              'ALT' => 'ALT',
                              'Argon Iridoplasty' => 'Argon Iridoplasty',
                              'Automated Keratometry' => 'Automated Keratometry',
                              'Axial Lenght Measurement/A-Scan' => 'Axial Lenght Measurement/A-Scan',
                              'Baerveldt Valve/Graft-Left Eye' => 'Baerveldt Valve/Graft-Left Eye',
                              'Baerveldt Valve/Graft-Right Eye' => 'Baerveldt Valve/Graft-Right Eye',
                              'Chalazion' => 'Chalazion',
                              'Diode Cyclophotocoagulation' => 'Diode Cyclophotocoagulation',
                              'Phaco/PC IOL-Left Eye' => 'Phaco/PC IOL-Left Eye',
                              'Phaco/PC IOL-Right Eye<' => 'Phaco/PC IOL-Right Eye<',
                              'Surgical Template' => 'Surgical Template',
                              'YAG capsultomy' => 'YAG capsultomy',
                              'YAG Laser Capsulotomy-Left Eye' => 'YAG Laser Capsulotomy-Left Eye',
                              'YAG Laser Capsulotomy-Right Eye' => 'YAG Laser Capsulotomy-Right Eye',
                              'male' => 'Male',
                              'female' => 'YAG Laser Iridotomy'),
                              '',
                              array('id' => 'templateSelect', 'class' => 'form-control input-sm', 'onchange' => 'showCSTemplates(this)')
                          ) }}


        </br>
        {!! Form::hidden('pid', '', ['class' => 'gui-input', 'name' => 'pid', 'id' => 'pid']) !!}
        {!! Form::textarea('surgicalTemplate', '', ['class' => 'gui-input', 'name' => 'surgicalTemplate', 'id' => 'surgicalTemplate', 'style' => 'height: 300px; width: 100%']) !!}

        <button type="submit" class="btn btn-primary pull-right" name="action"style="margin-right: 5px;" id="saveSurgery"> Save</button>
      {!! Form::close() !!}
      </br>
      </br>
      </br>
      {{-- SAMPLE TABLE --}}
      <div class="col-md-12">
        <div class="panel panel-visible" id="spy2">
          <div class="panel-heading">
            <div class="panel-title hidden-xs">
              <span class="glyphicon glyphicon-tasks"></span>Past Surgical Procedures</div>
          </div>
          <div class="panel-body pn">
            <table class="table table-hover" id="datatable2" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Procedure</th>
                  <th>Body</th>
                </tr>
              </thead>
              <tbody>
                @foreach($surgeries as $surgery)
                    <tr>
                      <td>{{ $surgery->title }}</td>
                      <td>{{ $surgery->body }}</td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

      </div>
      <div id="tab5" class="tab-pane">
        <div class="about-section">
         <div class="text-content">
           <div class="span7 offset1">
              @if(Session::has('success'))
                <div class="alert-box success">
                <h2>{!! Session::get('success') !!}</h2>
                </div>
              @endif
              <div class="secure">Upload form</div>
              {!! Form::open(array('url'=>'patient_profile/upload','method'=>'POST', 'files'=>true)) !!}
               <div class="control-group">
                <div class="controls">
                {!! Form::file('image') !!}
                {!! Form::hidden('fpid', '', ['class' => 'gui-input', 'name' => 'fpid', 'id' => 'fpid']) !!}
      	  <p class="errors">{!!$errors->first('image')!!}</p>
      	@if(Session::has('error'))
      	<p class="errors">{!! Session::get('error') !!}</p>
      	@endif
              </div>
              </div>
              <div id="success"> </div>
            {!! Form::submit('Submit', array('class'=>'send-btn', 'id' => 'fileSend')) !!}
            {!! Form::close() !!}
            </div>
         </div>
      </div>
      @foreach($files as $file)
        <div class="row">
          <a href="/uploads/{{$file->file_name}}"><img src="/uploads/{{$file->file_name}}"/></a>
        </div>
      @endforeach

        <!--<form action="/file-upload"class="dropzone"id="my-awesome-dropzone"></form>-->

      </div>

    </div> <!-- /container -->
      </div>
    </div>
  </div>
</div>
@endsection


@section('script')

  <!-- Datatables -->
  <script src="{{ URL::asset('vendor/plugins/datatables/media/js/jquery.dataTables.js')}}"></script>

  <!-- Datatables Tabletools addon -->
  <script src="{{ URL::asset('vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js')}}"></script>

  <!-- Datatables ColReorder addon -->
  <script src="{{ URL::asset('vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js')}}"></script>

  <!-- Datatables Bootstrap Modifications  -->
  <script src="{{ URL::asset('vendor/plugins/datatables/media/js/dataTables.bootstrap.js')}}"></script>

  <!-- jQuery Validate Plugin-->
  <script src="{{ URL::asset('assets/admin-tools/admin-forms/js/jquery.validate.min.js')}}"></script>

  <!-- jQuery Validate Addon -->
  <script src="{{ URL::asset('assets/admin-tools/admin-forms/js/additional-methods.min.js')}}"></script>

  <!-- Bootstrap Date-Picker Plugin -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

  <script>
    jQuery(document).ready(function() {

      // Make rows clickable with 'clickable-row' class
      $('.clickable-visit-row').click(function() {
          window.location = $(this).data('url');
      });

      // Init DataTables
      $('#datatable').dataTable({
        "sDom": 't<"dt-panelfooter clearfix"ip>',
        "oTableTools": {
          "sSwfPath": "vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
        }
      });

    });
  </script>

  <script>
    jQuery(document).ready(function(){
      var date_input=$('input[name="dob"]');
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
  </script>

  <script>
    $(document).ready(function () {
      $('#demographicsTable').on('click','td',function(){
        $("#demographicsModal").modal("show");
        $("#id").val($(this).closest('tr').children()[0].textContent);
        $("#firstname").val($(this).closest('tr').children()[1].textContent);
        $("#middlename").val($(this).closest('tr').children()[2].textContent);
        $("#lastname").val($(this).closest('tr').children()[3].textContent);
        $("#gender").val($(this).closest('tr').children()[4].textContent);
        $("#dob").val($(this).closest('tr').children()[5].textContent);
        $("#address").val($(this).closest('tr').children()[6].textContent);
        $("#address2").val($(this).closest('tr').children()[7].textContent);
        $("#city").val($(this).closest('tr').children()[8].textContent);
        $("#state").val($(this).closest('tr').children()[9].textContent);
        $("#postal").val($(this).closest('tr').children()[10].textContent);
        $("#country").val($(this).closest('tr').children()[11].textContent);
        $("#phone").val($(this).closest('tr').children()[12].textContent);
      });
    });
  </script>



<!-- BEGIN VITALS -->

  <script>

  var vitalTableIndex;

  function getVitalIndex(i) {
    // alert(i.rowIndex);
    vitalTableIndex = i.rowIndex;
  }

  $(document).ready(function () {


    $('#hunit').change(function() {

      // $('#hcm').val('');
      // $('#hfeet').val('');
      // $('#hinches').val('');

      if ($( this ).val() == 'ft/in') {
        $('#hcm').hide();
        $('#hfeet').show();
        $('#hinches').show();
        $('#hfi').show();
        $('#hii').show();
        $('#hci').hide();

      } else if ($( this ).val() == 'cm') {
        $('#hcm').show();
        $('#hfeet').hide();
        $('#hinches').hide();
        $('#hci').show();
        $('#hfi').hide();
        $('#hii').hide();
      }
    });

    // $('#hunit').on('change',function(){
    //     alert("it equals " + this.options[this.selectedIndex].innerHTML);
    //     // if ($('#hunit').value == 'ft/in') {
    //     //   $('#hcm').hide();
    //     //   $('#hfeet').show();
    //     //   $('#hinches').show();
    //     // } else {
    //     //   $('#hcm').show();
    //     //   $('#hfeet').hide();
    //     //   $('#hinches').hide();
    //     // }
    //   )};

    $('#hxModalButton').on('click',function() {
      $("#myHxModal").modal("show");
    })

    $('#addVitalBtn').on('click',function() {

      var patientA = {!! json_encode($patient->toArray()) !!};

      $("#myVitalModal").modal("show");
      $('#VitalModalTitle').text('Add New Vital Details');

      $('#DeleteVital').hide();
      $('#UpdateVital').hide();
      $('#AddVital').show();

      $("#vid").val("");
      $("#vpid").val(patientA.id);
      $("#pid").val(patientA.id);
      $("#bps").val("");
      $("#bpd").val("");
      $("#bpunit").val(1);
      $("#fasting").val(-1);
      $("#bg").val("");
      $("#bgUnit").val("mg/dL");
      $("#o2sat").val("");
      $("#hb").val("");
      $("#hfeet").val("");
      $("#hinches").val("");
      $("#hcm").val("");

      $("#hunit").val("ft/in");
      $('#hcm').hide();
      $('#hfeet').show();
      $('#hinches').show();
      $('#hfi').show();
      $('#hii').show();
      $('#hci').hide();

      $("#weight").val("");
      $("#wunit").val("lbs");
      $("#notes").val("");
    });

    $('#vitalTable').on('click','td',function() {

      var patientA = {!! json_encode($patient->toArray()) !!};
      var vitalsA = {!! json_encode($vitals->toArray()) !!};

      var sVital = vitalsA[vitalTableIndex-1];

      // alert(JSON.stringify(sVital));
      $("#myVitalModal").modal("show");
      $('#VitalModalTitle').text('Edit Vital Details');

      $('#DeleteVital').show();
      $('#UpdateVital').show();
      $('#AddVital').hide();

      if ( sVital.hunit == 'ft/in') {
        $('#hcm').hide();
        $('#hfeet').show();
        $('#hinches').show();
        $('#hfi').show();
        $('#hii').show();
        $('#hci').hide();
        $("#hunit").val('ft/in');
      } else {
        $('#hcm').show();
        $('#hfeet').hide();
        $('#hinches').hide();
        $('#hci').show();
        $('#hfi').hide();
        $('#hii').hide();
        $("#hunit").val('cm');
      }

      $("#vid").val(sVital.id);
      $("#vpid").val(patientA.id);
      $("#bps").val(sVital.bps);
      $("#bpd").val(sVital.bpd);
      $("#bpunit").val(sVital.bpunit);
      $("#fasting").val(sVital.fasting);
      $("#bg").val(sVital.bg);
      $("#bgUnit").val(sVital.bgUnit);
      $("#o2sat").val(sVital.o2sat);
      $("#hb").val(sVital.hb);
      $("#hfeet").val(sVital.hfeet);
      $("#hinches").val(sVital.hinches);
      $("#hcm").val(sVital.hcm);
      $("#weight").val(sVital.weight);
      $("#wunit").val(sVital.wunit);
      $("#notes").val(sVital.notes);

      $('#DeleteVital').show();
      $('#UpdateVital').show();
      $('#AddVital').hide();
      $('#modalTitle').text('Edit Vital Details');

    });
  });
  </script>

  <!-- END VITALS -->

  <!-- Theme Javascript -->
  <script src="assets/js/utility/utility.js"></script>
  <!--<script src="assets/js/demo/demo.js"></script>-->
  <script src="assets/js/main.js"></script>
  <script type="text/javascript">
  jQuery(document).ready(function() {
    "use strict";

    // Init Theme Core
    // Core.init();

    // Init Demo JS
    //Demo.init();

    /* @custom validation method (smartCaptcha)
    ------------------------------------------------------------------ */

    $.validator.methods.smartCaptcha = function(value, element, param) {
      return value == param;
    };

    $("#admin-form").validate({

      /* @validation states + elements
      ------------------------------------------- */

      errorClass: "state-error",
      validClass: "state-success",
      errorElement: "em",

      /* @validation rules
      ------------------------------------------ */

      rules: {
        firstname: {
          required: true
        },
        country: {
          required: true
        },
        city: {
          required: true
        },
        state: {
          required: true
        },
        birthyear: {
          required: true
        },
        useremail: {
          required: true,
          email: true
        },
        website: {
          required: true,
          url: true
        },
        upload1: {
          required: true,
          extension: "jpg|png|gif|jpeg|doc|docx|pdf|xls|rar|zip"
        },
        mobileos: {
          required: true
        },
        comment: {
          required: true,
          minlength: 30
        },
        mobile_phone: {
          require_from_group: [1, ".phone-group"]
        },
        home_phone: {
          require_from_group: [1, ".phone-group"]
        },
        password: {
          required: true,
          minlength: 6,
          maxlength: 16
        },
        repeatPassword: {
          required: true,
          minlength: 6,
          maxlength: 16,
          equalTo: '#password'
        },
        gender: {
          required: true
        },
        role: {
          required: true
        },
        languages: {
          required: true
        },
        verification: {
          required: true,
          smartCaptcha: 19
        },
        applicant_age: {
          required: true,
          min: 16
        },
        licence_no: {
          required: function(element) {
            return $("#applicant_age").val() > 19;
          }
        },
        child_name: {
          required: "#parents:checked"
        }

      },

      /* @validation error messages
      ---------------------------------------------- */

      messages: {
        firstname: {
          required: 'Enter first name or alias if unkown'
        },
        country: {
          required: 'Enter country'
        },
        city: {
          required: 'Enter city/village'
        },
        state: {
          required: 'Enter state/province'
        },
        birthyear: {
          required: 'Enter birth year or estimated birth year'
        },
        useremail: {
          required: 'Enter email address',
          email: 'Enter a VALID email address'
        },
        website: {
          required: 'Enter your website URL',
          url: 'URL should start with - http://www'
        },
        gender: {
          required: 'Choose a gender'
        },
        role: {
          required: 'Choose a role'
        },
        upload1: {
          required: 'Please browse a file',
          extension: 'File format not supported'
        },
        mobileos: {
          required: 'Please select a mobile platform'
        },
        comment: {
          required: 'Oops you forgot to comment',
          minlength: 'Enter at least 30 characters or more'
        },
        mobile_phone: {
          require_from_group: 'Fill at least a mobile contact'
        },
        home_phone: {
          require_from_group: 'Fill at least a home contact'
        },
        password: {
          required: 'Please enter a password'
        },
        repeatPassword: {
          required: 'Please repeat the above password',
          equalTo: 'Password mismatch detected'
        },
        gender: {
          required: 'Please choose gender'
        },
        languages: {
          required: 'Select laguages spoken'
        },
        verification: {
          required: 'Please enter verification code',
          smartCaptcha: 'Oops - enter a correct verification code'
        },
        applicant_age: {
          required: 'Enter applicant age',
          min: 'Must be 16 years and above'
        },
        licence_no: {
          required: 'Enter licence number'
        },
        child_name: {
          required: 'Please enter your childs name'
        }

      },

      /* @validation highlighting + error placement
      ---------------------------------------------------- */

      highlight: function(element, errorClass, validClass) {
        $(element).closest('.field').addClass(errorClass).removeClass(validClass);
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).closest('.field').removeClass(errorClass).addClass(validClass);
      },
      errorPlacement: function(error, element) {
        if (element.is(":radio") || element.is(":checkbox")) {
          element.closest('.option-group').after(error);
        } else {
          error.insertAfter(element.parent());
        }
      }

    });
    // Cache several DOM elements
    var pageHeader = $('.content-header').find('b');
    var adminForm = $('.admin-form');
    var options = adminForm.find('.option');
    var switches = adminForm.find('.switch');
    var buttons = adminForm.find('.button');
    var Panel = adminForm.find('.panel');

    // Form Skin Switcher
    $('#skin-switcher a').on('click', function() {
      var btnData = $(this).data('form-skin');

      $('#skin-switcher a').removeClass('item-active');
      $(this).addClass('item-active')

      adminForm.each(function(i, e) {
        var skins = 'theme-primary theme-info theme-success theme-warning theme-danger theme-alert theme-system theme-dark'
        var panelSkins = 'panel-primary panel-info panel-success panel-warning panel-danger panel-alert panel-system panel-dark'
        $(e).removeClass(skins).addClass('theme-' + btnData);
        Panel.removeClass(panelSkins).addClass('panel-' + btnData);
        pageHeader.removeClass().addClass('text-' + btnData);
      });

      $(options).each(function(i, e) {
        if ($(e).hasClass('block')) {
          $(e).removeClass().addClass('block mt15 option option-' + btnData);
        } else {
          $(e).removeClass().addClass('option option-' + btnData);
        }
      });

      // var sliders = $('.ui-timepicker-div', adminForm).find('.ui-slider');
      $('body').find('.ui-slider').each(function(i, e) {
        $(e).addClass('slider-primary');
      });

      $(switches).each(function(i, ele) {
        if ($(ele).hasClass('switch-round')) {
          if ($(ele).hasClass('block')) {
            $(ele).removeClass().addClass('block mt15 switch switch-round switch-' + btnData);
          } else {
            $(ele).removeClass().addClass('switch switch-round switch-' + btnData);
          }
        } else {
          if ($(ele).hasClass('block')) {
            $(ele).removeClass().addClass('block mt15 switch switch-' + btnData);
          } else {
            $(ele).removeClass().addClass('switch switch-' + btnData);
          }
        }

      });
      buttons.removeClass().addClass('button btn-' + btnData);
    });

    setTimeout(function() {
      adminForm.addClass('theme-primary');
      Panel.addClass('panel-primary');
      pageHeader.addClass('text-primary');

      $(options).each(function(i, e) {
        if ($(e).hasClass('block')) {
          $(e).removeClass().addClass('block mt15 option option-primary');
        } else {
          $(e).removeClass().addClass('option option-primary');
        }
      });

      // var sliders = $('.ui-timepicker-div', adminForm).find('.ui-slider');
      $('body').find('.ui-slider').each(function(i, e) {
        $(e).addClass('slider-primary');
      });

      $(switches).each(function(i, ele) {
        if ($(ele).hasClass('switch-round')) {
          if ($(ele).hasClass('block')) {
            $(ele).removeClass().addClass('block mt15 switch switch-round switch-primary');
          } else {
            $(ele).removeClass().addClass('switch switch-round switch-primary');
          }
        } else {
          if ($(ele).hasClass('block')) {
            $(ele).removeClass().addClass('block mt15 switch switch-primary');
          } else {
            $(ele).removeClass().addClass('switch switch-primary');
          }
        }
      });
      buttons.removeClass().addClass('button btn-primary');
    }, 800);



  });
    </script>

    <script>
    function showCSTemplates(sel){

      locations =[ /*this remains blank for first selection in drop-down list*/

      " ",

      /*option 1*/
      "Risks and benefits of the proposed procedure were discussed with the patient and the informed consent document was signed by the patient.\n\nThe Patient was then prepped with 1% betadine solution and a drop of Tetracaine topical Ophthalmic drop was applied to the _ eye.  An ophtalmic assistant stabilized the patient's head and elevated the lids with cotton tip applicators.\n\n0._ of Healon was injected into the anterior chamber with a 30 gauge needle.  Topical antibiotic was applied immediately to the eye.\n\nThe procedure was successful and without complication.",

      /*option 2*/
      "Patient was prepped with 1 drop of Tetracaine topical Ophthalmic drop to the left eye and the area was cleaned with 1% betadine solution.  1 unit of Healon was injected into the anterior chamber with a 30 guage needle. All risks and benefits were discussed with the patient.",

      /*option 3*/
      "Hospital or Surgery Center:\n Indication: Uncontrolled Intraocular Pressure\n\n Pre-Operative Diagnosis: Glaucoma-Right Eye\nPost-Operative Diagnosis: Glaucoma-Right Eye\n\nAnesthesia: IV Sedation and Peribulbar Anesthesia with 2% lidocaine without epinephrine and 0.75% bupivacaine with 0.5 cc wydase for a total of _ cc.\nAnesthesiologist:\nSurgical Assistant:\n\nProcedure: Ahmed Valve/Tube Shunt with Tutoplast Scleral Reinforcement Graft-Right Eye CPT 66180 and 67255\n\nThe patient was identified in the preoperative holding area and informed consent was verified. The eye was marked for surgery. After appropriate sedation, the periocular area was cleaned with alcohol and a peribulbar block was delivered to the orbit consisting of 2% Xylocaine and 0.75% Marcaine in a 50:50 mixture with Wydase for a total of __ cc. Anesthesia was confirmed and the patient was transported to the OR. The patient was sterilely prepped with 10% povidone-iodine (a 50:50 mixture with sterile saline was used to paint the lashes, irrigate the fornices and surface of the eye). The patient was draped in the usual manner taking care to keep the eyelashes out of the surgical field. A 4-0 silk suture was passed through the corneal stromal adjacent to the limbus superior and temporal. The silk bridal suture was used to retract the eye inferior.  A conjunctival peritomy was performed from 9:00 to 12:00 o'clock and Tenon's and conjunctiva were retracted backwards. Appropriate hemostasis was achieved with wetfield cautery. A subconjunctival pocket was created using curved Stevens scissors. A FP7 model Ahmed valve, serial no: _______, was first checked for patency with BSS and found to be patent. The Ahmed valve was placed into the _______________ subconjunctival pocket without complications and harnessed to the sclera using 9-0 nylon suture. The eye was placed back in primary position and the silk bridal suture was removed. A supersharp blade was used to create a temporal paracentesis. A 23-gauge needle was used to create a sclerotomy track superior-temporal into the anterior chamber flat with the iris plane. The tube was appropriately trimmed and then passed through the sclerotomy site into the anterior chamber. The anterior neck of the tube was harnessed to the sclera using a 9-0 nylon suture. Tutoplast that had been previously soaked in BSS was trimmed appropriately to be placed on top of the tube. 9-0 nylon was used to anchor the tutoplast on to sclera on each side. The conjunctiva was then reapproximated at the limbus using 8-0 vicryl suture. Subconjunctival injections of Ancef and Dexamethasone were placed in the inferior fornix (0.3 cc of each). The eye was appropriately cleaned. Maxitrol ointment was placed on the surface of the eye. The eye was patched and shielded, and the patient was transported to the post-operative recovery unit in stable condition.\n\nComplications: None\nEBL: less than 1 cc\nSpecimens: None\n\nPlan: The eye was patched and shielded. The patient is to leave the patch and shield in place until tomorrow morning when it will be removed in the clinic and post-operative medications will be started. Tylenol 1-2 tablets q4-6 hours prn for pain. ",

      /*option 4*/
      "Procedure: ALT\n\nProcedure Note: Informed consent was verified. The eye undergoing treatment was pre-treated with alphagan-P and proparacaine. A Ritch laser lens was used to direct the laser beam to the trabecular meshwork.\n\nPower:  mW\nDurantion: 0.2 seconds\nSpot Size: 50 microns\nNumber of Shots:\n\nComplications: None\n\nThe eye was rinsed with sterile saline and alphagan P was placed in the eye.\n\nThe patient will have a post-op IOP check.",

      /*option 5*/
      "Argon Iridoplasty",

      /*option 6*/
      "Automated Keratometry was performed/confirmed today:\nReadings are as follow:\n\nOD: @\nOS: @",

      /*option 7*/
      "Procedure: Axial Length Measurement/A-Scan\nPerson Performing Procedure: Relief Jones, III, M.D.\n\nThe patient's eyes were anesthetized with proparacaine eye drops. The axial length of each eye was then measure with the PalmScan AP2000 using the _ method.\n\nResults:\nOD:  mm with SEM=\nOS:  mm with SEM=\n\nThe patient tolerated the procedure well, and no complications were encountered.",

      /*option 8*/
      "Indication: Uncontrolled Intraocular Pressure\nPre-Operative Diagnosis: Glaucoma-Left Eye\nPost-Operative Diagnosis: Glaucoma-Left Eye\n\nAnesthesia: Sedation and Peribulbar Anesthesia with 2% lidocaine without epinephrine and 0.75% bupivacaine with 0.5 cc wydase for a total of _ cc.\nAnesthesiologist:\nSurgical Assistant:\n\nProcedure: Baerveldt Valve/Tube Shunt with Tutoplast Scleral Reinforcement Graft-Left Eye CPT 66180 and 67255\n\nThe patient was identified in the preoperative holding area and informed consent was verified. The eye was marked for surgery. After appropriate sedation, the periocular area was cleaned with alcohol and a peribulbar block was delivered to the orbit. Anesthesia was confirmed and the patient was transported to the OR. The patient was sterilely prepped with 10% povidone-iodine (a 50:50 mixture with sterile saline was used to paint the lashes, irrigate the fornices and surface of the eye). The patient was draped in the usual sterile manner taking care to keep the eyelashes out of the surgical field. A conjunctival peritomy was performed for 3 clock hours in the superior-temporal quandrant. Tenon's and conjunctiva were retracted. Appropriate hemostasis was achieved with blunt-tip wet-field cautery. A subconjunctival pocket was created using curved Stevens scissors. The size of the pocket was checked by placing a weckcell into the pocket. A Baerveldt glaucoma valve was checked for patency by attaching a 30 gauge cannula on a syringe filled with BSS to the tube. The device was patent. The Baerveldt valve was placed into the superior-temporal subconjunctival pocket placing one edge under the superior rectus muscle and the other edge under the lateral rectus (muscle hooks were used to identify and lift the rectus muscles). The valve was harnessed to the sclera using 9-0 nylon suture. The eye was returned to primary position and the tube was trimmed to an appropriate length. A temporal paracentesis was created with a super-sharp blade. A 23-gauge needle was used to create a sclerotomy track into the anterior chamber. The tube was passed through the sclerotomy and into the anterior chamber. The anterior neck of the tube was tied tightly to occlude flow with 9-0 vicryl suture. The 23 gauge needle was then used to create 3 openings in the tube anterior to the part of the tube that had been occluded with the 9-0 vicryl suture. Tutoplast that had been previously soaked in BSS was trimmed to an appropriate size and harnessed with 9-0 nylon on each side to the sclera. The conjunctiva was then reapproximated at the limbus using two 8-0 Vicryl wing sutures. Subconjunctival injections of Ancef (0.3 cc) and Dexamethasone (0.3 cc) were placed in the inferior nasal fornix. The eye was irrigated with BSS. Vigamox and Maxitrol ointment was placed on the surface of the eye.\n\nComplications: None\nEBL: less than 1 cc\nSpecimens: None\n\nPlan: The eye was patched and shielded. The patient is to leave the patch and shield in place until tomorrow morning when it will be removed in the clinic and post-operative medications will be started. Tylenol 1-2 tablets q4-6 hours prn for pain.",

      /*option 9*/
      "Hospital or Surgery Center:\nIndication: Uncontrolled Intraocular Pressure\n\nPre-Operative Diagnosis: Glaucoma-Right Eye\nPost-Operative Diagnosis: Glaucoma-Right Eye\n\nAnesthesia: IV Sedation and Peribulbar Anesthesia with 2% lidocaine without epinephrine and 0.75% bupivacaine with 0.5 cc wydase for a total of _ cc.\nAnesthesiologist:\nSurgical Assistant:\n\nProcedure: Ahmed Valve/Tube Shunt with Tutoplast Scleral Reinforcement Graft-Right Eye CPT 66180 and 67255\nThe patient was identified in the preoperative holding area and informed consent was verified. The eye was marked for surgery. After appropriate sedation, the periocular area was cleaned with alcohol and a peribulbar block was delivered to the orbit consisting of 2% Xylocaine and 0.75% Marcaine in a 50:50 mixture with Wydase for a total of __ cc. Anesthesia was confirmed and the patient was transported to the OR. The patient was sterilely prepped with 10% povidone-iodine (a 50:50 mixture with sterile saline was used to paint the lashes, irrigate the fornices and surface of the eye). The patient was draped in the usual manner taking care to keep the eyelashes out of the surgical field. A 4-0 silk suture was passed through the corneal stromal adjacent to the limbus superior and temporal. The silk bridal suture was used to retract the eye inferior.  A conjunctival peritomy was performed from 9:00 to 12:00 o'clock and Tenon's and conjunctiva were retracted backwards. Appropriate hemostasis was achieved with wetfield cautery. A subconjunctival pocket was created using curved Stevens scissors. A FP7 model Ahmed valve, serial no: _______, was first checked for patency with BSS and found to be patent. The Ahmed valve was placed into the _______________ subconjunctival pocket without complications and harnessed to the sclera using 9-0 nylon suture. The eye was placed back in primary position and the silk bridal suture was removed. A supersharp blade was used to create a temporal paracentesis. A 23-gauge needle was used to create a sclerotomy track superior-temporal into the anterior chamber flat with the iris plane. The tube was appropriately trimmed and then passed through the sclerotomy site into the anterior chamber. The anterior neck of the tube was harnessed to the sclera using a 9-0 nylon suture. Tutoplast that had been previously soaked in BSS was trimmed appropriately to be placed on top of the tube. 9-0 nylon was used to anchor the tutoplast on to sclera on each side. The conjunctiva was then reapproximated at the limbus using 8-0 vicryl suture. Subconjunctival injections of Ancef and Dexamethasone were placed in the inferior fornix (0.3 cc of each). The eye was appropriately cleaned. Maxitrol ointment was placed on the surface of the eye. The eye was patched and shielded, and the patient was transported to the post-operative recovery unit in stable condition.\n\nComplications: None\nEBL: less than 1 cc\nSpecimens: None\n\nPlan: The eye was patched and shielded. The patient is to leave the patch and shield in place until tomorrow morning when it will be removed in the clinic and post-operative medications will be started. Tylenol 1-2 tablets q4-6 hours prn for pain. ",

      /*option 10*/
      "One drop of proparacaine was instilled into both eyes. The eyelid with the chalazion was cleaned with an alcohol pad. 1 cc of lidocaine 2% with Epinephrine 1:100,000 was injected sub-cutaneously into the lid. After the lid was anesthetized, the periocular area was prepped with povidone-iodine and draped. The chalazion clamp was placed on the lid over the chalazion adn the lid was inverted. The lesion was incised with a 15-0 blade. The chalazion was excised using 0.12 forceps and sharp Wescott scissors. A chalazion scoop was used to scrape any remaining remnants of the capsule. The chalazion clamp was removed and hemostasis was obtained with pressure. Bacitracin ung was applied to the surface of the eye and a pressure patch was applied to the eye. The patient is to remove the pressure patch in 3-4 hours and start the bacitracin ung qid. Ice packs can be applied to help with swelling and Tylenol can be used as directed on the bottle for pain.\n\n F/U in 1 week.",

      /*option 11*/
      "Date of Procedure:\n\nProcedure: Diode Cyclophotocoagulation _ Eye\nDiagnosis: _ Glaucoma uncontrolled with maximum tolerated medical therapy\n\nSurgeon: Relief Jones, III, MD\nAssistant:\n\nAnesthesia: Retrobulbar anesthesia with 2% Lidocaine without epinephrine and 0.75 bupivacaine (1:1) for a total of _ cc.\n\nThe eye was anesthetized with a drop of proparacaine. The periocular area and eyelashes with prepped with povidone-iodine. A retrobular bulbar block was performed (see above) without complication. An eyelid speculum was placed. A G-probe was used to trans-sclerally treat the ciliary body with the diode laser.\n\nPower: 2000 mW\nDuration: 2000 ms\nNumber of Spots: Superior: _  Inferior: _\n\nComplications: None\nEstimated Blood Loss: None\nSpecimens: None\n\nThe patient is to continue the current drop regimen including Atropine TID and Prednisolone QID. A prescription for Vicodin was provided for pain control.\n\n F/U in 1 week.",

      /*option 12*/
      "Indication: Decreased visual acuity affecting activities of daily living (ADLs)\n\nPre-Operative Diagnosis: Cataract-Left Eye\nPost-Operative Diagnosis: Cataract-Left Eye\nICD-9 366.16\nAnesthesia: Sedation and Topical with Intracameral Anesthesia with 2% lidocaine gel and Non-preserved 1% lidocaine _ cc, respectively.\nAnesthesiologist:\nSurgical Assistant:\n\n\nProcedure: ECCE (Phacoemulsificaton) with IOL Placement CPT 66984\n         The patient was identified in the preoperative holding area and informed consent was verified. The eye was marked for surgery. After sedation, 2% Lidocaine gel was placed on the surface of the eye. Anesthesia was confirmed and the patient was transported to the OR. The patient was sterilely prepped with 10% povidone-iodine (a 1:1mixture with sterile saline was used to paint the lashes, irrigate the fornices and surface of the eye). The patient was draped in the usual sterile manner taking care to keep the eyelashes out of the surgical field. The eye was entered using a supersharp blade at the 1:30 o'clock position and 0.2 cc of 1%, non-preserved lidocaine was placed in the anterior chamber for 30 seconds. The anterior chamber was filled with Viscoat. A microkeratome was used to create a biplanar clear corneal incision at the 11:00 o'clock position. A cystotome was used to initiate a capsular flap and Utrata forceps were used to create a continuous curvilinear capsulorrhexis. Hydrodissection and nucleus rotation were achieved. Phacoemulsification was used to remove the nucleus in a divide and conquer fashion. Remaining cortical material was removed with the irrigation/aspiration handpiece. Provisc was used to inflate the capsular bag. The lens was placed in the bag without complications. The remaining viscoelastic was aspirated using irrigation and aspiration. BSS was used to hydrate the surgical wounds. No wound leaks were identified. Vigamox was placed on the eye. The patient was transported to the post-operative recovery area in stable condition.\n\n\nLens Model and Serial #:\nU/S Time:\nComplications: None\nEBL: less than 0.1 cc\nSpecimens: None\n        Plan: The eye was shielded. The patient is to leave the shield in place, removing it only to place the post-operative drops (same as pre-operative drops). Tylenol 1-2 tablets q4-6 hours prn for pain.",

      /*option 13*/
      "Indication: Decreased visual acuity affecting activities of daily living (ADLs)\n\n    Pre-Operative Diagnosis: Cataract-Right Eye\nPost-Operative Diagnosis: Cataract-Right Eye\n  ICD-9 366.16Anesthesia: Sedation and Topical with Intracameral Anesthesia with 2% lidocaine gel and Non-preserved 1% lidocaine _ cc, respectively.\n\nAnesthesiologist:\nSurgical Assistant:\n\n  Procedure: ECCE (Phacoemulsificaton) with IOL Placement CPT 66984  The patient was identified in the preoperative holding area and informed consent was verified. The eye was marked for surgery. After sedation, 2% Lidocaine gel was placed on the surface of the eye. Anesthesia was confirmed and the patient was transported to the OR. The patient was sterilely prepped with 10% povidone-iodine (a 1:1mixture with sterile saline was used to paint the lashes, irrigate the fornices and surface of the eye). The patient was draped in the usual sterile manner taking care to keep the eyelashes out of the surgical field. The eye was entered using a supersharp blade at the 1:30 o'clock position and 0.2 cc of 1%, non-preserved lidocaine was placed in the anterior chamber for 30 seconds. The anterior chamber was filled with Viscoat. A microkeratome was used to create a biplanar clear corneal incision at the 11:00 o'clock position. A cystotome was used to initiate a capsular flap and Utrata forceps were used to create a continuous curvilinear capsulorrhexis. Hydrodissection and nucleus rotation were achieved. Phacoemulsification was used to remove the nucleus in a divide and conquer fashion. Remaining cortical material was removed with the irrigation/aspiration handpiece. Provisc was used to inflate the capsular bag. The lens was placed in the bag without complications. The remaining viscoelastic was aspirated using irrigation and aspiration. BSS was used to hydrate the surgical wounds. No wound leaks were identified. Vigamox was placed on the eye. The patient was transported to the post-operative recovery area in stable condition.\n\nLens Model and Serial #:\nU/S Time:\nComplications: None\nEBL: less than 0.1 cc\nSpecimens: None\n\n Plan: The eye was shielded. The patient is to leave the shield in place, removing it only to place the post-operative drops (same as pre-operative drops). Tylenol 1-2 tablets q4-6 hours prn for pain.",

      /*option 14*/
      "Indication:\nPre-Operative Diagnosis:\nPost-Operative Diagnosis:\nAnesthesia:\n Anesthesiologist:\nSurgical Assistant:\nProcedure:\nComplications:\nEBL:\nSpecimens:\nPlan:",

      /*option 15*/
      "OD:RIGHT  Topical proparicaine anesthesia +2 PCO removed: 79 spots range 2.3-4.1 mJ; successful, no complications, total laser energy .219 Joule.  Topical Omnipred taper over 15 days.",

      /*option 16*/
      "Indication: The patient reports a decrease in best corrected visual acuity in the left eye which is affecting activities of daily living (ADLs).\n      Pre-operative Diagnosis: Posterior Capsular Opacification-Left Eye\nPost-operative Diagnosis: Posterior Capsular Opacification-Left Eye\nICD-9 366.50\n\nProcedure: YAG Laser Capsulotomy CPT 66821-LT\nInformed consent was obtained after discussing the risks, benefits, and alternatives to the procedure. One drop of brimonidine 0.10%, phenylephrine 2.5, and tropicamide 1% was placed on the left eye prior to the procedure. After dilation, one drop of proparicaine was placed on the left eye. A Mandelkorn iridotomy/capsulotomy lens was placed on the left eye with goniosol. A circular opening was created in the opacified posterior capsule. The suface of the eye was irigated with saline and a drop of brimonidine 0.10% was placed on the left eye.\n\nLaser Settings\nInterval: single\n# Shots:\nPower: mJ\nTotal Energy:\n\nComplications: No complications were encountered.\n EBL: None\nSpecimens: None\n\nPlan: The patient was prescribed prednisolone acetate 1% to be used in the surgical eye (left) four times per day for 1 week. The patient will return for a dilated fundus exam in 1 week.    ",

      /*option 17*/
      "Indication: The patient reports a decrease in best corrected visual acuity in the left eye which is affecting activities of daily living (ADLs).\nPre-operative Diagnosis: Posterior Capsular Opacification-Left Eye\nPost-operative Diagnosis: Posterior Capsular Opacification-Left Eye\n      ICD-9 366.50\n\nProcedure: YAG Laser Capsulotomy CPT 66821-LT\nInformed consent was obtained after discussing the risks, benefits, and alternatives to the procedure. One drop of brimonidine 0.10%, phenylephrine 2.5, and tropicamide 1% was placed on the left eye prior to the procedure. After dilation, one drop of proparicaine was placed on the left eye. A Mandelkorn iridotomy/capsulotomy lens was placed on the left eye with goniosol. A circular opening was created in the opacified posterior capsule. The suface of the eye was irigated with saline and a drop of brimonidine 0.10% was placed on the left eye.\n\nLaser Settings\nInterval: single\n# Shots:\nPower: mJ\nTotal Energy:\n\nComplications: No complications were encountered.\nEBL: None\nSpecimens: None\n\nPlan: The patient was prescribed prednisolone acetate 1% to be used in the surgical eye (left) four times per day for 1 week. The patient will return for a dilated fundus exam in 1 week.    ",

      /*option 18*/
      "Procedure: YAG Laser Iridotomy _ Eye\nIndication: _\nThe vision and IOP were checked prior to the laser procedure. The eye was pre-treated with alphagan-p and pilocarpine 2%.\n\n The patient was taken to the laser room where the YAG laser was used to create a peripheral iridotomy.\n\n  Complications: None\nLens: Abraham Iridotomy Lens\n\nPower:\n # of Shots:\n\nPost-Laser: The eye was irrigated with Saline and a drop of _ was instilled.\n\nF/U in 1 week",];
        srcLocation = locations[sel.selectedIndex];
        if (srcLocation != undefined && srcLocation != "") {
                        document.getElementById('surgicalTemplate').innerHTML= srcLocation;
      }
    }
    </script>

<script>
$(document).ready(function () {
    $('#saveSurgery').on('click',function() {
      var patientA = {!! json_encode($patient->toArray()) !!};
      $("#pid").val(patientA.id);
    })
})
</script>

<script>
$(document).ready(function () {
    $('#fileSend').on('click',function() {
      var patientA = {!! json_encode($patient->toArray()) !!};
      $("#fpid").val(patientA.id);
    })
})
</script>





   {{-- Custom dropzone.js --}}
  {!! HTML::script('js/dropzone.js'); !!}

      @endsection
