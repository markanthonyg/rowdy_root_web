@extends('layouts.dashboard.master')

@section('title')
  New Visit
@endsection

@section('style')
  <!-- Admin Forms CSS -->
  <link rel="stylesheet" type="text/css" href="assets/admin-tools/admin-forms/css/admin-forms.css">
  <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css">

  {{ Html::style('css/new_visit.css') }}
@endsection

@section('breadcrumb')
  <li class="crumb-active">
    <a href="#">Visits</a>
  </li>
  <li class="crumb-icon">
    <a href="/">
      <span class="glyphicon glyphicon-home"></span>
    </a>
  </li>
  <li class="crumb-link">
    <a href="/new_visit">New Visit</a>
  </li>
@endsection

@section('content')
  <!-- begin: .tray-center -->
  <div class="tray tray-center">
    <div class="form-group">
    <div class="admin-form theme-primary mw1000 center-block">
      {{-- FORM BEGIN --}}
      {!! Form::open(['action' => 'Dashboard\VisitsController@goBack', 'id' => 'admin-form', 'method' => 'post']) !!}

      {{-- Begin panels --}}
      {{-- Row 1: Patient and demographics --}}
      <div class="section-divider mt20 mb40">
        <span> General Information </span>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="panel heading-border">
            <div class="panel-body bg-light">
              <div class="section-divider mt20 mb40">
                <span> Patient </span>
              </div>
              <div class="row">
                {!! Form::select('patient', [$patient->id => $patient->id . ' || ' . $patient->last_name . ', ' . $patient->first_name . ' ' . $patient->middle], $patient->id, ['id' => 'patient_list', 'class' => 'form-control', 'disabled' => 'true', 'value' => $patient->id]) !!}
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="panel heading-border">
            <div class="panel-body bg-light">
              <div class="section-divider mt20 mb40">
                <span> Patient Information </span>
              </div>
              <br />
              <div class="row">
                <div class="col-md-2 vcenter">
                  First Name
                </div>
                <div class="col-md-10">
                  {!! Form::text('patient_firstname', $patient->first_name, ['disabled' => 'true', 'class' => 'gui-input', 'name' => 'demo_firstname', 'id' => 'demo_firstname']) !!}
                </div>
              </div>
              <br />
              <div class="row">
                <div class="col-md-2 vcenter">
                  Last Name
                </div>
                <div class="col-md-10">
                  {!! Form::text('patient_lastname', $patient->last_name, ['disabled' => 'true', 'class' => 'gui-input', 'name' => 'demo_lastname', 'id' => 'demo_lastname']) !!}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- Row 2: Chief complaint --}}
      <div class="row">
        <div class="col-md-12">
          <div class="panel heading-border">
            <div class="panel-body bg-light">
              <div class="section-divider mt20 mb40">
                <span> Cheif Complaint </span>
              </div>
              <div class="row">
                {!! Form::textarea('chief_complaint', $visit->chiefComplaint, ['id' => 'chief_complaint', 'disabled' => 'true']) !!}
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- Row 3: Distance Vision && Glasses RX--}}
      <div class="section-divider mt20 mb40">
        <span> Examination </span>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="panel heading-border">
            <div class="panel-body bg-light">
              <div class="section-divider mt20 mb40">
                <span> Vision (Glasses) </span>
              </div>
              <div class="row text-center">
                <div class="col-xs-8">
                  Right Eye  20/
                </div>
                <div class="col-xs-4">
                  {!! Form::text('dv_glasses_right', $dv->DVODCC, ['id' => 'dv_glasses_right', 'class', 'size' => '5', 'disabled' => 'true']) !!}
                </div>
              </div>
              <div class="row text-center">
                <div class="col-xs-8">
                  Left Eye 20/
                </div>
                <div class="col-xs-4">
                  {!! Form::text('dv_glasses_left', $dv->DVOSCC, ['id' => 'dv_glasses_left', 'class', 'size' => '5', 'disabled' => 'true']) !!}
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="panel heading-border">
            <div class="panel-body bg-light">
              <div class="section-divider mt20 mb40">
                <span> Vision (No Glasses) </span>
              </div>
              <div class="row text-center">
                <div class="col-xs-8">
                  Right Eye  20/
                </div>
                <div class="col-xs-4">
                  {!! Form::text('dv_right', $dv->DVODSC, ['id' => 'dv_right', 'class', 'size' => '5', 'disabled' => 'true']) !!}
                </div>
              </div>
              <div class="row text-center">
                <div class="col-xs-8">
                  Left Eye 20/
                </div>
                <div class="col-xs-4">
                  {!! Form::text('dv_left', $dv->DVOSSC, ['id' => 'dv_left', 'class', 'size' => '5', 'disabled' => 'true']) !!}
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="panel heading-border">
            <div class="panel-body bg-light">
              <div class="section-divider mt20 mb40">
                <span> Glasses Rx </span>
              </div>
              <div class="row text-center">
                <div class="col-md-2"></div>
                <div class="col-md-2">
                  Sphere
                </div>
                <div class="col-md-2">
                  Cylinder
                </div>
                <div class="col-md-2">
                  Axis
                </div>
                <div class="col-md-2">
                  Add
                </div>
              </div>
              <div class="row text-center">
                <div class="col-md-2">
                  OD
                </div>
                <div class="col-md-2">
                  {!! Form::text('rx_od_sphere', $GlassesRx->OD_Sphere, ['id' => 'rx_od_sphere', 'class', 'size' => '8', 'disabled' => 'true']) !!}
                </div>
                <div class="col-md-2">
                  {!! Form::text('rx_od_cylinder', $GlassesRx->OD_Cyl, ['id' => 'rx_od_cylinder', 'class', 'size' => '8', 'disabled' => 'true']) !!}
                </div>
                <div class="col-md-2">
                  {!! Form::text('rx_od_axis', $GlassesRx->OD_Axis, ['id' => 'rx_od_axis', 'class', 'size' => '8', 'disabled' => 'true']) !!}
                </div>
                <div class="col-md-2">
                  {!! Form::text('rx_od_add', $GlassesRx->OD_Add, ['id' => 'rx_od_add', 'class', 'size' => '8', 'disabled' => 'true']) !!}
                </div>
              </div>
              <div class="row text-center">
                <div class="col-md-2">
                  OS
                </div>
                <div class="col-md-2">
                  {!! Form::text('rx_os_sphere', $GlassesRx->OS_Sphere, ['id' => 'rx_od_sphere', 'class', 'size' => '8', 'disabled' => 'true']) !!}
                </div>
                <div class="col-md-2">
                  {!! Form::text('rx_os_cylinder', $GlassesRx->OS_Cyl, ['id' => 'rx_od_cylinder', 'class', 'size' => '8', 'disabled' => 'true']) !!}
                </div>
                <div class="col-md-2">
                  {!! Form::text('rx_os_axis', $GlassesRx->OS_Axis, ['id' => 'rx_od_axis', 'class', 'size' => '8', 'disabled' => 'true']) !!}
                </div>
                <div class="col-md-2">
                  {!! Form::text('rx_os_add', $GlassesRx->OS_Add, ['id' => 'rx_od_add', 'class', 'size' => '8', 'disabled' => 'true']) !!}
                </div>
              </div>
              <div class="row">
                Rx Notes:
              </div>
              <div class="row">
                {!! Form::textarea('rx_notes', $GlassesRx->GlassesRxNotes, ['id' => 'rx_notes', 'rows' => '4', 'disabled' => 'true']) !!}
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- Row 4: Refraction --}}
      <div class="row">
        <div class="col-md-12">
          <div class="panel heading-border">
            <div class="panel-body bg-light">
              <div class="section-divider mt20 mb40">
                <span> Refraction </span>
              </div>
              <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                  @if ($refrac->isManifest == 1)
                    {!! Form::radio('refraction_type', 'manifest_refraction', true, ['disabled' => 'true']) !!} Manifest Refraction &nbsp; &nbsp; &nbsp;
                    {!! Form::radio('refraction_type', 'autorefraction', false, ['disabled' => 'true']) !!} Autorefraction
                  @else
                    {!! Form::radio('refraction_type', 'manifest_refraction', false, ['disabled' => 'true']) !!} Manifest Refraction &nbsp; &nbsp; &nbsp;
                    {!! Form::radio('refraction_type', 'autorefraction', true, ['disabled' => 'true']) !!} Autorefraction
                  @endif
                </div>
              </div>
              <br />
              <div class="row text-center">
                <div class="col-md-2"></div>
                <div class="col-md-3">Sphere</div>
                <div class="col-md-3">Cylinder</div>
                <div class="col-md-3">Axis</div>
              </div>
              <div class="row text-center">
                <div class="col-md-1"></div>
                <div class="col-md-1">
                  OD (sc)
                </div>
                <div class="col-md-3">
                  {!! Form::text('refraction_sc_od_sphere', $refrac->SC_OD_Sphere, ['id' => 'refraction_sc_od_sphere', 'class', 'size' => '20', 'disabled' => 'true']) !!}
                </div>
                <div class="col-md-3">
                  {!! Form::text('refraction_sc_od_cylinder', $refrac->SC_OD_Cyl, ['id' => 'refraction_sc_od_cylinder', 'class', 'size' => '20', 'disabled' => 'true']) !!}
                </div>
                <div class="col-md-3">
                  {!! Form::text('refraction_sc_od_axis', $refrac->SC_OD_Axis, ['id' => 'refraction_sc_od_axis', 'class', 'size' => '20', 'disabled' => 'true']) !!}
                </div>
              </div>
              <div class="row text-center">
                <div class="col-md-1"></div>
                <div class="col-md-1">
                  OS (sc)
                </div>
                <div class="col-md-3">
                  {!! Form::text('refraction_sc_os_sphere', $refrac->SC_OS_Sphere, ['id' => 'refraction_sc_os_sphere', 'class', 'size' => '20', 'disabled' => 'true']) !!}
                </div>
                <div class="col-md-3">
                  {!! Form::text('refraction_sc_os_cylinder', $refrac->SC_OS_Cyl, ['id' => 'refraction_sc_os_cylinder', 'class', 'size' => '20', 'disabled' => 'true']) !!}
                </div>
                <div class="col-md-3">
                  {!! Form::text('refraction_sc_os_axis', $refrac->SC_OS_Axis, ['id' => 'refraction_sc_os_axis', 'class', 'size' => '20', 'disabled' => 'true']) !!}
                </div>
              </div>
              <br />
              <div class="row text-center">
                <div class="col-md-1"></div>
                <div class="col-md-1">
                  OD (cc)
                </div>
                <div class="col-md-3">
                  {!! Form::text('refraction_cc_od_sphere', $refrac->CC_OD_Sphere, ['id' => 'refraction_cc_od_sphere', 'class', 'size' => '20', 'disabled' => 'true']) !!}
                </div>
                <div class="col-md-3">
                  {!! Form::text('refraction_cc_od_cylinder', $refrac->CC_OD_Cyl, ['id' => 'refraction_cc_od_cylinder', 'class', 'size' => '20', 'disabled' => 'true']) !!}
                </div>
                <div class="col-md-3">
                  {!! Form::text('refraction_cc_od_axis', $refrac->CC_OD_Axis, ['id' => 'refraction_cc_od_axis', 'class', 'size' => '20', 'disabled' => 'true']) !!}
                </div>
              </div>
              <div class="row text-center">
                <div class="col-md-1"></div>
                <div class="col-md-1">
                  OS (cc)
                </div>
                <div class="col-md-3">
                  {!! Form::text('refraction_cc_os_sphere', $refrac->CC_OS_Sphere, ['id' => 'refraction_cc_os_sphere', 'class', 'size' => '20', 'disabled' => 'true']) !!}
                </div>
                <div class="col-md-3">
                  {!! Form::text('refraction_cc_os_cylinder', $refrac->CC_OS_Cyl, ['id' => 'refraction_cc_os_cylinder', 'class', 'size' => '20', 'disabled' => 'true']) !!}
                </div>
                <div class="col-md-3">
                  {!! Form::text('refraction_cc_os_axis', $refrac->CC_OS_Axis, ['id' => 'refraction_cc_os_axis', 'class', 'size' => '20', 'disabled' => 'true']) !!}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- Row 5: Slit Lamp --}}
      <div class="row">
        <div class="col-md-12">
          <div class="panel heading-border">
            <div class="panel-body bg-light">
              <div class="my-section-divider mt20 mb40">
                <span> Slit Lamp Exam </span>
              </div>

              {{-- Pupils --}}
              <div class="row">
                <div class="row">
                  <div class="col-md-4">
                    <div class="my-section-divider">
                      <span> Left Pupil </span>
                    </div>
                    <div class="row">
                      <div class="col-md-5 text-left">
                        Normal
                      </div>
                      @if ($pupil->isLeftPupilNormal == 1)
                        {!! Form::checkbox('sle_pupil_left_normal', '1', true, ['disabled' => 'true']) !!}
                      @else
                        {!! Form::checkbox('sle_pupil_left_normal', '1', false, ['disabled' => 'true']) !!}
                      @endif
                    </div>
                    <br />
                    <br />
                    <div class="row">
                      <div class="col-md-5 text-left">
                        Shape
                      </div>
                      <div class="col-md-7">
                        <div class="row">
                          @if ($pupil->leftShape == "round")
                            {!! Form::radio('sle_pupil_left_shape', 'round', true, ['disabled' => 'true']) !!} Round &nbsp; &nbsp; &nbsp;
                          @else
                            {!! Form::radio('sle_pupil_left_shape', 'round', false, ['disabled' => 'true']) !!} Round &nbsp; &nbsp; &nbsp;
                          @endif
                        </div>
                        <div class="row">
                          @if ($pupil->leftShape == "irregular")
                            {!! Form::radio('sle_pupil_left_shape', 'irregular', true, ['disabled' => 'true']) !!} Irregular &nbsp; &nbsp; &nbsp;
                          @else
                            {!! Form::radio('sle_pupil_left_shape', 'irregular', false, ['disabled' => 'true']) !!} Irregular &nbsp; &nbsp; &nbsp;
                          @endif
                        </div>
                      </div>
                    </div>
                    <br />
                    <div class="row">
                      <div class="col-md-5 text-left">
                        Diameter
                      </div>
                      <div class="col-md-7">
                        {{ Form::select('sle_pupil_left_diameter', [
                          $pupil->leftDiameter => $pupil->leftDiameter
                        ], $pupil->leftDiameter, ['disabled' => 'true'])
                        }}
                         mm
                      </div>
                    </div>
                    <br />
                    <div class="row">
                      <div class="col-md-5 text-left">
                        RAPD
                      </div>
                      <div class="col-md-7">
                        <div class="row">
                          @if ($pupil->isLeftRAPD == 1)
                            {!! Form::radio('sle_pupil_left_rapd', 1, true, ['disabled' => 'true']) !!} Yes &nbsp; &nbsp; &nbsp;
                          @else
                            {!! Form::radio('sle_pupil_left_rapd', 1, false, ['disabled' => 'true']) !!} Yes &nbsp; &nbsp; &nbsp;
                          @endif
                        </div>
                        <div class="row">
                          @if ($pupil->isLeftRAPD == 0)
                            {!! Form::radio('sle_pupil_left_rapd', 0, true, ['disabled' => 'true']) !!} No &nbsp; &nbsp; &nbsp;
                          @else
                            {!! Form::radio('sle_pupil_left_rapd', 0, false, ['disabled' => 'true']) !!} No &nbsp; &nbsp; &nbsp;
                          @endif
                        </div>
                      </div>
                    </div>
                    <br />
                    <div class="row">
                      <div class="col-md-5 text-left">
                        Synechia
                      </div>
                      <div class="col-md-7">
                        <div class="row">
                          @if ($pupil->isLeftSynechia == 1)
                            {!! Form::radio('sle_pupil_left_synechia', 1, true, ['disabled' => 'true']) !!} Yes &nbsp; &nbsp; &nbsp;
                          @else
                            {!! Form::radio('sle_pupil_left_synechia', 1, false, ['disabled' => 'true']) !!} Yes &nbsp; &nbsp; &nbsp;
                          @endif
                        </div>
                        <div class="row">
                          @if ($pupil->isLeftSynechia == 0)
                            {!! Form::radio('sle_pupil_left_synechia', 0, true, ['disabled' => 'true']) !!} No &nbsp; &nbsp; &nbsp;
                          @else
                            {!! Form::radio('sle_pupil_left_synechia', 0, false, ['disabled' => 'true']) !!} No &nbsp; &nbsp; &nbsp;
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="my-section-divider">
                      <span> Right Pupil </span>
                    </div>
                    <div class="row">
                      <div class="col-md-5 text-left">
                        Normal
                      </div>
                      @if ($pupil->isRightPupilNormal == 1)
                        {!! Form::checkbox('sle_pupil_right_normal', '1', true, ['disabled' => 'true']) !!}
                      @else
                        {!! Form::checkbox('sle_pupil_right_normal', '1', false, ['disabled' => 'true']) !!}
                      @endif
                    </div>
                    <br />
                    <br />
                    <div class="row">
                      <div class="col-md-5 text-left">
                        Shape
                      </div>
                      <div class="col-md-7">
                        <div class="row">
                          @if ($pupil->rightShape == "round")
                            {!! Form::radio('sle_pupil_right_shape', 'round', true, ['disabled' => 'true']) !!} Round &nbsp; &nbsp; &nbsp;
                          @else
                            {!! Form::radio('sle_pupil_right_shape', 'round', false, ['disabled' => 'true']) !!} Round &nbsp; &nbsp; &nbsp;
                          @endif
                        </div>
                        <div class="row">
                          @if ($pupil->rightShape == "irregular")
                            {!! Form::radio('sle_pupil_right_shape', 'irregular', true, ['disabled' => 'true']) !!} Irregular &nbsp; &nbsp; &nbsp;
                          @else
                            {!! Form::radio('sle_pupil_right_shape', 'irregular', false, ['disabled' => 'true']) !!} Irregular &nbsp; &nbsp; &nbsp;
                          @endif
                        </div>
                      </div>
                    </div>
                    <br />
                    <div class="row">
                      <div class="col-md-5 text-left">
                        Diameter
                      </div>
                      <div class="col-md-7">
                        {{ Form::select('sle_pupil_right_diameter', [
                          $pupil->rightDiameter => $pupil->rightDiameter
                        ], $pupil->rightDiameter, ['disabled' => 'true'])
                        }}
                         mm
                      </div>
                    </div>
                    <br />
                    <div class="row">
                      <div class="col-md-5 text-left">
                        RAPD
                      </div>
                      <div class="col-md-7">
                        <div class="row">
                          @if ($pupil->isRightRAPD == 1)
                            {!! Form::radio('sle_pupil_right_rapd', 1, true, ['disabled' => 'true']) !!} Yes &nbsp; &nbsp; &nbsp;
                          @else
                            {!! Form::radio('sle_pupil_right_rapd', 1, false, ['disabled' => 'true']) !!} Yes &nbsp; &nbsp; &nbsp;
                          @endif
                        </div>
                        <div class="row">
                          @if ($pupil->isRightRAPD == 0)
                            {!! Form::radio('sle_pupil_right_rapd', 0, true, ['disabled' => 'true']) !!} No &nbsp; &nbsp; &nbsp;
                          @else
                            {!! Form::radio('sle_pupil_right_rapd', 0, false, ['disabled' => 'true']) !!} No &nbsp; &nbsp; &nbsp;
                          @endif
                        </div>
                      </div>
                    </div>
                    <br />
                    <div class="row">
                      <div class="col-md-5 text-left">
                        Synechia
                      </div>
                      <div class="col-md-7">
                        <div class="row">
                          @if ($pupil->isRightSynechia == 1)
                            {!! Form::radio('sle_pupil_right_synechia', 1, true, ['disabled' => 'true']) !!} Yes &nbsp; &nbsp; &nbsp;
                          @else
                            {!! Form::radio('sle_pupil_right_synechia', 1, false, ['disabled' => 'true']) !!} Yes &nbsp; &nbsp; &nbsp;
                          @endif
                        </div>
                        <div class="row">
                          @if ($pupil->isRightSynechia == 0)
                            {!! Form::radio('sle_pupil_right_synechia', 0, true, ['disabled' => 'true']) !!} No &nbsp; &nbsp; &nbsp;
                          @else
                            {!! Form::radio('sle_pupil_right_synechia', 0, false, ['disabled' => 'true']) !!} No &nbsp; &nbsp; &nbsp;
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="my-section-divider">
                      <span> Both Pupils </span>
                    </div>
                    <div class="row">
                      <div class="col-md-5 text-left">
                        Normal
                      </div>
                      @if ($pupil->isBothPupilsNormal == 1)
                        {!! Form::checkbox('sle_pupil_both_normal', '1', true, ['disabled' => 'true']) !!}
                      @else
                        {!! Form::checkbox('sle_pupil_both_normal', '1', false, ['disabled' => 'true']) !!}
                      @endif
                    </div>
                    <br />
                    <br />
                    <div class="row">
                      <div class="col-md-5 text-left">
                        Shape
                      </div>
                      <div class="col-md-7">
                        <div class="row">
                          @if ($pupil->bothShape == "round")
                            {!! Form::radio('sle_pupil_both_shape', 'round', true, ['disabled' => 'true']) !!} Round &nbsp; &nbsp; &nbsp;
                          @else
                            {!! Form::radio('sle_pupil_both_shape', 'round', false, ['disabled' => 'true']) !!} Round &nbsp; &nbsp; &nbsp;
                          @endif
                        </div>
                        <div class="row">
                          @if ($pupil->bothShape == "irregular")
                            {!! Form::radio('sle_pupil_both_shape', 'irregular', true, ['disabled' => 'true']) !!} Irregular &nbsp; &nbsp; &nbsp;
                          @else
                            {!! Form::radio('sle_pupil_both_shape', 'irregular', false, ['disabled' => 'true']) !!} Irregular &nbsp; &nbsp; &nbsp;
                          @endif
                        </div>
                      </div>
                    </div>
                    <br />
                    <div class="row">
                      <div class="col-md-5 text-left">
                        Diameter
                      </div>
                      <div class="col-md-7">
                        {{ Form::select('sle_pupil_both_diameter', [
                          $pupil->bothDiameter => $pupil->bothDiameter
                        ], $pupil->bothDiameter, ['disabled' => 'true'])
                        }}
                         mm
                      </div>
                    </div>
                    <br />
                    <div class="row">
                      <div class="col-md-5 text-left">
                        RAPD
                      </div>
                      <div class="col-md-7">
                        <div class="row">
                          @if ($pupil->isBothRAPD == 1)
                            {!! Form::radio('sle_pupil_both_rapd', 1, true, ['disabled' => 'true']) !!} Yes &nbsp; &nbsp; &nbsp;
                          @else
                            {!! Form::radio('sle_pupil_both_rapd', 1, false, ['disabled' => 'true']) !!} Yes &nbsp; &nbsp; &nbsp;
                          @endif
                        </div>
                        <div class="row">
                          @if ($pupil->isBothRAPD == 0)
                            {!! Form::radio('sle_pupil_both_rapd', 0, true, ['disabled' => 'true']) !!} No &nbsp; &nbsp; &nbsp;
                          @else
                            {!! Form::radio('sle_pupil_both_rapd', 0, false, ['disabled' => 'true']) !!} No &nbsp; &nbsp; &nbsp;
                          @endif
                        </div>
                      </div>
                    </div>
                    <br />
                    <div class="row">
                      <div class="col-md-5 text-left">
                        Synechia
                      </div>
                      <div class="col-md-7">
                        <div class="row">
                          @if ($pupil->isBothSynechia == 1)
                            {!! Form::radio('sle_pupil_both_synechia', 1, true, ['disabled' => 'true']) !!} Yes &nbsp; &nbsp; &nbsp;
                          @else
                            {!! Form::radio('sle_pupil_both_synechia', 1, false, ['disabled' => 'true']) !!} Yes &nbsp; &nbsp; &nbsp;
                          @endif
                        </div>
                        <div class="row">
                          @if ($pupil->isBothSynechia == 0)
                            {!! Form::radio('sle_pupil_both_synechia', 0, true, ['disabled' => 'true']) !!} No &nbsp; &nbsp; &nbsp;
                          @else
                            {!! Form::radio('sle_pupil_both_synechia', 0, false, ['disabled' => 'true']) !!} No &nbsp; &nbsp; &nbsp;
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <br />
              <br />
              <br />

              {{-- Anterior Chamber --}}
              <div class="row">
                <div class="my-section-divider">
                  <span> Anterior Chamber </span>
                </div>
                <div class="col-md-6">
                  <div class="my-section-divider">
                    <span> OD </span>
                  </div>
                  <div class="row">
                    <div class="col-md-4 col-md-offset-2 text-left">
                      Normal
                    </div>
                    <div class="col-md-4 col-md-offset-2">
                      @if ($ant_chamber->isACODNormal == 1)
                        {!! Form::checkbox('sle_anterior_chamber_od_normal', '1', true, ['disabled' => 'true']) !!}
                      @else
                        {!! Form::checkbox('sle_anterior_chamber_od_normal', '1', false, ['disabled' => 'true']) !!}
                      @endif
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-md-4 col-md-offset-2 text-left">
                      Depth
                    </div>
                    <div class="col-md-4 col-md-offset-2">
                      <div class="row">
                        @if ($ant_chamber->ACDepthOD == "1")
                          {!! Form::radio('sle_anterior_chamber_od_depth', '1', true, ['disabled' => 'true']) !!} +1
                        @else
                          {!! Form::radio('sle_anterior_chamber_od_depth', '1', false, ['disabled' => 'true']) !!} +1
                        @endif
                      </div>
                      <div class="row">
                        @if ($ant_chamber->ACDepthOD == "2")
                          {!! Form::radio('sle_anterior_chamber_od_depth', '2', true, ['disabled' => 'true']) !!} +2
                        @else
                          {!! Form::radio('sle_anterior_chamber_od_depth', '2', false, ['disabled' => 'true']) !!} +2
                        @endif
                      </div>
                      <div class="row">
                        @if ($ant_chamber->ACDepthOD == "3")
                          {!! Form::radio('sle_anterior_chamber_od_depth', '3', true, ['disabled' => 'true']) !!} +3
                        @else
                          {!! Form::radio('sle_anterior_chamber_od_depth', '3', false, ['disabled' => 'true']) !!} +3
                        @endif
                      </div>
                      <div class="row">
                        @if ($ant_chamber->ACDepthOD == "4")
                          {!! Form::radio('sle_anterior_chamber_od_depth', '4', true, ['disabled' => 'true']) !!} +4
                        @else
                          {!! Form::radio('sle_anterior_chamber_od_depth', '4', false, ['disabled' => 'true']) !!} +4
                        @endif
                      </div>
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-md-4 col-md-offset-2 text-left">
                      Angle
                    </div>
                    <div class="col-md-4 col-md-offset-2">
                      <div class="row">
                        @if ($ant_chamber->ACAngleOD == "open")
                          {!! Form::radio('sle_anterior_chamber_od_angle', 'open', true, ['disabled' => 'true']) !!} Open
                        @else
                          {!! Form::radio('sle_anterior_chamber_od_angle', 'open', false, ['disabled' => 'true']) !!} Open
                        @endif
                      </div>
                      <div class="row">
                        @if ($ant_chamber->ACAngleOD == "closed")
                          {!! Form::radio('sle_anterior_chamber_od_angle', 'closed', true, ['disabled' => 'true']) !!} Closed
                        @else
                          {!! Form::radio('sle_anterior_chamber_od_angle', 'closed', false, ['disabled' => 'true']) !!} Closed
                        @endif
                      </div>
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-md-4 col-md-offset-2 text-left">
                      PAS
                    </div>
                    <div class="col-md-4 col-md-offset-2">
                      <div class="row">
                        @if ($ant_chamber->PASOD == "present")
                          {!! Form::radio('sle_anterior_chamber_od_pas', 'present', true, ['disabled' => 'true']) !!} Present
                        @else
                          {!! Form::radio('sle_anterior_chamber_od_pas', 'present', false, ['disabled' => 'true']) !!} Present
                        @endif
                      </div>
                      <div class="row">
                        @if ($ant_chamber->PASOS == "absent")
                          {!! Form::radio('sle_anterior_chamber_od_pas', 'absent', true, ['disabled' => 'true']) !!} Absent
                        @else
                          {!! Form::radio('sle_anterior_chamber_od_pas', 'absent', false, ['disabled' => 'true']) !!} Absent
                        @endif
                      </div>
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-md-4 col-md-offset-2 text-left">
                      KP
                    </div>
                    <div class="col-md-4 col-md-offset-2">
                      <div class="row">
                        @if ($ant_chamber->ACODKP == "1")
                          {!! Form::radio('sle_anterior_chamber_od_kp', '1', true, ['disabled' => 'true']) !!} +1
                        @else
                          {!! Form::radio('sle_anterior_chamber_od_kp', '1', false, ['disabled' => 'true']) !!} +1
                        @endif
                      </div>
                      <div class="row">
                        @if ($ant_chamber->ACODKP == "2")
                          {!! Form::radio('sle_anterior_chamber_od_kp', '2', true, ['disabled' => 'true']) !!} +2
                        @else
                          {!! Form::radio('sle_anterior_chamber_od_kp', '2', false, ['disabled' => 'true']) !!} +2
                        @endif
                      </div>
                      <div class="row">
                        @if ($ant_chamber->ACODKP == "3")
                          {!! Form::radio('sle_anterior_chamber_od_kp', '3', true, ['disabled' => 'true']) !!} +3
                        @else
                          {!! Form::radio('sle_anterior_chamber_od_kp', '3', false, ['disabled' => 'true']) !!} +3
                        @endif
                      </div>
                      <div class="row">
                        @if ($ant_chamber->ACODKP == "4")
                          {!! Form::radio('sle_anterior_chamber_od_kp', '4', true, ['disabled' => 'true']) !!} +4
                        @else
                          {!! Form::radio('sle_anterior_chamber_od_kp', '4', false, ['disabled' => 'true']) !!} +4
                        @endif
                      </div>
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-md-4 col-md-offset-2 text-left">
                      Other
                    </div>
                    <div class="col-md-4 col-md-offset-2">
                      <div class="row">
                        @if ($ant_chamber->isShuntOD == 1)
                          {!! Form::checkbox('sle_anterior_chamber_od_shunt', '1', true, ['disabled' => 'true']) !!} Shunt
                        @else
                          {!! Form::checkbox('sle_anterior_chamber_od_shunt', '1', false, ['disabled' => 'true']) !!} Shunt
                        @endif
                      </div>
                      <div class="row">
                        @if ($ant_chamber->isScarringOD == 1)
                          {!! Form::checkbox('sle_anterior_chamber_od_scarring', '1', true, ['disabled' => 'true']) !!} Scarring
                        @else
                          {!! Form::checkbox('sle_anterior_chamber_od_scarring', '1', false, ['disabled' => 'true']) !!} Scarring
                        @endif
                      </div>
                      <div class="row">
                        @if ($ant_chamber->isTraumaOD == 1)
                          {!! Form::checkbox('sle_anterior_chamber_od_trauma', '1', true, ['disabled' => 'true']) !!} Trauma
                        @else
                          {!! Form::checkbox('sle_anterior_chamber_od_trauma', '1', false, ['disabled' => 'true']) !!} Trauma
                        @endif
                      </div>
                      <div class="row">
                        @if ($ant_chamber->isBlebOD == 1)
                          {!! Form::checkbox('sle_anterior_chamber_od_bleb', '1', true, ['disabled' => 'true']) !!} Bleb
                        @else
                          {!! Form::checkbox('sle_anterior_chamber_od_bleb', '1', false, ['disabled' => 'true']) !!} Bleb
                        @endif
                      </div>
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-md-4 col-md-offset-2 text-left">
                      Bleb
                    </div>
                    <div class="col-md-4 col-md-offset-2">
                      <div class="row">
                        @if ($ant_chamber->isVascularOD == 1)
                          {!! Form::radio('sle_anterior_chamber_od_bleb_type', 1, true, ['disabled' => 'true']) !!} Vascular &nbsp;
                        @else
                          {!! Form::radio('sle_anterior_chamber_od_bleb_type', 1, false, ['disabled' => 'true']) !!} Vascular &nbsp;
                        @endif
                      </div>
                      <div class="row">
                        @if ($ant_chamber->isVascularOD == 0)
                          {!! Form::radio('sle_anterior_chamber_od_bleb_type', 0, true, ['disabled' => 'true']) !!} Avascular
                        @else
                          {!! Form::radio('sle_anterior_chamber_od_bleb_type', 0, false, ['disabled' => 'true']) !!} Avascular
                        @endif
                      </div>
                      <br />
                      <div class="row">
                        @if ($ant_chamber->BlebOD_Num == "1")
                          {!! Form::radio('sle_anterior_chamber_od_bleb_level', '1', true, ['disabled' => 'true']) !!} +1
                        @else
                          {!! Form::radio('sle_anterior_chamber_od_bleb_level', '1', false, ['disabled' => 'true']) !!} +1
                        @endif
                      </div>
                      <div class="row">
                        @if ($ant_chamber->BlebOD_Num == "2")
                          {!! Form::radio('sle_anterior_chamber_od_bleb_level', '2', true, ['disabled' => 'true']) !!} +2
                        @else
                          {!! Form::radio('sle_anterior_chamber_od_bleb_level', '2', false, ['disabled' => 'true']) !!} +2
                        @endif
                      </div>
                      <div class="row">
                        @if ($ant_chamber->BlebOD_Num == "3")
                          {!! Form::radio('sle_anterior_chamber_od_bleb_level', '3', true, ['disabled' => 'true']) !!} +3
                        @else
                          {!! Form::radio('sle_anterior_chamber_od_bleb_level', '3', false, ['disabled' => 'true']) !!} +3
                        @endif
                      </div>
                      <div class="row">
                        @if ($ant_chamber->BlebOD_Num == "4")
                          {!! Form::radio('sle_anterior_chamber_od_bleb_level', '4', true, ['disabled' => 'true']) !!} +4
                        @else
                          {!! Form::radio('sle_anterior_chamber_od_bleb_level', '4', false, ['disabled' => 'true']) !!} +4
                        @endif
                      </div>
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-md-4 col-md-offset-2 text-left">
                      K Spindle
                    </div>
                    <div class="col-md-4 col-md-offset-2">
                      <div class="row">
                        @if ($ant_chamber->isKSpindleOD == 1)
                          {!! Form::radio('sle_anterior_chamber_od_bleb_k_spindle', 1, true, ['disabled' => 'true']) !!} Yes
                        @else
                          {!! Form::radio('sle_anterior_chamber_od_bleb_k_spindle', 1, false, ['disabled' => 'true']) !!} Yes
                        @endif
                      </div>
                      <div class="row">
                        @if ($ant_chamber->isKSpindleOD == 0)
                          {!! Form::radio('sle_anterior_chamber_od_bleb_k_spindle', 0, true, ['disabled' => 'true']) !!} No
                        @else
                          {!! Form::radio('sle_anterior_chamber_od_bleb_k_spindle', 0, false, ['disabled' => 'true']) !!} No
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="my-section-divider">
                    <span> OS </span>
                  </div>
                  <div class="row">
                    <div class="col-md-4 col-md-offset-2 text-left">
                      Normal
                    </div>
                    <div class="col-md-4 col-md-offset-2">
                      @if ($ant_chamber->isACOSNormal == 1)
                        {!! Form::checkbox('sle_anterior_chamber_os_normal', '1', true, ['disabled' => 'true']) !!}
                      @else
                        {!! Form::checkbox('sle_anterior_chamber_os_normal', '1', false, ['disabled' => 'true']) !!}
                      @endif
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-md-4 col-md-offset-2 text-left">
                      Depth
                    </div>
                    <div class="col-md-4 col-md-offset-2">
                      <div class="row">
                        @if ($ant_chamber->ACDepthOS == "1")
                          {!! Form::radio('sle_anterior_chamber_os_depth', '1', true, ['disabled' => 'true']) !!} +1
                        @else
                          {!! Form::radio('sle_anterior_chamber_os_depth', '1', false, ['disabled' => 'true']) !!} +1
                        @endif
                      </div>
                      <div class="row">
                        @if ($ant_chamber->ACDepthOS == "2")
                          {!! Form::radio('sle_anterior_chamber_os_depth', '2', true, ['disabled' => 'true']) !!} +2
                        @else
                          {!! Form::radio('sle_anterior_chamber_os_depth', '2', false, ['disabled' => 'true']) !!} +2
                        @endif
                      </div>
                      <div class="row">
                        @if ($ant_chamber->ACDepthoOS == "3")
                          {!! Form::radio('sle_anterior_chamber_os_depth', '3', true, ['disabled' => 'true']) !!} +3
                        @else
                          {!! Form::radio('sle_anterior_chamber_os_depth', '3', false, ['disabled' => 'true']) !!} +3
                        @endif
                      </div>
                      <div class="row">
                        @if ($ant_chamber->ACDepthOS == "4")
                          {!! Form::radio('sle_anterior_chamber_os_depth', '4', true, ['disabled' => 'true']) !!} +4
                        @else
                          {!! Form::radio('sle_anterior_chamber_os_depth', '4', false, ['disabled' => 'true']) !!} +4
                        @endif
                      </div>
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-md-4 col-md-offset-2 text-left">
                      Angle
                    </div>
                    <div class="col-md-4 col-md-offset-2">
                      <div class="row">
                        @if ($ant_chamber->ACAngleOS == "open")
                          {!! Form::radio('sle_anterior_chamber_os_angle', 'open', true, ['disabled' => 'true']) !!} Open
                        @else
                          {!! Form::radio('sle_anterior_chamber_os_angle', 'open', false, ['disabled' => 'true']) !!} Open
                        @endif
                      </div>
                      <div class="row">
                        @if ($ant_chamber->ACAngleOS == "closed")
                          {!! Form::radio('sle_anterior_chamber_os_angle', 'closed', true, ['disabled' => 'true']) !!} Closed
                        @else
                          {!! Form::radio('sle_anterior_chamber_os_angle', 'closed', false, ['disabled' => 'true']) !!} Closed
                        @endif
                      </div>
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-md-4 col-md-offset-2 text-left">
                      PAS
                    </div>
                    <div class="col-md-4 col-md-offset-2">
                      <div class="row">
                        @if ($ant_chamber->PASOD == "present")
                          {!! Form::radio('sle_anterior_chamber_od_pas', 'present', true, ['disabled' => 'true']) !!} Present
                        @else
                          {!! Form::radio('sle_anterior_chamber_od_pas', 'present', false, ['disabled' => 'true']) !!} Present
                        @endif
                      </div>
                      <div class="row">
                        @if ($ant_chamber->PASOS == "absent")
                          {!! Form::radio('sle_anterior_chamber_od_pas', 'absent', true, ['disabled' => 'true']) !!} Absent
                        @else
                          {!! Form::radio('sle_anterior_chamber_od_pas', 'absent', false, ['disabled' => 'true']) !!} Absent
                        @endif
                      </div>
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-md-4 col-md-offset-2 text-left">
                      KP
                    </div>
                    <div class="col-md-4 col-md-offset-2">
                      <div class="row">
                        @if ($ant_chamber->ACOSKP == "1")
                          {!! Form::radio('sle_anterior_chamber_os_kp', '1', true, ['disabled' => 'true']) !!} +1
                        @else
                          {!! Form::radio('sle_anterior_chamber_os_kp', '1', false, ['disabled' => 'true']) !!} +1
                        @endif
                      </div>
                      <div class="row">
                        @if ($ant_chamber->ACOSKP == "2")
                          {!! Form::radio('sle_anterior_chamber_os_kp', '2', true, ['disabled' => 'true']) !!} +2
                        @else
                          {!! Form::radio('sle_anterior_chamber_os_kp', '2', false, ['disabled' => 'true']) !!} +2
                        @endif
                      </div>
                      <div class="row">
                        @if ($ant_chamber->ACOSKP == "3")
                          {!! Form::radio('sle_anterior_chamber_os_kp', '3', true, ['disabled' => 'true']) !!} +3
                        @else
                          {!! Form::radio('sle_anterior_chamber_os_kp', '3', false, ['disabled' => 'true']) !!} +3
                        @endif
                      </div>
                      <div class="row">
                        @if ($ant_chamber->ACOSKP == "4")
                          {!! Form::radio('sle_anterior_chamber_os_kp', '4', true, ['disabled' => 'true']) !!} +4
                        @else
                          {!! Form::radio('sle_anterior_chamber_os_kp', '4', false, ['disabled' => 'true']) !!} +4
                        @endif
                      </div>
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-md-4 col-md-offset-2 text-left">
                      Other
                    </div>
                    <div class="col-md-4 col-md-offset-2">
                      <div class="row">
                        @if ($ant_chamber->isShuntOS == 1)
                          {!! Form::checkbox('sle_anterior_chamber_os_shunt', '1', true, ['disabled' => 'true']) !!} Shunt
                        @else
                          {!! Form::checkbox('sle_anterior_chamber_os_shunt', '1', false, ['disabled' => 'true']) !!} Shunt
                        @endif
                      </div>
                      <div class="row">
                        @if ($ant_chamber->isScarringOS == 1)
                          {!! Form::checkbox('sle_anterior_chamber_os_scarring', '1', true, ['disabled' => 'true']) !!} Scarring
                        @else
                          {!! Form::checkbox('sle_anterior_chamber_os_scarring', '1', false, ['disabled' => 'true']) !!} Scarring
                        @endif
                      </div>
                      <div class="row">
                        @if ($ant_chamber->isTraumaOS == 1)
                          {!! Form::checkbox('sle_anterior_chamber_os_trauma', '1', true, ['disabled' => 'true']) !!} Trauma
                        @else
                          {!! Form::checkbox('sle_anterior_chamber_os_trauma', '1', false, ['disabled' => 'true']) !!} Trauma
                        @endif
                      </div>
                      <div class="row">
                        @if ($ant_chamber->isBlebOS == 1)
                          {!! Form::checkbox('sle_anterior_chamber_os_bleb', '1', true, ['disabled' => 'true']) !!} Bleb
                        @else
                          {!! Form::checkbox('sle_anterior_chamber_os_bleb', '1', false, ['disabled' => 'true']) !!} Bleb
                        @endif
                      </div>
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-md-4 col-md-offset-2 text-left">
                      Bleb
                    </div>
                    <div class="col-md-4 col-md-offset-2">
                      <div class="row">
                        @if ($ant_chamber->isVascularOS == 1)
                          {!! Form::radio('sle_anterior_chamber_os_bleb_type', 1, true, ['disabled' => 'true']) !!} Vascular &nbsp;
                        @else
                          {!! Form::radio('sle_anterior_chamber_os_bleb_type', 1, false, ['disabled' => 'true']) !!} Vascular &nbsp;
                        @endif
                      </div>
                      <div class="row">
                        @if ($ant_chamber->isVascularOS == 0)
                          {!! Form::radio('sle_anterior_chamber_os_bleb_type', 0, true, ['disabled' => 'true']) !!} Avascular
                        @else
                          {!! Form::radio('sle_anterior_chamber_os_bleb_type', 0, false, ['disabled' => 'true']) !!} Avascular
                        @endif
                      </div>
                      <br />
                      <div class="row">
                        @if ($ant_chamber->BlebOS_Num == "1")
                          {!! Form::radio('sle_anterior_chamber_os_bleb_level', '1', true, ['disabled' => 'true']) !!} +1
                        @else
                          {!! Form::radio('sle_anterior_chamber_os_bleb_level', '1', false, ['disabled' => 'true']) !!} +1
                        @endif
                      </div>
                      <div class="row">
                        @if ($ant_chamber->BlebOS_Num == "2")
                          {!! Form::radio('sle_anterior_chamber_os_bleb_level', '2', true, ['disabled' => 'true']) !!} +2
                        @else
                          {!! Form::radio('sle_anterior_chamber_os_bleb_level', '2', false, ['disabled' => 'true']) !!} +2
                        @endif
                      </div>
                      <div class="row">
                        @if ($ant_chamber->BlebOS_Num == "3")
                          {!! Form::radio('sle_anterior_chamber_os_bleb_level', '3', true, ['disabled' => 'true']) !!} +3
                        @else
                          {!! Form::radio('sle_anterior_chamber_os_bleb_level', '3', false, ['disabled' => 'true']) !!} +3
                        @endif
                      </div>
                      <div class="row">
                        @if ($ant_chamber->BlebOS_Num == "4")
                          {!! Form::radio('sle_anterior_chamber_os_bleb_level', '4', true, ['disabled' => 'true']) !!} +4
                        @else
                          {!! Form::radio('sle_anterior_chamber_os_bleb_level', '4', false, ['disabled' => 'true']) !!} +4
                        @endif
                      </div>
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-md-4 col-md-offset-2 text-left">
                      K Spindle
                    </div>
                    <div class="col-md-4 col-md-offset-2">
                      <div class="row">
                        @if ($ant_chamber->isKSpindleOS == 1)
                          {!! Form::radio('sle_anterior_chamber_os_bleb_k_spindle', 1, true, ['disabled' => 'true']) !!} Yes
                        @else
                          {!! Form::radio('sle_anterior_chamber_os_bleb_k_spindle', 1, false, ['disabled' => 'true']) !!} Yes
                        @endif
                      </div>
                      <div class="row">
                        @if ($ant_chamber->isKSpindleOS == 0)
                          {!! Form::radio('sle_anterior_chamber_os_bleb_k_spindle', 0, true, ['disabled' => 'true']) !!} No
                        @else
                          {!! Form::radio('sle_anterior_chamber_os_bleb_k_spindle', 0, false, ['disabled' => 'true']) !!} No
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <br />
              <br />
              <br />

              {{-- Lens --}}
              <div class="row">
                <div class="my-section-divider">
                  <span> Lens </span>
                </div>
                <div class="col-md-6">
                  <div class="my-section-divider">
                    <span> OD </span>
                  </div>
                  <div class="row text-center">
                    @if ($lense->isStableLensOD == 1)
                      {!! Form::checkbox('sle_lens_od_stable', '1', true, ['disabled' => 'true']) !!} Stable &nbsp;
                    @else
                      {!! Form::checkbox('sle_lens_od_stable', '1', false, ['disabled' => 'true']) !!} Stable &nbsp;
                    @endif
                    @if ($lense->isPseudophakia_OD == 1)
                      {!! Form::checkbox('sle_lens_od_pseudohakia', '1', true, ['disabled' => 'true']) !!} Pseudohakia &nbsp;
                    @else
                      {!! Form::checkbox('sle_lens_od_pseudohakia', '1', false, ['disabled' => 'true']) !!} Pseudohakia &nbsp;
                    @endif
                    @if ($lense->isPCO_OD == 1)
                      {!! Form::checkbox('sle_lens_od_pco', '1', true, ['disabled' => 'true']) !!} PCO &nbsp;
                    @else
                      {!! Form::checkbox('sle_lens_od_pco', '1', false, ['disabled' => 'true']) !!} PCO &nbsp;
                    @endif
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-md-2">
                      NS
                    </div>
                    <div class="col-md-3">
                      {{ Form::select('sle_lens_od_ns_type', [
                        $lense->NS_OD => $lense->NS_OD
                      ], $lense->NS_OD, ['disabled' => 'true'])
                      }}
                    </div>
                    <div class="col-md-7">
                      {!! Form::text('sle_lens_od_ns_notes', $lense->NS_OD_Notes, ['id' => 'sle_lens_od_ns_notes', 'disabled' => 'true']) !!}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2">
                      Cortical
                    </div>
                    <div class="col-md-3">
                      {{ Form::select('sle_lens_od_cortical_type', [
                        $lense->Coritcal_OD => $lense->Coritcal_OD
                      ], $lense->Coritcal_OD, ['disabled' => 'true'])
                      }}
                    </div>
                    <div class="col-md-7">
                      {!! Form::text('sle_lens_od_cortical_notes', $lense->Cortical_OD_Notes, ['id' => 'sle_lens_od_cortical_notes', 'disabled' => 'true']) !!}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2">
                      PSC
                    </div>
                    <div class="col-md-3">
                      {{ Form::select('sle_lens_od_psc_type', [
                        $lense->PSC_OD => $lense->PSC_OD
                      ], $lense->PSC_OD, ['disabled' => 'true'])
                      }}
                    </div>
                    <div class="col-md-7">
                      {!! Form::text('sle_lens_od_psc_notes', $lense->PSC_OD_Notes, ['id' => 'sle_lens_od_psc_notes', 'disabled' => 'true']) !!}
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="my-section-divider">
                    <span> OS </span>
                  </div>
                  <div class="row text-center">
                    @if ($lense->isStableLensOS == 1)
                      {!! Form::checkbox('sle_lens_os_stable', '1', true, ['disabled' => 'true']) !!} Stable &nbsp;
                    @else
                      {!! Form::checkbox('sle_lens_os_stable', '1', false, ['disabled' => 'true']) !!} Stable &nbsp;
                    @endif
                    @if ($lense->isPseudophakia_OS == 1)
                      {!! Form::checkbox('sle_lens_os_pseudohakia', '1', true, ['disabled' => 'true']) !!} Pseudohakia &nbsp;
                    @else
                      {!! Form::checkbox('sle_lens_os_pseudohakia', '1', false, ['disabled' => 'true']) !!} Pseudohakia &nbsp;
                    @endif
                    @if ($lense->isPCO_OS == 1)
                      {!! Form::checkbox('sle_lens_os_pco', '1', true, ['disabled' => 'true']) !!} PCO &nbsp;
                    @else
                      {!! Form::checkbox('sle_lens_os_pco', '1', false, ['disabled' => 'true']) !!} PCO &nbsp;
                    @endif
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-md-2">
                      NS
                    </div>
                    <div class="col-md-3">
                      {{ Form::select('sle_lens_os_ns_type', [
                        $lense->NS_OS => $lense->NS_OS
                      ], $lense->NS_OS, ['disabled' => 'true'])
                      }}
                    </div>
                    <div class="col-md-7">
                      {!! Form::text('sle_lens_os_ns_notes', $lense->NS_OS_Notes, ['id' => 'sle_lens_os_ns_notes', 'disabled' => 'true']) !!}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2">
                      Cortical
                    </div>
                    <div class="col-md-3">
                      {{ Form::select('sle_lens_os_cortical_type', [
                        $lense->Coritcal_OS => $lense->Coritcal_OS
                      ], $lense->Coritcal_OS, ['disabled' => 'true'])
                      }}
                    </div>
                    <div class="col-md-7">
                      {!! Form::text('sle_lens_os_cortical_notes', $lense->Cortical_OS_Notes, ['id' => 'sle_lens_os_cortical_notes', 'disabled' => 'true']) !!}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2">
                      PSC
                    </div>
                    <div class="col-md-3">
                      {{ Form::select('sle_lens_os_psc_type', [
                        $lense->PSC_OS => $lense->PSC_OS
                      ], $lense->PSC_OS, ['disabled' => 'true'])
                      }}
                    </div>
                    <div class="col-md-7">
                      {!! Form::text('sle_lens_os_psc_notes', $lense->PSC_OS_Notes, ['id' => 'sle_lens_os_psc_notes', 'disabled' => 'true']) !!}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- Row 6: Intraocular Pressure --}}
      <div class="row">
        <div class="col-md-12">
          <div class="panel heading-border">
            <div class="panel-body bg-light">
              <div class="section-divider mt20 mb40">
                <span> Intraocular Pressure </span>
              </div>
              <div class="row text-center">
                <div class="col-md-2"></div>
                <div class="col-md-2">Value</div>
                <div class="col-md-2">Type</div>
                <div class="col-md-5">Notes</div>
              </div>
              <div class="row text-center">
                <div class="col-md-1"></div>
                <div class="col-md-1">
                  OD
                </div>
                <div class="col-md-2">
                  {!! Form::text('intra_od_value', $iop->ODValue, ['id' => 'intra_od_value', 'class', 'size' => '20', 'disabled' => 'true']) !!}
                </div>
                <div class="col-md-2">
                  {!! Form::text('intra_od_type', $iop->ODType, ['id' => 'intra_od_type', 'class', 'size' => '20', 'disabled' => 'true']) !!}
                </div>
                <div class="col-md-5">
                  {!! Form::text('intra_od_notes', $iop->ODNotes, ['id' => 'intra_od_notes', 'class', 'size' => '50', 'disabled' => 'true']) !!}
                </div>
              </div>
              <div class="row text-center">
                <div class="col-md-1"></div>
                <div class="col-md-1">
                  OS
                </div>
                <div class="col-md-2">
                  {!! Form::text('intra_os_value',$iop->OSValue, ['id' => 'intra_os_value', 'class', 'size' => '20', 'disabled' => 'true']) !!}
                </div>
                <div class="col-md-2">
                  {!! Form::text('intra_os_type', $iop->OSType, ['id' => 'intra_os_type', 'class', 'size' => '20', 'disabled' => 'true']) !!}
                </div>
                <div class="col-md-5">
                  {!! Form::text('intra_os_notes', $iop->OSNotes, ['id' => 'intra_os_notes', 'class', 'size' => '50', 'disabled' => 'true']) !!}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- Row 7: Gonio --}}
      <div class="row">
        <div class="col-md-12">
          <div class="panel heading-border">
            <div class="panel-body bg-light">
              <div class="section-divider mt20 mb40">
                <span> Gonio </span>
              </div>
              <div class="row">
                <div class="col-md-3 col-md-offset-2 text-center">
                  History of frontal headaches?
                </div>
                <div class="col-md-2 text-center">
                  @if ($gonio->isHxFHA == 1)
                    {!! Form::radio('hx_front_headache', 1, true, ['disabled' => 'true']) !!} Yes &nbsp; &nbsp; &nbsp;
                  @else
                    {!! Form::radio('hx_front_headache', 1, false, ['disabled' => 'true']) !!} Yes &nbsp; &nbsp; &nbsp;
                  @endif
                  @if ($gonio->isHxFHA == 0)
                    {!! Form::radio('hx_front_headache', 0, true, ['disabled' => 'true']) !!} No
                  @else
                    {!! Form::radio('hx_front_headache', 0, false, ['disabled' => 'true']) !!} No
                  @endif
                </div>
                <div class="col-md-3 text-center">
                  @if ($gonio->FHASide == "right")
                    {!! Form::radio('hx_front_headache_side', 1, true, ['disabled' => 'true']) !!} Right &nbsp; &nbsp; &nbsp;
                  @else
                    {!! Form::radio('hx_front_headache_side', 1, false, ['disabled' => 'true']) !!} Right &nbsp; &nbsp; &nbsp;
                  @endif
                  @if ($gonio->FHASide == "left")
                    {!! Form::radio('hx_front_headache_side', 0, true, ['disabled' => 'true']) !!} Left &nbsp; &nbsp; &nbsp;
                  @else
                    {!! Form::radio('hx_front_headache_side', 0, false, ['disabled' => 'true']) !!} Left &nbsp; &nbsp; &nbsp;
                  @endif
                  @if ($gonio->FHASide == "both")
                    {!! Form::radio('hx_front_headache_side', 0, true, ['disabled' => 'true']) !!} Both
                  @else
                    {!! Form::radio('hx_front_headache_side', 0, false, ['disabled' => 'true']) !!} Both
                  @endif
                </div>
              </div>
              <br />
              <br />
              <br />
              {{-- OD --}}
              <div class="row">
                <div class="section-divider mt20 mb40">
                  <span> OD </span>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    @if ($gonio->isODNormal == 1)
                      {!! Form::checkbox('gonio_normal_od', '1', true, ['disabled' => 'true']) !!} Normal
                    @else
                      {!! Form::checkbox('gonio_normal_od', '0', false, ['disabled' => 'true']) !!} Normal
                    @endif
                  </div>
                  <div class="col-md-4">
                    <div class="section-divider mt20 mb40">
                      <span> Noncompressed </span>
                    </div>
                    <div class="row">
                      <div class="col-md-2 col-md-offset-2">
                        <div class="row">
                          @if ($gonio->odABCDNon == "a")
                            {!! Form::radio('gonio_noncompressed_od_abcd', 'a', true, ['disabled' => 'true']) !!} A
                          @else
                            {!! Form::radio('gonio_noncompressed_od_abcd', 'a', false, ['disabled' => 'true']) !!} A
                          @endif
                        </div>
                        <div class="row">
                          @if ($gonio->odABCDNon == "b")
                            {!! Form::radio('gonio_noncompressed_od_abcd', 'b', true, ['disabled' => 'true']) !!} B
                          @else
                            {!! Form::radio('gonio_noncompressed_od_abcd', 'b', false, ['disabled' => 'true']) !!} B
                          @endif                        </div>
                        <div class="row">
                          @if ($gonio->odABCDNon == "c")
                            {!! Form::radio('gonio_noncompressed_od_abcd', 'c', true, ['disabled' => 'true']) !!} C
                          @else
                            {!! Form::radio('gonio_noncompressed_od_abcd', 'c', false, ['disabled' => 'true']) !!} C
                          @endif                        </div>
                        <div class="row">
                          @if ($gonio->odABCDNon == "d")
                            {!! Form::radio('gonio_noncompressed_od_abcd', 'd', true, ['disabled' => 'true']) !!} D
                          @else
                            {!! Form::radio('gonio_noncompressed_od_abcd', 'd', false, ['disabled' => 'true']) !!} D
                          @endif
                        </div>
                      </div>
                      <div class="col-md-3 text-center">
                        {{ Form::select('gonio_od_cd_noncompressed', [
                          $gonio->odDegreeNon => $gonio->odDegreeNon
                        ], $gonio->odDegreeNon, ['disabled' => 'true'])
                        }}
                        &deg;
                      </div>
                      <div class="col-md-2 text-right">
                        <div class="row">
                          @if ($gonio->odRSQNon == "r")
                            {!! Form::radio('gonio_noncompressed_od_rsq', 'r', true, ['disabled' => 'true']) !!} R
                          @else
                            {!! Form::radio('gonio_noncompressed_od_rsq', 'r', false, ['disabled' => 'true']) !!} R
                          @endif
                        </div>
                        <div class="row">
                          @if ($gonio->odRSQNon == "s")
                            {!! Form::radio('gonio_noncompressed_od_rsq', 's', true, ['disabled' => 'true']) !!} S
                          @else
                            {!! Form::radio('gonio_noncompressed_od_rsq', 's', false, ['disabled' => 'true']) !!} S
                          @endif                        </div>
                        <div class="row">
                          @if ($gonio->odRSQNon == "q")
                            {!! Form::radio('gonio_noncompressed_od_rsq', 'q', true, ['disabled' => 'true']) !!} Q
                          @else
                            {!! Form::radio('gonio_noncompressed_od_rsq', 'q', false, ['disabled' => 'true']) !!} Q
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 col-md-offset-1">
                    <div class="section-divider mt20 mb40">
                      <span> Compressed </span>
                    </div>
                    <div class="row">
                      <div class="col-md-2 col-md-offset-2">
                        <div class="row">
                          @if ($gonio->odABCDComp == "a")
                            {!! Form::radio('gonio_compressed_od_abcd', 'a', true, ['disabled' => 'true']) !!} A
                          @else
                            {!! Form::radio('gonio_compressed_od_abcd', 'a', false, ['disabled' => 'true']) !!} A
                          @endif
                        </div>
                        <div class="row">
                          @if ($gonio->odABCDComp == "b")
                            {!! Form::radio('gonio_compressed_od_abcd', 'b', true, ['disabled' => 'true']) !!} B
                          @else
                            {!! Form::radio('gonio_compressed_od_abcd', 'b', false, ['disabled' => 'true']) !!} B
                          @endif                        </div>
                        <div class="row">
                          @if ($gonio->odABCDComp == "c")
                            {!! Form::radio('gonio_compressed_od_abcd', 'c', true, ['disabled' => 'true']) !!} C
                          @else
                            {!! Form::radio('gonio_compressed_od_abcd', 'c', false, ['disabled' => 'true']) !!} C
                          @endif                        </div>
                        <div class="row">
                          @if ($gonio->odABCDComp == "d")
                            {!! Form::radio('gonio_compressed_od_abcd', 'd', true, ['disabled' => 'true']) !!} D
                          @else
                            {!! Form::radio('gonio_compressed_od_abcd', 'd', false, ['disabled' => 'true']) !!} D
                          @endif
                        </div>
                      </div>
                      <div class="col-md-3 text-center">
                        {{ Form::select('gonio_od_cd_compressed', [
                          $gonio->odDegreeComp => $gonio->odDegreeComp
                        ], $gonio->odDegreeComp, ['disabled' => 'true'])
                        }}
                        &deg;
                      </div>
                      <div class="col-md-2 text-right">
                        <div class="row">
                          @if ($gonio->odRSQComp == "r")
                            {!! Form::radio('gonio_compressed_od_rsq', 'r', true, ['disabled' => 'true']) !!} R
                          @else
                            {!! Form::radio('gonio_compressed_od_rsq', 'r', false, ['disabled' => 'true']) !!} R
                          @endif
                        </div>
                        <div class="row">
                          @if ($gonio->odRSQComp == "s")
                            {!! Form::radio('gonio_compressed_od_rsq', 's', true, ['disabled' => 'true']) !!} S
                          @else
                            {!! Form::radio('gonio_compressed_od_rsq', 's', false, ['disabled' => 'true']) !!} S
                          @endif                        </div>
                        <div class="row">
                          @if ($gonio->odRSQComp == "q")
                            {!! Form::radio('gonio_compressed_od_rsq', 'q', true, ['disabled' => 'true']) !!} Q
                          @else
                            {!! Form::radio('gonio_compressed_od_rsq', 'q', false, ['disabled' => 'true']) !!} Q
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-10 col-md-offset-2">
                    <div class="section-divider mt20 mb40">
                      <span> Pigment </span>
                    </div>
                    <div class="row">
                      <div class="col-md-4 col-md-offset-1">
                        @if ($gonio->odPigment == "1")
                          {!! Form::radio('gonio_pigment_od', '1', true, ['disabled' => 'true']) !!} +1 &nbsp; &nbsp; &nbsp;
                        @else
                          {!! Form::radio('gonio_pigment_od', '1', false, ['disabled' => 'true']) !!} +1 &nbsp; &nbsp; &nbsp;
                        @endif
                        @if ($gonio->odPigment == "2")
                          {!! Form::radio('gonio_pigment_od', '2', true, ['disabled' => 'true']) !!} +2 &nbsp; &nbsp; &nbsp;
                        @else
                          {!! Form::radio('gonio_pigment_od', '2', false, ['disabled' => 'true']) !!} +2 &nbsp; &nbsp; &nbsp;
                        @endif
                        @if ($gonio->odPigment == "3")
                          {!! Form::radio('gonio_pigment_od', '3', true, ['disabled' => 'true']) !!} +3 &nbsp; &nbsp; &nbsp;
                        @else
                          {!! Form::radio('gonio_pigment_od', '3', false, ['disabled' => 'true']) !!} +3 &nbsp; &nbsp; &nbsp;
                        @endif
                        @if ($gonio->odPigment == "4")
                          {!! Form::radio('gonio_pigment_od', '4', true, ['disabled' => 'true']) !!} +4 &nbsp; &nbsp; &nbsp;
                        @else
                          {!! Form::radio('gonio_pigment_od', '4', false, ['disabled' => 'true']) !!} +4 &nbsp; &nbsp; &nbsp;
                        @endif
                      </div>
                      <div class="col-md-6 col-md-offset-1">
                        Anterior Pigment Line &nbsp; &nbsp; &nbsp;
                        @if ($gonio->isODAntPigLine == 1)
                          {!! Form::radio('gonio_anterior_pigment_line_od', '1', true, ['disabled' => 'true']) !!} Yes &nbsp; &nbsp; &nbsp;
                        @else
                          {!! Form::radio('gonio_anterior_pigment_line_od', '1', false, ['disabled' => 'true']) !!} Yes &nbsp; &nbsp; &nbsp;
                        @endif
                        @if ($gonio->isODAntPigLine == 0)
                          {!! Form::radio('gonio_anterior_pigment_line_od', '0', true, ['disabled' => 'true']) !!} No &nbsp; &nbsp; &nbsp;
                        @else
                          {!! Form::radio('gonio_anterior_pigment_line_od', '0', false, ['disabled' => 'true']) !!} No &nbsp; &nbsp; &nbsp;
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <br />
              <br />
              <br />
              {{-- OD --}}
              <div class="row">
                <div class="section-divider mt20 mb40">
                  <span> OS </span>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    @if ($gonio->isOSNormal == 1)
                      {!! Form::checkbox('gonio_normal_os', '1', true, ['disabled' => 'true']) !!} Normal
                    @else
                      {!! Form::checkbox('gonio_normal_os', '0', false, ['disabled' => 'true']) !!} Normal
                    @endif                  </div>
                  <div class="col-md-4">
                    <div class="section-divider mt20 mb40">
                      <span> Noncompressed </span>
                    </div>
                    <div class="row">
                      <div class="col-md-2 col-md-offset-2">
                        <div class="row">
                          @if ($gonio->osABCDNon == "a")
                            {!! Form::radio('gonio_noncompressed_os_abcd', 'a', true, ['disabled' => 'true']) !!} A
                          @else
                            {!! Form::radio('gonio_noncompressed_os_abcd', 'a', false, ['disabled' => 'true']) !!} A
                          @endif
                        </div>
                        <div class="row">
                          @if ($gonio->osABCDNon == "b")
                            {!! Form::radio('gonio_noncompressed_os_abcd', 'b', true, ['disabled' => 'true']) !!} B
                          @else
                            {!! Form::radio('gonio_noncompressed_os_abcd', 'b', false, ['disabled' => 'true']) !!} B
                          @endif                        </div>
                        <div class="row">
                          @if ($gonio->osABCDNon == "c")
                            {!! Form::radio('gonio_noncompressed_os_abcd', 'c', true, ['disabled' => 'true']) !!} C
                          @else
                            {!! Form::radio('gonio_noncompressed_os_abcd', 'c', false, ['disabled' => 'true']) !!} C
                          @endif                        </div>
                        <div class="row">
                          @if ($gonio->osABCDNon == "d")
                            {!! Form::radio('gonio_noncompressed_os_abcd', 'd', true, ['disabled' => 'true']) !!} D
                          @else
                            {!! Form::radio('gonio_noncompressed_os_abcd', 'd', false, ['disabled' => 'true']) !!} D
                          @endif
                        </div>
                      </div>
                      <div class="col-md-3 text-center">
                        {{ Form::select('gonio_os_cd_noncompressed', [
                          $gonio->osDegreeNon => $gonio->osDegreeNon
                        ], $gonio->osDegreeNon, ['disabled' => 'true'])
                        }}
                        &deg;
                      </div>
                      <div class="col-md-2 text-right">
                        <div class="row">
                          @if ($gonio->osRSQNon == "r")
                            {!! Form::radio('gonio_noncompressed_os_rsq', 'r', true, ['disabled' => 'true']) !!} R
                          @else
                            {!! Form::radio('gonio_noncompressed_os_rsq', 'r', false, ['disabled' => 'true']) !!} R
                          @endif
                        </div>
                        <div class="row">
                          @if ($gonio->osRSQNon == "s")
                            {!! Form::radio('gonio_noncompressed_os_rsq', 's', true, ['disabled' => 'true']) !!} S
                          @else
                            {!! Form::radio('gonio_noncompressed_os_rsq', 's', false, ['disabled' => 'true']) !!} S
                          @endif                        </div>
                        <div class="row">
                          @if ($gonio->osRSQNon == "q")
                            {!! Form::radio('gonio_noncompressed_os_rsq', 'q', true, ['disabled' => 'true']) !!} Q
                          @else
                            {!! Form::radio('gonio_noncompressed_os_rsq', 'q', false, ['disabled' => 'true']) !!} Q
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 col-md-offset-1">
                    <div class="section-divider mt20 mb40">
                      <span> Compressed </span>
                    </div>
                    <div class="row">
                      <div class="col-md-2 col-md-offset-2">
                        <div class="row">
                          @if ($gonio->osABCDComp == "a")
                            {!! Form::radio('gonio_compressed_os_abcd', 'a', true, ['disabled' => 'true']) !!} A
                          @else
                            {!! Form::radio('gonio_compressed_os_abcd', 'a', false, ['disabled' => 'true']) !!} A
                          @endif
                        </div>
                        <div class="row">
                          @if ($gonio->osABCDComp == "b")
                            {!! Form::radio('gonio_compressed_os_abcd', 'b', true, ['disabled' => 'true']) !!} B
                          @else
                            {!! Form::radio('gonio_compressed_os_abcd', 'b', false, ['disabled' => 'true']) !!} B
                          @endif                        </div>
                        <div class="row">
                          @if ($gonio->osABCDComp == "c")
                            {!! Form::radio('gonio_compressed_os_abcd', 'c', true, ['disabled' => 'true']) !!} C
                          @else
                            {!! Form::radio('gonio_compressed_os_abcd', 'c', false, ['disabled' => 'true']) !!} C
                          @endif                        </div>
                        <div class="row">
                          @if ($gonio->osABCDComp == "d")
                            {!! Form::radio('gonio_compressed_os_abcd', 'd', true, ['disabled' => 'true']) !!} D
                          @else
                            {!! Form::radio('gonio_compressed_os_abcd', 'd', false, ['disabled' => 'true']) !!} D
                          @endif
                        </div>
                      </div>
                      <div class="col-md-3 text-center">
                        {{ Form::select('gonio_os_cd_compressed', [
                          $gonio->osDegreeComp => $gonio->osDegreeComp
                        ], $gonio->osDegreeComp, ['disabled' => 'true'])
                        }}
                        &deg;
                      </div>
                      <div class="col-md-2 text-right">
                        <div class="row">
                          @if ($gonio->osRSQComp == "r")
                            {!! Form::radio('gonio_compressed_os_rsq', 'r', true, ['disabled' => 'true']) !!} R
                          @else
                            {!! Form::radio('gonio_compressed_os_rsq', 'r', false, ['disabled' => 'true']) !!} R
                          @endif
                        </div>
                        <div class="row">
                          @if ($gonio->osRSQComp == "s")
                            {!! Form::radio('gonio_compressed_os_rsq', 's', true, ['disabled' => 'true']) !!} S
                          @else
                            {!! Form::radio('gonio_compressed_os_rsq', 's', false, ['disabled' => 'true']) !!} S
                          @endif                        </div>
                        <div class="row">
                          @if ($gonio->osRSQComp == "q")
                            {!! Form::radio('gonio_compressed_os_rsq', 'q', true, ['disabled' => 'true']) !!} Q
                          @else
                            {!! Form::radio('gonio_compressed_os_rsq', 'q', false, ['disabled' => 'true']) !!} Q
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10 col-md-offset-2">
                      <div class="section-divider mt20 mb40">
                        <span> Pigment </span>
                      </div>
                      <div class="row">
                        <div class="col-md-4 col-md-offset-1">
                          @if ($gonio->osPigment == "1")
                            {!! Form::radio('gonio_pigment_os', '1', true, ['disabled' => 'true']) !!} +1 &nbsp; &nbsp; &nbsp;
                          @else
                            {!! Form::radio('gonio_pigment_os', '1', false, ['disabled' => 'true']) !!} +1 &nbsp; &nbsp; &nbsp;
                          @endif
                          @if ($gonio->osPigment == "2")
                            {!! Form::radio('gonio_pigment_os', '2', true, ['disabled' => 'true']) !!} +2 &nbsp; &nbsp; &nbsp;
                          @else
                            {!! Form::radio('gonio_pigment_os', '2', false, ['disabled' => 'true']) !!} +2 &nbsp; &nbsp; &nbsp;
                          @endif
                          @if ($gonio->osPigment == "3")
                            {!! Form::radio('gonio_pigment_os', '3', true, ['disabled' => 'true']) !!} +3 &nbsp; &nbsp; &nbsp;
                          @else
                            {!! Form::radio('gonio_pigment_os', '3', false, ['disabled' => 'true']) !!} +3 &nbsp; &nbsp; &nbsp;
                          @endif
                          @if ($gonio->osPigment == "4")
                            {!! Form::radio('gonio_pigment_os', '4', true, ['disabled' => 'true']) !!} +4 &nbsp; &nbsp; &nbsp;
                          @else
                            {!! Form::radio('gonio_pigment_os', '4', false, ['disabled' => 'true']) !!} +4 &nbsp; &nbsp; &nbsp;
                          @endif
                        </div>
                        <div class="col-md-6 col-md-offset-1">
                          Anterior Pigment Line &nbsp; &nbsp; &nbsp;
                          @if ($gonio->isOSAntPigLine == 1)
                            {!! Form::radio('gonio_anterior_pigment_line_os', '1', true, ['disabled' => 'true']) !!} Yes &nbsp; &nbsp; &nbsp;
                          @else
                            {!! Form::radio('gonio_anterior_pigment_line_os', '1', false, ['disabled' => 'true']) !!} Yes &nbsp; &nbsp; &nbsp;
                          @endif
                          @if ($gonio->isOSAntPigLine == 0)
                            {!! Form::radio('gonio_anterior_pigment_line_os', '0', true, ['disabled' => 'true']) !!} No &nbsp; &nbsp; &nbsp;
                          @else
                            {!! Form::radio('gonio_anterior_pigment_line_os', '0', false, ['disabled' => 'true']) !!} No &nbsp; &nbsp; &nbsp;
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <br />
                <br />
                <br />
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- Row 8: Fundus Exam --}}
      <div class="row">
        <div class="col-md-12">
          <div class="panel heading-border">
            <div class="panel-body bg-light">
              <div class="section-divider mt20 mb40">
                <span> Fundus Exam </span>
              </div>
              <div class="row">
                @if ($fundus->isDialated == 1)
                  {!! Form::checkbox('fundus_dialated', '1', true, ['disabled' => 'true']) !!} Dialated?
                @else
                  {!! Form::checkbox('fundus_dialated', '0', false, ['disabled' => 'true']) !!} Dialated?
                @endif
              </div>
              <div class="row">
                <div class="col-md-2">
                  Dialation notes:
                </div>
                <div class="col-md-10">
                  {!! Form::text('fundus_dialation_notes', $fundus->dialNotes, ['id' => 'fundus_dialation_notes', 'disabled' => 'true']) !!}
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 fundus_exam">
                  <div class="section-divider mt20 mb40">
                    <span> OD </span>
                  </div>
                  <div class="row">
                    <div class="col-md-2 text-center">
                      <b>C/D</b>
                    </div>
                    <div class="col-md-10 text-center">
                      @if ($fundus->isCDODAb == 1)
                        {!! Form::checkbox('fundus_od_cd_abnormal', '1', true, ['disabled' => 'true']) !!} Abnormal
                      @else
                        {!! Form::checkbox('fundus_od_cd_abnormal', '0', false, ['disabled' => 'true']) !!} Abnormal
                      @endif
                      {{ Form::select('fundus_od_cd_count', [
                        $fundus->CDOD => $fundus->CDOD
                      ], $fundus->CDOD, ['disabled' => 'true'])
                      }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2 text-right">
                      Notes
                    </div>
                    <div class="col-md-10 text-center">
                      {!! Form::text('fundus_od_cd_notes', '', ['id' => 'fundus_od_cd_notes']) !!}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2 text-center">
                      <b>Retina</b>
                    </div>
                    <div class="col-md-10 text-center">
                      @if ($fundus->isRetinaODAb == 1)
                        {!! Form::checkbox('fundus_od_retina_abnormal', '1', true, ['disabled' => 'true']) !!} Abnormal
                      @else
                        {!! Form::checkbox('fundus_od_retina_abnormal', '0', false, ['disabled' => 'true']) !!} Abnormal
                      @endif
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2 text-right">
                      Notes
                    </div>
                    <div class="col-md-10 text-center">
                      {!! Form::text('fundus_od_retina_notes', '', ['id' => 'fundus_od_retina_notes']) !!}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2 text-center">
                      <b>Macula</b>
                    </div>
                    <div class="col-md-10 text-center">
                      @if ($fundus->isMaculaODAb == 1)
                        {!! Form::checkbox('fundus_od_macula_abnormal', '1', true, ['disabled' => 'true']) !!} Abnormal
                      @else
                        {!! Form::checkbox('fundus_od_macula_abnormal', '0', false, ['disabled' => 'true']) !!} Abnormal
                      @endif
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2 text-right">
                      Notes
                    </div>
                    <div class="col-md-10 text-center">
                      {!! Form::text('fundus_od_macula_notes', '', ['id' => 'fundus_od_macula_notes']) !!}
                    </div>
                  </div>
                </div>
                <div class="col-md-6 fundus_exam">
                  <div class="section-divider mt20 mb40">
                    <span> OS </span>
                  </div>
                  <div class="row">
                    <div class="col-md-10 col-md-offset-1 text-center">
                      @if ($fundus->isCDOSAb == 1)
                        {!! Form::checkbox('fundus_os_cd_abnormal', '1', true, ['disabled' => 'true']) !!} Abnormal
                      @else
                        {!! Form::checkbox('fundus_os_cd_abnormal', '0', false, ['disabled' => 'true']) !!} Abnormal
                      @endif
                      {{ Form::select('fundus_os_cd_count', [
                        $fundus->CDOS => $fundus->CDOS
                      ], $fundus->CDOS, ['disabled' => 'true'])
                      }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10 col-md-offset-1 text-center">
                      {!! Form::text('fundus_os_cd_notes', '', ['id' => 'fundus_os_cd_notes']) !!}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10 col-md-offset-1 text-center">
                      @if ($fundus->isRetinaOSAb == 1)
                        {!! Form::checkbox('fundus_os_retina_abnormal', '1', true, ['disabled' => 'true']) !!} Abnormal
                      @else
                        {!! Form::checkbox('fundus_os_retina_abnormal', '0', false, ['disabled' => 'true']) !!} Abnormal
                      @endif
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10 col-md-offset-1 text-center">
                      {!! Form::text('fundus_os_retina_notes', '', ['id' => 'fundus_os_retina_notes']) !!}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10 col-md-offset-1 text-center">
                      @if ($fundus->isMaculaOSAb == 1)
                        {!! Form::checkbox('fundus_os_macula_abnormal', '1', true, ['disabled' => 'true']) !!} Abnormal
                      @else
                        {!! Form::checkbox('fundus_os_macula_abnormal', '0', false, ['disabled' => 'true']) !!} Abnormal
                      @endif
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10 col-md-offset-1 text-center">
                      {!! Form::text('fundus_os_macula_notes', '', ['id' => 'fundus_os_macula_notes']) !!}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- Row 9: Assesment --}}
      <div class="row">
        <div class="col-md-12">
          <div class="panel heading-border">
            <div class="panel-body bg-light">
              <div class="section-divider mt20 mb40">
                <span> Assessment </span>
              </div>
              {!! Form::textarea('assessment', $visit->assessment, ['id' => 'assessment', 'disabled' => 'true']) !!}
            </div>
          </div>
        </div>
      </div>

      {{-- Row 10: Plan --}}
      <div class="row">
        <div class="col-md-12">
          <div class="panel heading-border">
            <div class="panel-body bg-light">
              <div class="section-divider mt20 mb40">
                <span> Plan </span>
              </div>
              {!! Form::textarea('plan', $visit->plan, ['id' => 'plan', 'disabled' => 'true']) !!}
            </div>
          </div>
        </div>
      </div>

      {{-- FORM: SUBMIT --}}
      <br />
      <div class="row">
        <div class="col-md-12">
          <a href="{{URL::previous()}}">Go Back</a>
        </div>
      </div>

      {{-- FORM: CLOSE --}}
      {!! Form::close() !!}
    </div>
    </div>
  </div>
@endsection

@section('script')
  <!-- jQuery -->
  <script src="vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

  {{-- Custom new_visit js --}}
  {!! HTML::script('js/new_visit.js'); !!}

  <!-- jQuery Validate Plugin-->
  <script src="assets/admin-tools/admin-forms/js/jquery.validate.min.js"></script>

  <!-- jQuery Validate Addon -->
  <script src="assets/admin-tools/admin-forms/js/additional-methods.min.js"></script>

  <!-- Theme Javascript -->
  <script src="assets/js/utility/utility.js"></script>
  <script src="assets/js/main.js"></script>
@endsection
