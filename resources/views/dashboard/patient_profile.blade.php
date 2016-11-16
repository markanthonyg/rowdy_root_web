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
    <table class="table table-hover" id="datatable2" style="">
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

<!-- Modal -->
<div class="modal fade" id="myModal" style="padding:0;">
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
      </div>
      <div id="tab2" class="tab-pane"></div>
      <div id="tab3" class="tab-pane">
        TEST
      </div>

      <div id="tab4" class="tab-pane">
        <label for="#templateSelect">Surgical Templates:</label>
        <select class="form-control input-sm" id="templateSelect">
          <option>Ahmed Valve Graft</option>
          <option>Cataract Removal</option>
          <option>Argon Iridoplasty</option>
        </select>

</br>
        <div class="panel">
  <div class="panel-body pn of-h" id="summer-demo">
    <div class="summernote" style="height: 400px; display: none;">
    </div>
    <div class="note-editor">
      <div class="note-dropzone">
        <div class="note-dropzone-message">
        </div>
      </div>
      <div class="note-dialog">
        <div class="note-image-dialog modal" aria-hidden="false">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" aria-hidden="true" tabindex="-1">×
                </button>
                <h4 class="modal-title">Insert Image
                </h4>
              </div>
              <form class="note-modal-form">
                <div class="modal-body">
                  <div class="form-group row-fluid note-group-select-from-files">
                    <label>Select from files
                    </label>
                    <input class="note-image-input" type="file" name="files" accept="image/*">
                  </div>
                  <div class="form-group row-fluid">
                    <label>Image URL
                    </label>
                    <input class="note-image-url form-control span12" type="text">
                  </div>
                </div>
                <div class="modal-footer">
                  <button href="#" class="btn btn-primary note-image-btn disabled" disabled="">Insert Image
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="note-link-dialog modal" aria-hidden="false">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" aria-hidden="true" tabindex="-1">×
                </button>
                <h4 class="modal-title">Insert Link
                </h4>
              </div>
              <form class="note-modal-form">
                <div class="modal-body">
                  <div class="form-group row-fluid">
                    <label>Text to display
                    </label>
                    <input class="note-link-text form-control span12" type="text">
                  </div>
                  <div class="form-group row-fluid">
                    <label>To what URL should this link go?
                    </label>
                    <input class="note-link-url form-control span12" type="text">
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" checked=""> Open in new window
                    </label>
                  </div>
                </div>
                <div class="modal-footer">
                  <button href="#" class="btn btn-primary note-link-btn disabled" disabled="">Insert Link
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="note-help-dialog modal" aria-hidden="false">
          <div class="modal-dialog">
            <div class="modal-content">
              <form class="note-modal-form">
                <div class="modal-body">
                  <a class="modal-close pull-right" aria-hidden="true" tabindex="-1">Close
                  </a>
                  <div class="title">Keyboard shortcuts
                  </div>
                  <div class="note-shortcut-row row">
                    <div class="note-shortcut note-shortcut-col col-sm-6 col-xs-12">
                      <div class="note-shortcut-row row">
                        <div class="note-shortcut-col col-xs-6 note-shortcut-title col-xs-offset-6">Action
                        </div>
                      </div>
                      <div class="note-shortcut-row row">
                        <div class="note-shortcut-col col-xs-6 note-shortcut-key">⌘ + Z
                        </div>
                        <div class="note-shortcut-col col-xs-6 note-shortcut-name">Undo
                        </div>
                      </div>
                      <div class="note-shortcut-row row">
                        <div class="note-shortcut-col col-xs-6 note-shortcut-key">⌘ + ⇧ + Z
                        </div>
                        <div class="note-shortcut-col col-xs-6 note-shortcut-name">Redo
                        </div>
                      </div>
                      <div class="note-shortcut-row row">
                        <div class="note-shortcut-col col-xs-6 note-shortcut-key">⌘ + ]
                        </div>
                        <div class="note-shortcut-col col-xs-6 note-shortcut-name">Indent
                        </div>
                      </div>
                      <div class="note-shortcut-row row">
                        <div class="note-shortcut-col col-xs-6 note-shortcut-key">⌘ + [
                        </div>
                        <div class="note-shortcut-col col-xs-6 note-shortcut-name">undefined
                        </div>
                      </div>
                      <div class="note-shortcut-row row">
                        <div class="note-shortcut-col col-xs-6 note-shortcut-key">⌘ + ENTER
                        </div>
                        <div class="note-shortcut-col col-xs-6 note-shortcut-name">Insert Horizontal Rule
                        </div>
                      </div>
                    </div>
                    <div class="note-shortcut note-shortcut-col col-sm-6 col-xs-12">
                      <div class="note-shortcut-row row">
                        <div class="note-shortcut-col col-xs-6 note-shortcut-title col-xs-offset-6">Text formatting
                        </div>
                      </div>
                      <div class="note-shortcut-row row">
                        <div class="note-shortcut-col col-xs-6 note-shortcut-key">⌘ + B
                        </div>
                        <div class="note-shortcut-col col-xs-6 note-shortcut-name">Bold
                        </div>
                      </div>
                      <div class="note-shortcut-row row">
                        <div class="note-shortcut-col col-xs-6 note-shortcut-key">⌘ + I
                        </div>
                        <div class="note-shortcut-col col-xs-6 note-shortcut-name">Italic
                        </div>
                      </div>
                      <div class="note-shortcut-row row">
                        <div class="note-shortcut-col col-xs-6 note-shortcut-key">⌘ + U
                        </div>
                        <div class="note-shortcut-col col-xs-6 note-shortcut-name">Underline
                        </div>
                      </div>
                      <div class="note-shortcut-row row">
                        <div class="note-shortcut-col col-xs-6 note-shortcut-key">⌘ + ⇧ + S
                        </div>
                        <div class="note-shortcut-col col-xs-6 note-shortcut-name">undefined
                        </div>
                      </div>
                      <div class="note-shortcut-row row">
                        <div class="note-shortcut-col col-xs-6 note-shortcut-key">⌘ + \
                        </div>
                        <div class="note-shortcut-col col-xs-6 note-shortcut-name">Remove Font Style
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="note-shortcut-row row">
                    <div class="note-shortcut note-shortcut-col col-sm-6 col-xs-12">
                      <div class="note-shortcut-row row">
                        <div class="note-shortcut-col col-xs-6 note-shortcut-title col-xs-offset-6">Document Style
                        </div>
                      </div>
                      <div class="note-shortcut-row row">
                        <div class="note-shortcut-col col-xs-6 note-shortcut-key">⌘ + NUM0
                        </div>
                        <div class="note-shortcut-col col-xs-6 note-shortcut-name">Normal
                        </div>
                      </div>
                      <div class="note-shortcut-row row">
                        <div class="note-shortcut-col col-xs-6 note-shortcut-key">⌘ + NUM1
                        </div>
                        <div class="note-shortcut-col col-xs-6 note-shortcut-name">Header 1
                        </div>
                      </div>
                      <div class="note-shortcut-row row">
                        <div class="note-shortcut-col col-xs-6 note-shortcut-key">⌘ + NUM2
                        </div>
                        <div class="note-shortcut-col col-xs-6 note-shortcut-name">Header 2
                        </div>
                      </div>
                      <div class="note-shortcut-row row">
                        <div class="note-shortcut-col col-xs-6 note-shortcut-key">⌘ + NUM3
                        </div>
                        <div class="note-shortcut-col col-xs-6 note-shortcut-name">Header 3
                        </div>
                      </div>
                      <div class="note-shortcut-row row">
                        <div class="note-shortcut-col col-xs-6 note-shortcut-key">⌘ + NUM4
                        </div>
                        <div class="note-shortcut-col col-xs-6 note-shortcut-name">Header 4
                        </div>
                      </div>
                      <div class="note-shortcut-row row">
                        <div class="note-shortcut-col col-xs-6 note-shortcut-key">⌘ + NUM5
                        </div>
                        <div class="note-shortcut-col col-xs-6 note-shortcut-name">Header 5
                        </div>
                      </div>
                      <div class="note-shortcut-row row">
                        <div class="note-shortcut-col col-xs-6 note-shortcut-key">⌘ + NUM6
                        </div>
                        <div class="note-shortcut-col col-xs-6 note-shortcut-name">Header 6
                        </div>
                      </div>
                    </div>
                    <div class="note-shortcut note-shortcut-col col-sm-6 col-xs-12">
                      <div class="note-shortcut-row row">
                        <div class="note-shortcut-col col-xs-6 note-shortcut-title col-xs-offset-6">Paragraph formatting
                        </div>
                      </div>
                      <div class="note-shortcut-row row">
                        <div class="note-shortcut-col col-xs-6 note-shortcut-key">⌘ + ⇧ + L
                        </div>
                        <div class="note-shortcut-col col-xs-6 note-shortcut-name">Align left
                        </div>
                      </div>
                      <div class="note-shortcut-row row">
                        <div class="note-shortcut-col col-xs-6 note-shortcut-key">⌘ + ⇧ + E
                        </div>
                        <div class="note-shortcut-col col-xs-6 note-shortcut-name">Align center
                        </div>
                      </div>
                      <div class="note-shortcut-row row">
                        <div class="note-shortcut-col col-xs-6 note-shortcut-key">⌘ + ⇧ + R
                        </div>
                        <div class="note-shortcut-col col-xs-6 note-shortcut-name">Align right
                        </div>
                      </div>
                      <div class="note-shortcut-row row">
                        <div class="note-shortcut-col col-xs-6 note-shortcut-key">⌘ + ⇧ + J
                        </div>
                        <div class="note-shortcut-col col-xs-6 note-shortcut-name">Justify full
                        </div>
                      </div>
                      <div class="note-shortcut-row row">
                        <div class="note-shortcut-col col-xs-6 note-shortcut-key">⌘ + ⇧ + NUM7
                        </div>
                        <div class="note-shortcut-col col-xs-6 note-shortcut-name">Ordered list
                        </div>
                      </div>
                      <div class="note-shortcut-row row">
                        <div class="note-shortcut-col col-xs-6 note-shortcut-key">⌘ + ⇧ + NUM8
                        </div>
                        <div class="note-shortcut-col col-xs-6 note-shortcut-name">Unordered list
                        </div>
                      </div>
                    </div>
                  </div>
                  <p class="text-center">
                    <a href="//hackerwins.github.io/summernote/" target="_blank">Summernote 0.6.0
                    </a> ·
                    <a href="//github.com/HackerWins/summernote" target="_blank">Project
                    </a> ·
                    <a href="//github.com/HackerWins/summernote/issues" target="_blank">Issues
                    </a>
                  </p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="note-handle">
        <div class="note-control-selection" style="display: none;">
          <div class="note-control-selection-bg">
          </div>
          <div class="note-control-holder note-control-nw">
          </div>
          <div class="note-control-holder note-control-ne">
          </div>
          <div class="note-control-holder note-control-sw">
          </div>
          <div class="note-control-sizing note-control-se">
          </div>
          <div class="note-control-selection-info">
          </div>
        </div>
      </div>
      <div class="note-popover">
        <div class="note-link-popover popover bottom in" style="display: none;">
          <div class="arrow">
          </div>
          <div class="popover-content">
            <a href="http://www.google.com" target="_blank">www.google.com
            </a>&nbsp;&nbsp;
            <div class="note-insert btn-group">
              <button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="showLinkDialog" data-hide="true" tabindex="-1" data-original-title="Edit (⌘+K)">
                <i class="fa fa-edit">
                </i>
              </button>
              <button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="unlink" tabindex="-1" data-original-title="Unlink">
                <i class="fa fa-unlink">
                </i>
              </button>
            </div>
          </div>
        </div>
        <div class="note-image-popover popover bottom in" style="display: none;">
          <div class="arrow">
          </div>
          <div class="popover-content">
            <div class="btn-group">
              <button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="resize" data-value="1" tabindex="-1" data-original-title="Resize Full">
                <span class="note-fontsize-10">100%
                </span>
              </button>
              <button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="resize" data-value="0.5" tabindex="-1" data-original-title="Resize Half">
                <span class="note-fontsize-10">50%
                </span>
              </button>
              <button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="resize" data-value="0.25" tabindex="-1" data-original-title="Resize Quarter">
                <span class="note-fontsize-10">25%
                </span>
              </button>
            </div>
            <div class="btn-group">
              <button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="floatMe" data-value="left" tabindex="-1" data-original-title="Float Left">
                <i class="fa fa-align-left">
                </i>
              </button>
              <button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="floatMe" data-value="right" tabindex="-1" data-original-title="Float Right">
                <i class="fa fa-align-right">
                </i>
              </button>
              <button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="floatMe" data-value="none" tabindex="-1" data-original-title="Float None">
                <i class="fa fa-align-justify">
                </i>
              </button>
            </div>
            <div class="btn-group">
              <button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="imageShape" data-value="img-rounded" tabindex="-1" data-original-title="Shape: Rounded">
                <i class="fa fa-square">
                </i>
              </button>
              <button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="imageShape" data-value="img-circle" tabindex="-1" data-original-title="Shape: Circle">
                <i class="fa fa-circle-o">
                </i>
              </button>
              <button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="imageShape" data-value="img-thumbnail" tabindex="-1" data-original-title="Shape: Thumbnail">
                <i class="fa fa-picture-o">
                </i>
              </button>
              <button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="imageShape" tabindex="-1" data-original-title="Shape: None">
                <i class="fa fa-times">
                </i>
              </button>
            </div>
            <div class="btn-group">
              <button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="removeMedia" data-value="none" tabindex="-1" data-original-title="Remove Image">
                <i class="fa fa-trash-o">
                </i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="note-toolbar btn-toolbar">
        <div class="note-style btn-group">
          <button type="button" class="btn btn-default btn-sm btn-small dropdown-toggle" data-toggle="dropdown" title="" tabindex="-1" data-original-title="Style">
            <i class="fa fa-magic">
            </i>
            <span class="caret">
            </span>
          </button>
          <ul class="dropdown-menu">
            <li>
              <a data-event="formatBlock" href="#" data-value="p">Normal
              </a>
            </li>
            <li>
              <a data-event="formatBlock" href="#" data-value="blockquote">
                <blockquote>Quote
                </blockquote>
              </a>
            </li>
            <li>
              <a data-event="formatBlock" href="#" data-value="pre">Code
              </a>
            </li>
            <li>
              <a data-event="formatBlock" href="#" data-value="h1">
                <h1>Header 1
                </h1>
              </a>
            </li>
            <li>
              <a data-event="formatBlock" href="#" data-value="h2">
                <h2>Header 2
                </h2>
              </a>
            </li>
            <li>
              <a data-event="formatBlock" href="#" data-value="h3">
                <h3>Header 3
                </h3>
              </a>
            </li>
            <li>
              <a data-event="formatBlock" href="#" data-value="h4">
                <h4>Header 4
                </h4>
              </a>
            </li>
            <li>
              <a data-event="formatBlock" href="#" data-value="h5">
                <h5>Header 5
                </h5>
              </a>
            </li>
            <li>
              <a data-event="formatBlock" href="#" data-value="h6">
                <h6>Header 6
                </h6>
              </a>
            </li>
          </ul>
        </div>
        <div class="note-font btn-group">
          <button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="bold" tabindex="-1" data-original-title="Bold (⌘+B)">
            <i class="fa fa-bold">
            </i>
          </button>
          <button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="italic" tabindex="-1" data-original-title="Italic (⌘+I)">
            <i class="fa fa-italic">
            </i>
          </button>
          <button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="underline" tabindex="-1" data-original-title="Underline (⌘+U)">
            <i class="fa fa-underline">
            </i>
          </button>
          <button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="removeFormat" tabindex="-1" data-original-title="Remove Font Style (⌘+\)">
            <i class="fa fa-eraser">
            </i>
          </button>
        </div>
        <div class="note-fontname btn-group">
          <button type="button" class="btn btn-default btn-sm btn-small dropdown-toggle" data-toggle="dropdown" title="" tabindex="-1" data-original-title="Font Family">
            <span class="note-current-fontname">"Open Sans"
            </span>
            <span class="caret">
            </span>
          </button>
          <ul class="dropdown-menu">
            <li>
              <a data-event="fontName" href="#" data-value="Arial" class="">
                <i class="fa fa-check">
                </i> Arial
              </a>
            </li>
            <li>
              <a data-event="fontName" href="#" data-value="Arial Black" class="">
                <i class="fa fa-check">
                </i> Arial Black
              </a>
            </li>
            <li>
              <a data-event="fontName" href="#" data-value="Comic Sans MS" class="">
                <i class="fa fa-check">
                </i> Comic Sans MS
              </a>
            </li>
            <li>
              <a data-event="fontName" href="#" data-value="Courier New" class="">
                <i class="fa fa-check">
                </i> Courier New
              </a>
            </li>
            <li>
              <a data-event="fontName" href="#" data-value="Helvetica Neue" class="">
                <i class="fa fa-check">
                </i> Helvetica Neue
              </a>
            </li>
            <li>
              <a data-event="fontName" href="#" data-value="Impact" class="">
                <i class="fa fa-check">
                </i> Impact
              </a>
            </li>
            <li>
              <a data-event="fontName" href="#" data-value="Lucida Grande" class="">
                <i class="fa fa-check">
                </i> Lucida Grande
              </a>
            </li>
            <li>
              <a data-event="fontName" href="#" data-value="Tahoma" class="">
                <i class="fa fa-check">
                </i> Tahoma
              </a>
            </li>
            <li>
              <a data-event="fontName" href="#" data-value="Times New Roman" class="">
                <i class="fa fa-check">
                </i> Times New Roman
              </a>
            </li>
            <li>
              <a data-event="fontName" href="#" data-value="Verdana" class="">
                <i class="fa fa-check">
                </i> Verdana
              </a>
            </li>
          </ul>
        </div>
        <div class="note-color btn-group">
          <button type="button" class="btn btn-default btn-sm btn-small note-recent-color" title="" data-event="color" data-value="{&quot;backColor&quot;:&quot;yellow&quot;}" tabindex="-1" data-original-title="Recent Color">
            <i class="fa fa-font" style="color:black;background-color:yellow;">
            </i>
          </button>
          <button type="button" class="btn btn-default btn-sm btn-small dropdown-toggle" data-toggle="dropdown" title="" tabindex="-1" data-original-title="More Color">
            <span class="caret">
            </span>
          </button>
          <ul class="dropdown-menu">
            <li>
              <div class="btn-group">
                <div class="note-palette-title">Background Color
                </div>
                <div class="note-color-reset" data-event="backColor" data-value="inherit" title="Transparent">Set transparent
                </div>
                <div class="note-color-palette" data-target-event="backColor">
                  <div class="note-color-row">
                    <button type="button" class="note-color-btn" style="background-color:#000000;" data-event="backColor" data-value="#000000" title="" data-toggle="button" tabindex="-1" data-original-title="#000000">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#424242;" data-event="backColor" data-value="#424242" title="" data-toggle="button" tabindex="-1" data-original-title="#424242">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#636363;" data-event="backColor" data-value="#636363" title="" data-toggle="button" tabindex="-1" data-original-title="#636363">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#9C9C94;" data-event="backColor" data-value="#9C9C94" title="" data-toggle="button" tabindex="-1" data-original-title="#9C9C94">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#CEC6CE;" data-event="backColor" data-value="#CEC6CE" title="" data-toggle="button" tabindex="-1" data-original-title="#CEC6CE">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#EFEFEF;" data-event="backColor" data-value="#EFEFEF" title="" data-toggle="button" tabindex="-1" data-original-title="#EFEFEF">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#F7F7F7;" data-event="backColor" data-value="#F7F7F7" title="" data-toggle="button" tabindex="-1" data-original-title="#F7F7F7">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#FFFFFF;" data-event="backColor" data-value="#FFFFFF" title="" data-toggle="button" tabindex="-1" data-original-title="#FFFFFF">
                    </button>
                  </div>
                  <div class="note-color-row">
                    <button type="button" class="note-color-btn" style="background-color:#FF0000;" data-event="backColor" data-value="#FF0000" title="" data-toggle="button" tabindex="-1" data-original-title="#FF0000">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#FF9C00;" data-event="backColor" data-value="#FF9C00" title="" data-toggle="button" tabindex="-1" data-original-title="#FF9C00">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#FFFF00;" data-event="backColor" data-value="#FFFF00" title="" data-toggle="button" tabindex="-1" data-original-title="#FFFF00">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#00FF00;" data-event="backColor" data-value="#00FF00" title="" data-toggle="button" tabindex="-1" data-original-title="#00FF00">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#00FFFF;" data-event="backColor" data-value="#00FFFF" title="" data-toggle="button" tabindex="-1" data-original-title="#00FFFF">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#0000FF;" data-event="backColor" data-value="#0000FF" title="" data-toggle="button" tabindex="-1" data-original-title="#0000FF">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#9C00FF;" data-event="backColor" data-value="#9C00FF" title="" data-toggle="button" tabindex="-1" data-original-title="#9C00FF">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#FF00FF;" data-event="backColor" data-value="#FF00FF" title="" data-toggle="button" tabindex="-1" data-original-title="#FF00FF">
                    </button>
                  </div>
                  <div class="note-color-row">
                    <button type="button" class="note-color-btn" style="background-color:#F7C6CE;" data-event="backColor" data-value="#F7C6CE" title="" data-toggle="button" tabindex="-1" data-original-title="#F7C6CE">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#FFE7CE;" data-event="backColor" data-value="#FFE7CE" title="" data-toggle="button" tabindex="-1" data-original-title="#FFE7CE">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#FFEFC6;" data-event="backColor" data-value="#FFEFC6" title="" data-toggle="button" tabindex="-1" data-original-title="#FFEFC6">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#D6EFD6;" data-event="backColor" data-value="#D6EFD6" title="" data-toggle="button" tabindex="-1" data-original-title="#D6EFD6">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#CEDEE7;" data-event="backColor" data-value="#CEDEE7" title="" data-toggle="button" tabindex="-1" data-original-title="#CEDEE7">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#CEE7F7;" data-event="backColor" data-value="#CEE7F7" title="" data-toggle="button" tabindex="-1" data-original-title="#CEE7F7">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#D6D6E7;" data-event="backColor" data-value="#D6D6E7" title="" data-toggle="button" tabindex="-1" data-original-title="#D6D6E7">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#E7D6DE;" data-event="backColor" data-value="#E7D6DE" title="" data-toggle="button" tabindex="-1" data-original-title="#E7D6DE">
                    </button>
                  </div>
                  <div class="note-color-row">
                    <button type="button" class="note-color-btn" style="background-color:#E79C9C;" data-event="backColor" data-value="#E79C9C" title="" data-toggle="button" tabindex="-1" data-original-title="#E79C9C">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#FFC69C;" data-event="backColor" data-value="#FFC69C" title="" data-toggle="button" tabindex="-1" data-original-title="#FFC69C">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#FFE79C;" data-event="backColor" data-value="#FFE79C" title="" data-toggle="button" tabindex="-1" data-original-title="#FFE79C">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#B5D6A5;" data-event="backColor" data-value="#B5D6A5" title="" data-toggle="button" tabindex="-1" data-original-title="#B5D6A5">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#A5C6CE;" data-event="backColor" data-value="#A5C6CE" title="" data-toggle="button" tabindex="-1" data-original-title="#A5C6CE">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#9CC6EF;" data-event="backColor" data-value="#9CC6EF" title="" data-toggle="button" tabindex="-1" data-original-title="#9CC6EF">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#B5A5D6;" data-event="backColor" data-value="#B5A5D6" title="" data-toggle="button" tabindex="-1" data-original-title="#B5A5D6">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#D6A5BD;" data-event="backColor" data-value="#D6A5BD" title="" data-toggle="button" tabindex="-1" data-original-title="#D6A5BD">
                    </button>
                  </div>
                  <div class="note-color-row">
                    <button type="button" class="note-color-btn" style="background-color:#E76363;" data-event="backColor" data-value="#E76363" title="" data-toggle="button" tabindex="-1" data-original-title="#E76363">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#F7AD6B;" data-event="backColor" data-value="#F7AD6B" title="" data-toggle="button" tabindex="-1" data-original-title="#F7AD6B">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#FFD663;" data-event="backColor" data-value="#FFD663" title="" data-toggle="button" tabindex="-1" data-original-title="#FFD663">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#94BD7B;" data-event="backColor" data-value="#94BD7B" title="" data-toggle="button" tabindex="-1" data-original-title="#94BD7B">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#73A5AD;" data-event="backColor" data-value="#73A5AD" title="" data-toggle="button" tabindex="-1" data-original-title="#73A5AD">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#6BADDE;" data-event="backColor" data-value="#6BADDE" title="" data-toggle="button" tabindex="-1" data-original-title="#6BADDE">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#8C7BC6;" data-event="backColor" data-value="#8C7BC6" title="" data-toggle="button" tabindex="-1" data-original-title="#8C7BC6">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#C67BA5;" data-event="backColor" data-value="#C67BA5" title="" data-toggle="button" tabindex="-1" data-original-title="#C67BA5">
                    </button>
                  </div>
                  <div class="note-color-row">
                    <button type="button" class="note-color-btn" style="background-color:#CE0000;" data-event="backColor" data-value="#CE0000" title="" data-toggle="button" tabindex="-1" data-original-title="#CE0000">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#E79439;" data-event="backColor" data-value="#E79439" title="" data-toggle="button" tabindex="-1" data-original-title="#E79439">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#EFC631;" data-event="backColor" data-value="#EFC631" title="" data-toggle="button" tabindex="-1" data-original-title="#EFC631">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#6BA54A;" data-event="backColor" data-value="#6BA54A" title="" data-toggle="button" tabindex="-1" data-original-title="#6BA54A">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#4A7B8C;" data-event="backColor" data-value="#4A7B8C" title="" data-toggle="button" tabindex="-1" data-original-title="#4A7B8C">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#3984C6;" data-event="backColor" data-value="#3984C6" title="" data-toggle="button" tabindex="-1" data-original-title="#3984C6">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#634AA5;" data-event="backColor" data-value="#634AA5" title="" data-toggle="button" tabindex="-1" data-original-title="#634AA5">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#A54A7B;" data-event="backColor" data-value="#A54A7B" title="" data-toggle="button" tabindex="-1" data-original-title="#A54A7B">
                    </button>
                  </div>
                  <div class="note-color-row">
                    <button type="button" class="note-color-btn" style="background-color:#9C0000;" data-event="backColor" data-value="#9C0000" title="" data-toggle="button" tabindex="-1" data-original-title="#9C0000">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#B56308;" data-event="backColor" data-value="#B56308" title="" data-toggle="button" tabindex="-1" data-original-title="#B56308">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#BD9400;" data-event="backColor" data-value="#BD9400" title="" data-toggle="button" tabindex="-1" data-original-title="#BD9400">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#397B21;" data-event="backColor" data-value="#397B21" title="" data-toggle="button" tabindex="-1" data-original-title="#397B21">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#104A5A;" data-event="backColor" data-value="#104A5A" title="" data-toggle="button" tabindex="-1" data-original-title="#104A5A">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#085294;" data-event="backColor" data-value="#085294" title="" data-toggle="button" tabindex="-1" data-original-title="#085294">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#311873;" data-event="backColor" data-value="#311873" title="" data-toggle="button" tabindex="-1" data-original-title="#311873">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#731842;" data-event="backColor" data-value="#731842" title="" data-toggle="button" tabindex="-1" data-original-title="#731842">
                    </button>
                  </div>
                  <div class="note-color-row">
                    <button type="button" class="note-color-btn" style="background-color:#630000;" data-event="backColor" data-value="#630000" title="" data-toggle="button" tabindex="-1" data-original-title="#630000">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#7B3900;" data-event="backColor" data-value="#7B3900" title="" data-toggle="button" tabindex="-1" data-original-title="#7B3900">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#846300;" data-event="backColor" data-value="#846300" title="" data-toggle="button" tabindex="-1" data-original-title="#846300">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#295218;" data-event="backColor" data-value="#295218" title="" data-toggle="button" tabindex="-1" data-original-title="#295218">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#083139;" data-event="backColor" data-value="#083139" title="" data-toggle="button" tabindex="-1" data-original-title="#083139">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#003163;" data-event="backColor" data-value="#003163" title="" data-toggle="button" tabindex="-1" data-original-title="#003163">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#21104A;" data-event="backColor" data-value="#21104A" title="" data-toggle="button" tabindex="-1" data-original-title="#21104A">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#4A1031;" data-event="backColor" data-value="#4A1031" title="" data-toggle="button" tabindex="-1" data-original-title="#4A1031">
                    </button>
                  </div>
                </div>
              </div>
              <div class="btn-group">
                <div class="note-palette-title">Foreground Color
                </div>
                <div class="note-color-reset" data-event="foreColor" data-value="inherit" title="Reset">Reset to default
                </div>
                <div class="note-color-palette" data-target-event="foreColor">
                  <div class="note-color-row">
                    <button type="button" class="note-color-btn" style="background-color:#000000;" data-event="foreColor" data-value="#000000" title="" data-toggle="button" tabindex="-1" data-original-title="#000000">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#424242;" data-event="foreColor" data-value="#424242" title="" data-toggle="button" tabindex="-1" data-original-title="#424242">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#636363;" data-event="foreColor" data-value="#636363" title="" data-toggle="button" tabindex="-1" data-original-title="#636363">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#9C9C94;" data-event="foreColor" data-value="#9C9C94" title="" data-toggle="button" tabindex="-1" data-original-title="#9C9C94">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#CEC6CE;" data-event="foreColor" data-value="#CEC6CE" title="" data-toggle="button" tabindex="-1" data-original-title="#CEC6CE">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#EFEFEF;" data-event="foreColor" data-value="#EFEFEF" title="" data-toggle="button" tabindex="-1" data-original-title="#EFEFEF">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#F7F7F7;" data-event="foreColor" data-value="#F7F7F7" title="" data-toggle="button" tabindex="-1" data-original-title="#F7F7F7">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#FFFFFF;" data-event="foreColor" data-value="#FFFFFF" title="" data-toggle="button" tabindex="-1" data-original-title="#FFFFFF">
                    </button>
                  </div>
                  <div class="note-color-row">
                    <button type="button" class="note-color-btn" style="background-color:#FF0000;" data-event="foreColor" data-value="#FF0000" title="" data-toggle="button" tabindex="-1" data-original-title="#FF0000">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#FF9C00;" data-event="foreColor" data-value="#FF9C00" title="" data-toggle="button" tabindex="-1" data-original-title="#FF9C00">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#FFFF00;" data-event="foreColor" data-value="#FFFF00" title="" data-toggle="button" tabindex="-1" data-original-title="#FFFF00">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#00FF00;" data-event="foreColor" data-value="#00FF00" title="" data-toggle="button" tabindex="-1" data-original-title="#00FF00">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#00FFFF;" data-event="foreColor" data-value="#00FFFF" title="" data-toggle="button" tabindex="-1" data-original-title="#00FFFF">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#0000FF;" data-event="foreColor" data-value="#0000FF" title="" data-toggle="button" tabindex="-1" data-original-title="#0000FF">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#9C00FF;" data-event="foreColor" data-value="#9C00FF" title="" data-toggle="button" tabindex="-1" data-original-title="#9C00FF">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#FF00FF;" data-event="foreColor" data-value="#FF00FF" title="" data-toggle="button" tabindex="-1" data-original-title="#FF00FF">
                    </button>
                  </div>
                  <div class="note-color-row">
                    <button type="button" class="note-color-btn" style="background-color:#F7C6CE;" data-event="foreColor" data-value="#F7C6CE" title="" data-toggle="button" tabindex="-1" data-original-title="#F7C6CE">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#FFE7CE;" data-event="foreColor" data-value="#FFE7CE" title="" data-toggle="button" tabindex="-1" data-original-title="#FFE7CE">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#FFEFC6;" data-event="foreColor" data-value="#FFEFC6" title="" data-toggle="button" tabindex="-1" data-original-title="#FFEFC6">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#D6EFD6;" data-event="foreColor" data-value="#D6EFD6" title="" data-toggle="button" tabindex="-1" data-original-title="#D6EFD6">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#CEDEE7;" data-event="foreColor" data-value="#CEDEE7" title="" data-toggle="button" tabindex="-1" data-original-title="#CEDEE7">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#CEE7F7;" data-event="foreColor" data-value="#CEE7F7" title="" data-toggle="button" tabindex="-1" data-original-title="#CEE7F7">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#D6D6E7;" data-event="foreColor" data-value="#D6D6E7" title="" data-toggle="button" tabindex="-1" data-original-title="#D6D6E7">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#E7D6DE;" data-event="foreColor" data-value="#E7D6DE" title="" data-toggle="button" tabindex="-1" data-original-title="#E7D6DE">
                    </button>
                  </div>
                  <div class="note-color-row">
                    <button type="button" class="note-color-btn" style="background-color:#E79C9C;" data-event="foreColor" data-value="#E79C9C" title="" data-toggle="button" tabindex="-1" data-original-title="#E79C9C">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#FFC69C;" data-event="foreColor" data-value="#FFC69C" title="" data-toggle="button" tabindex="-1" data-original-title="#FFC69C">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#FFE79C;" data-event="foreColor" data-value="#FFE79C" title="" data-toggle="button" tabindex="-1" data-original-title="#FFE79C">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#B5D6A5;" data-event="foreColor" data-value="#B5D6A5" title="" data-toggle="button" tabindex="-1" data-original-title="#B5D6A5">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#A5C6CE;" data-event="foreColor" data-value="#A5C6CE" title="" data-toggle="button" tabindex="-1" data-original-title="#A5C6CE">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#9CC6EF;" data-event="foreColor" data-value="#9CC6EF" title="" data-toggle="button" tabindex="-1" data-original-title="#9CC6EF">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#B5A5D6;" data-event="foreColor" data-value="#B5A5D6" title="" data-toggle="button" tabindex="-1" data-original-title="#B5A5D6">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#D6A5BD;" data-event="foreColor" data-value="#D6A5BD" title="" data-toggle="button" tabindex="-1" data-original-title="#D6A5BD">
                    </button>
                  </div>
                  <div class="note-color-row">
                    <button type="button" class="note-color-btn" style="background-color:#E76363;" data-event="foreColor" data-value="#E76363" title="" data-toggle="button" tabindex="-1" data-original-title="#E76363">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#F7AD6B;" data-event="foreColor" data-value="#F7AD6B" title="" data-toggle="button" tabindex="-1" data-original-title="#F7AD6B">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#FFD663;" data-event="foreColor" data-value="#FFD663" title="" data-toggle="button" tabindex="-1" data-original-title="#FFD663">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#94BD7B;" data-event="foreColor" data-value="#94BD7B" title="" data-toggle="button" tabindex="-1" data-original-title="#94BD7B">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#73A5AD;" data-event="foreColor" data-value="#73A5AD" title="" data-toggle="button" tabindex="-1" data-original-title="#73A5AD">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#6BADDE;" data-event="foreColor" data-value="#6BADDE" title="" data-toggle="button" tabindex="-1" data-original-title="#6BADDE">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#8C7BC6;" data-event="foreColor" data-value="#8C7BC6" title="" data-toggle="button" tabindex="-1" data-original-title="#8C7BC6">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#C67BA5;" data-event="foreColor" data-value="#C67BA5" title="" data-toggle="button" tabindex="-1" data-original-title="#C67BA5">
                    </button>
                  </div>
                  <div class="note-color-row">
                    <button type="button" class="note-color-btn" style="background-color:#CE0000;" data-event="foreColor" data-value="#CE0000" title="" data-toggle="button" tabindex="-1" data-original-title="#CE0000">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#E79439;" data-event="foreColor" data-value="#E79439" title="" data-toggle="button" tabindex="-1" data-original-title="#E79439">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#EFC631;" data-event="foreColor" data-value="#EFC631" title="" data-toggle="button" tabindex="-1" data-original-title="#EFC631">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#6BA54A;" data-event="foreColor" data-value="#6BA54A" title="" data-toggle="button" tabindex="-1" data-original-title="#6BA54A">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#4A7B8C;" data-event="foreColor" data-value="#4A7B8C" title="" data-toggle="button" tabindex="-1" data-original-title="#4A7B8C">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#3984C6;" data-event="foreColor" data-value="#3984C6" title="" data-toggle="button" tabindex="-1" data-original-title="#3984C6">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#634AA5;" data-event="foreColor" data-value="#634AA5" title="" data-toggle="button" tabindex="-1" data-original-title="#634AA5">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#A54A7B;" data-event="foreColor" data-value="#A54A7B" title="" data-toggle="button" tabindex="-1" data-original-title="#A54A7B">
                    </button>
                  </div>
                  <div class="note-color-row">
                    <button type="button" class="note-color-btn" style="background-color:#9C0000;" data-event="foreColor" data-value="#9C0000" title="" data-toggle="button" tabindex="-1" data-original-title="#9C0000">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#B56308;" data-event="foreColor" data-value="#B56308" title="" data-toggle="button" tabindex="-1" data-original-title="#B56308">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#BD9400;" data-event="foreColor" data-value="#BD9400" title="" data-toggle="button" tabindex="-1" data-original-title="#BD9400">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#397B21;" data-event="foreColor" data-value="#397B21" title="" data-toggle="button" tabindex="-1" data-original-title="#397B21">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#104A5A;" data-event="foreColor" data-value="#104A5A" title="" data-toggle="button" tabindex="-1" data-original-title="#104A5A">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#085294;" data-event="foreColor" data-value="#085294" title="" data-toggle="button" tabindex="-1" data-original-title="#085294">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#311873;" data-event="foreColor" data-value="#311873" title="" data-toggle="button" tabindex="-1" data-original-title="#311873">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#731842;" data-event="foreColor" data-value="#731842" title="" data-toggle="button" tabindex="-1" data-original-title="#731842">
                    </button>
                  </div>
                  <div class="note-color-row">
                    <button type="button" class="note-color-btn" style="background-color:#630000;" data-event="foreColor" data-value="#630000" title="" data-toggle="button" tabindex="-1" data-original-title="#630000">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#7B3900;" data-event="foreColor" data-value="#7B3900" title="" data-toggle="button" tabindex="-1" data-original-title="#7B3900">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#846300;" data-event="foreColor" data-value="#846300" title="" data-toggle="button" tabindex="-1" data-original-title="#846300">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#295218;" data-event="foreColor" data-value="#295218" title="" data-toggle="button" tabindex="-1" data-original-title="#295218">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#083139;" data-event="foreColor" data-value="#083139" title="" data-toggle="button" tabindex="-1" data-original-title="#083139">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#003163;" data-event="foreColor" data-value="#003163" title="" data-toggle="button" tabindex="-1" data-original-title="#003163">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#21104A;" data-event="foreColor" data-value="#21104A" title="" data-toggle="button" tabindex="-1" data-original-title="#21104A">
                    </button>
                    <button type="button" class="note-color-btn" style="background-color:#4A1031;" data-event="foreColor" data-value="#4A1031" title="" data-toggle="button" tabindex="-1" data-original-title="#4A1031">
                    </button>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <div class="note-para btn-group">
          <button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="insertUnorderedList" tabindex="-1" data-original-title="Unordered list (⌘+⇧+NUM7)">
            <i class="fa fa-list-ul">
            </i>
          </button>
          <button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="insertOrderedList" tabindex="-1" data-original-title="Ordered list (⌘+⇧+NUM8)">
            <i class="fa fa-list-ol">
            </i>
          </button>
          <button type="button" class="btn btn-default btn-sm btn-small dropdown-toggle" data-toggle="dropdown" title="" tabindex="-1" data-original-title="Paragraph" aria-expanded="false">
            <i class="fa fa-align-left">
            </i>
            <span class="caret">
            </span>
          </button>
          <div class="dropdown-menu">
            <div class="note-align btn-group">
              <button type="button" class="btn btn-default btn-sm btn-small active" title="" data-event="justifyLeft" tabindex="-1" data-original-title="Align left (⌘+⇧+L)">
                <i class="fa fa-align-left">
                </i>
              </button>
              <button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="justifyCenter" tabindex="-1" data-original-title="Align center (⌘+⇧+E)">
                <i class="fa fa-align-center">
                </i>
              </button>
              <button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="justifyRight" tabindex="-1" data-original-title="Align right (⌘+⇧+R)">
                <i class="fa fa-align-right">
                </i>
              </button>
              <button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="justifyFull" tabindex="-1" data-original-title="Justify full (⌘+⇧+J)">
                <i class="fa fa-align-justify">
                </i>
              </button>
            </div>
            <div class="note-list btn-group">
              <button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="indent" tabindex="-1" data-original-title="Indent (⌘+])">
                <i class="fa fa-indent">
                </i>
              </button>
              <button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="outdent" tabindex="-1" data-original-title="Outdent (⌘+[)">
                <i class="fa fa-outdent">
                </i>
              </button>
            </div>
          </div>
        </div>
        <div class="note-height btn-group">
          <button type="button" class="btn btn-default btn-sm btn-small dropdown-toggle" data-toggle="dropdown" title="" tabindex="-1" data-original-title="Line Height">
            <i class="fa fa-text-height">
            </i>
            <span class="caret">
            </span>
          </button>
          <ul class="dropdown-menu">
            <li>
              <a data-event="lineHeight" href="#" data-value="1" class="">
                <i class="fa fa-check">
                </i> 1.0
              </a>
            </li>
            <li>
              <a data-event="lineHeight" href="#" data-value="1.2" class="">
                <i class="fa fa-check">
                </i> 1.2
              </a>
            </li>
            <li>
              <a data-event="lineHeight" href="#" data-value="1.4" class="">
                <i class="fa fa-check">
                </i> 1.4
              </a>
            </li>
            <li>
              <a data-event="lineHeight" href="#" data-value="1.5" class="checked">
                <i class="fa fa-check">
                </i> 1.5
              </a>
            </li>
            <li>
              <a data-event="lineHeight" href="#" data-value="1.6" class="">
                <i class="fa fa-check">
                </i> 1.6
              </a>
            </li>
            <li>
              <a data-event="lineHeight" href="#" data-value="1.8" class="">
                <i class="fa fa-check">
                </i> 1.8
              </a>
            </li>
            <li>
              <a data-event="lineHeight" href="#" data-value="2" class="">
                <i class="fa fa-check">
                </i> 2.0
              </a>
            </li>
            <li>
              <a data-event="lineHeight" href="#" data-value="3" class="">
                <i class="fa fa-check">
                </i> 3.0
              </a>
            </li>
          </ul>
        </div>
        <div class="note-table btn-group">
          <button type="button" class="btn btn-default btn-sm btn-small dropdown-toggle" data-toggle="dropdown" title="" tabindex="-1" data-original-title="Table" aria-expanded="false">
            <i class="fa fa-table">
            </i>
            <span class="caret">
            </span>
          </button>
          <ul class="note-table dropdown-menu">
            <div class="note-dimension-picker">
              <div class="note-dimension-picker-mousecatcher" data-event="insertTable" data-value="1x1" style="width: 10em; height: 10em;">
              </div>
              <div class="note-dimension-picker-highlighted">
              </div>
              <div class="note-dimension-picker-unhighlighted">
              </div>
            </div>
            <div class="note-dimension-display"> 1 x 1
            </div>
          </ul>
        </div>
        <div class="note-insert btn-group">
          <button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="showLinkDialog" data-hide="true" tabindex="-1" data-original-title="Link (⌘+K)">
            <i class="fa fa-link">
            </i>
          </button>
          <button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="showImageDialog" data-hide="true" tabindex="-1" data-original-title="Picture">
            <i class="fa fa-picture-o">
            </i>
          </button>
          <button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="insertHorizontalRule" tabindex="-1" data-original-title="Insert Horizontal Rule (⌘+ENTER)">
            <i class="fa fa-minus">
            </i>
          </button>
        </div>
        <div class="note-view btn-group">
          <button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="fullscreen" tabindex="-1" data-original-title="Full Screen">
            <i class="fa fa-arrows-alt">
            </i>
          </button>
          <button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="codeview" tabindex="-1" data-original-title="Code View">
            <i class="fa fa-code">
            </i>
          </button>
        </div>
        <div class="note-help btn-group">
          <button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="showHelpDialog" data-hide="true" tabindex="-1" data-original-title="Help">
            <i class="fa fa-question">
            </i>
          </button>
        </div>
      </div>
      <textarea class="note-codable" style="height: 169px; width: 100%">
Procedure: ALT

Procedure Note: Informed consent was verified. The eye undergoing treatment was pre-treated with alphagan-P and proparacaine. A Ritch laser lens was used to direct the laser beam to the trabecular meshwork.

Power:  mW
Durantion: 0.2 seconds
Spot Size: 50 microns
Number of Shots:

Complications: None

The eye was rinsed with sterile saline and alphagan P was placed in the eye.

The patient will have a post-op IOP check.

      </textarea>
      <div class="note-statusbar">
        <div class="note-resizebar">
          <div class="note-icon-bar">
          </div>
          <div class="note-icon-bar">
          </div>
          <div class="note-icon-bar">
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

      </div>
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
    $('table tbody td').on('click',function(){
      $("#myModal").modal("show");
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
