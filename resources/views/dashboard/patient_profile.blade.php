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
                        <label for="weight" class="field prepend-icon">
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
      <div id="tab2" class="tab-pane"></div>
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

      <div id="tab4" class="tab-pane"></div>
      <div id="tab5" class="tab-pane"></div>
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
          null
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
      @endsection
