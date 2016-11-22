@extends('layouts.dashboard.master')

@section('title')
  New Patient
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
      {!! Form::open(['action' => 'Dashboard\VisitsController@insertVisit', 'id' => 'admin-form', 'method' => 'post']) !!}

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
                {!! Form::select('patient', ['1' => 'jacob'], null, ['placeholder' => '---  Select Patient  ---', 'class' => 'form-control']) !!}
              </div>
              <div class="row">
                <input type="checkbox" name="new_patient"> New Patient
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
              <div class="row">
                <div class="col-md-2 vcenter">
                  First Name
                </div>
                <div class="col-md-10">
                  {!! Form::text('patient_firstname', '', ['value' => 'blahblah', 'class' => 'gui-input', 'name' => 'demo_firstname', 'id' => 'demo_firstname']) !!}
                </div>
              </div>
              <br />
              <div class="row">
                <div class="col-md-2 vcenter">
                  Last Name
                </div>
                <div class="col-md-10">
                  {!! Form::text('patient_lastname', '', ['value' => 'blahblah', 'class' => 'gui-input', 'name' => 'demo_lastname', 'id' => 'demo_lastname']) !!}
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
                {!! Form::textarea('chief_complaint', '', ['id' => 'chief_complaint']) !!}
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
                  {!! Form::text('dv_glasses_right', '', ['id' => 'dv_glasses_right', 'class', 'size' => '5']) !!}
                </div>
              </div>
              <div class="row text-center">
                <div class="col-xs-8">
                  Left Eye 20/
                </div>
                <div class="col-xs-4">
                  {!! Form::text('dv_glasses_left', '', ['id' => 'dv_glasses_left', 'class', 'size' => '5']) !!}
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
                  {!! Form::text('dv_right', '', ['id' => 'dv_right', 'class', 'size' => '5']) !!}
                </div>
              </div>
              <div class="row text-center">
                <div class="col-xs-8">
                  Left Eye 20/
                </div>
                <div class="col-xs-4">
                  {!! Form::text('dv_left', '', ['id' => 'dv_left', 'class', 'size' => '5']) !!}
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
                  {!! Form::text('rx_od_sphere', '', ['id' => 'rx_od_sphere', 'class', 'size' => '8']) !!}
                </div>
                <div class="col-md-2">
                  {!! Form::text('rx_od_cylinder', '', ['id' => 'rx_od_cylinder', 'class', 'size' => '8']) !!}
                </div>
                <div class="col-md-2">
                  {!! Form::text('rx_od_axis', '', ['id' => 'rx_od_axis', 'class', 'size' => '8']) !!}
                </div>
                <div class="col-md-2">
                  {!! Form::text('rx_od_add', '', ['id' => 'rx_od_add', 'class', 'size' => '8']) !!}
                </div>
              </div>
              <div class="row text-center">
                <div class="col-md-2">
                  OS
                </div>
                <div class="col-md-2">
                  {!! Form::text('rx_os_sphere', '', ['id' => 'rx_od_sphere', 'class', 'size' => '8']) !!}
                </div>
                <div class="col-md-2">
                  {!! Form::text('rx_os_cylinder', '', ['id' => 'rx_od_cylinder', 'class', 'size' => '8']) !!}
                </div>
                <div class="col-md-2">
                  {!! Form::text('rx_os_axis', '', ['id' => 'rx_od_axis', 'class', 'size' => '8']) !!}
                </div>
                <div class="col-md-2">
                  {!! Form::text('rx_os_add', '', ['id' => 'rx_od_add', 'class', 'size' => '8']) !!}
                </div>
              </div>
              <div class="row">
                Rx Notes:
              </div>
              <div class="row">
                {!! Form::textarea('rx_notes', '', ['id' => 'rx_notes', 'rows' => '4']) !!}
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
                  {!! Form::radio('refraction_type', 'manifest_refraction') !!} Manifest Refraction &nbsp; &nbsp; &nbsp;
                  {!! Form::radio('refraction_type', 'autorefraction') !!} Autorefraction
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
                  {!! Form::text('refraction_sc_od_sphere', '', ['id' => 'refraction_sc_od_sphere', 'class', 'size' => '20']) !!}
                </div>
                <div class="col-md-3">
                  {!! Form::text('refraction_sc_od_cylinder', '', ['id' => 'refraction_sc_od_cylinder', 'class', 'size' => '20']) !!}
                </div>
                <div class="col-md-3">
                  {!! Form::text('refraction_sc_od_axis', '', ['id' => 'refraction_sc_od_axis', 'class', 'size' => '20']) !!}
                </div>
              </div>
              <div class="row text-center">
                <div class="col-md-1"></div>
                <div class="col-md-1">
                  OS (sc)
                </div>
                <div class="col-md-3">
                  {!! Form::text('refraction_sc_os_sphere', '', ['id' => 'refraction_sc_os_sphere', 'class', 'size' => '20']) !!}
                </div>
                <div class="col-md-3">
                  {!! Form::text('refraction_sc_os_cylinder', '', ['id' => 'refraction_sc_os_cylinder', 'class', 'size' => '20']) !!}
                </div>
                <div class="col-md-3">
                  {!! Form::text('refraction_sc_os_axis', '', ['id' => 'refraction_sc_os_axis', 'class', 'size' => '20']) !!}
                </div>
              </div>
              <br />
              <div class="row text-center">
                <div class="col-md-1"></div>
                <div class="col-md-1">
                  OD (cc)
                </div>
                <div class="col-md-3">
                  {!! Form::text('refraction_cc_od_sphere', '', ['id' => 'refraction_cc_od_sphere', 'class', 'size' => '20']) !!}
                </div>
                <div class="col-md-3">
                  {!! Form::text('refraction_cc_od_cylinder', '', ['id' => 'refraction_cc_od_cylinder', 'class', 'size' => '20']) !!}
                </div>
                <div class="col-md-3">
                  {!! Form::text('refraction_cc_od_axis', '', ['id' => 'refraction_cc_od_axis', 'class', 'size' => '20']) !!}
                </div>
              </div>
              <div class="row text-center">
                <div class="col-md-1"></div>
                <div class="col-md-1">
                  OS (cc)
                </div>
                <div class="col-md-3">
                  {!! Form::text('refraction_cc_os_sphere', '', ['id' => 'refraction_cc_os_sphere', 'class', 'size' => '20']) !!}
                </div>
                <div class="col-md-3">
                  {!! Form::text('refraction_cc_os_cylinder', '', ['id' => 'refraction_cc_os_cylinder', 'class', 'size' => '20']) !!}
                </div>
                <div class="col-md-3">
                  {!! Form::text('refraction_cc_os_axis', '', ['id' => 'refraction_cc_os_axis', 'class', 'size' => '20']) !!}
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
              <div class="section-divider mt20 mb40">
                <span> Slit Lamp </span>
              </div>
              <div class="row">
                <div class="section-divider mt20 mb40">
                  <span> Pupils </span>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="section-divider mt20 mb40">
                      <span> Left </span>
                    </div>
                    <div class="row text-center">
                      {!! Form::checkbox('sle_pupil_left_normal', 'true') !!} Normal
                    </div>
                    <br />
                    <div class="row">
                      <div class="col-md-5 text-center">
                        Shape
                      </div>
                      <div class="col-md-7">
                        <div class="row">
                          {!! Form::radio('sle_pupil_left_shape', 'round') !!} Round &nbsp; &nbsp; &nbsp;
                        </div>
                        <div class="row">
                          {!! Form::radio('sle_pupil_left_shape', 'irregular') !!} Irregular &nbsp; &nbsp; &nbsp;
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="section-divider mt20 mb40">
                      <span> Right </span>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="section-divider mt20 mb40">
                      <span> Both </span>
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
                  {!! Form::text('intra_od_value', '', ['id' => 'intra_od_value', 'class', 'size' => '20']) !!}
                </div>
                <div class="col-md-2">
                  {!! Form::text('intra_od_type', '', ['id' => 'intra_od_type', 'class', 'size' => '20']) !!}
                </div>
                <div class="col-md-5">
                  {!! Form::text('intra_od_notes', '', ['id' => 'intra_od_notes', 'class', 'size' => '50']) !!}
                </div>
              </div>
              <div class="row text-center">
                <div class="col-md-1"></div>
                <div class="col-md-1">
                  OS
                </div>
                <div class="col-md-2">
                  {!! Form::text('intra_os_value', '', ['id' => 'intra_os_value', 'class', 'size' => '20']) !!}
                </div>
                <div class="col-md-2">
                  {!! Form::text('intra_os_type', '', ['id' => 'intra_os_type', 'class', 'size' => '20']) !!}
                </div>
                <div class="col-md-5">
                  {!! Form::text('intra_os_notes', '', ['id' => 'intra_os_notes', 'class', 'size' => '50']) !!}
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
                  {!! Form::radio('hx_front_headache', 'true') !!} Yes &nbsp; &nbsp; &nbsp;
                  {!! Form::radio('hx_front_headache', 'false') !!} No &nbsp; &nbsp; &nbsp;
                </div>
                <div class="col-md-3 text-center">
                  {!! Form::radio('hx_front_headache_side', 'right') !!} Right &nbsp; &nbsp; &nbsp;
                  {!! Form::radio('hx_front_headache_side', 'left') !!} Left &nbsp; &nbsp; &nbsp;
                  {!! Form::radio('hx_front_headache_side', 'both') !!} Both
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
                    {!! Form::checkbox('gonio_normal_od', 'true') !!} Normal
                  </div>
                  <div class="col-md-4">
                    <div class="section-divider mt20 mb40">
                      <span> Noncompressed </span>
                    </div>
                    <div class="row">
                      <div class="col-md-2 col-md-offset-2">
                        <div class="row">
                          {!! Form::radio('gonio_noncompressed_od_abcd', 'a') !!} A
                        </div>
                        <div class="row">
                          {!! Form::radio('gonio_noncompressed_od_abcd', 'b') !!} B
                        </div>
                        <div class="row">
                          {!! Form::radio('gonio_noncompressed_od_abcd', 'c') !!} C
                        </div>
                        <div class="row">
                          {!! Form::radio('gonio_noncompressed_od_abcd', 'd') !!} D
                        </div>
                      </div>
                      <div class="col-md-3 text-center">
                        0.0 to 1.0
                      </div>
                      <div class="col-md-2 text-right">
                        <div class="row">
                          {!! Form::radio('gonio_noncompressed_od_rsq', 'r') !!} R
                        </div>
                        <div class="row">
                          {!! Form::radio('gonio_noncompressed_od_rsq', 'r') !!} S
                        </div>
                        <div class="row">
                          {!! Form::radio('gonio_noncompressed_od_rsq', 'r') !!} Q
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
                          {!! Form::radio('gonio_compressed_od_abcd', 'a') !!} A
                        </div>
                        <div class="row">
                          {!! Form::radio('gonio_compressed_od_abcd', 'b') !!} B
                        </div>
                        <div class="row">
                          {!! Form::radio('gonio_compressed_od_abcd', 'c') !!} C
                        </div>
                        <div class="row">
                          {!! Form::radio('gonio_compressed_od_abcd', 'd') !!} D
                        </div>
                      </div>
                      <div class="col-md-3 text-center">
                        0.0 to 1.0
                      </div>
                      <div class="col-md-2 text-right">
                        <div class="row">
                          {!! Form::radio('gonio_compressed_od_rsq', 'r') !!} R
                        </div>
                        <div class="row">
                          {!! Form::radio('gonio_compressed_od_rsq', 'r') !!} S
                        </div>
                        <div class="row">
                          {!! Form::radio('gonio_compressed_od_rsq', 'r') !!} Q
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
                        {!! Form::radio('gonio_pigment_od', '1') !!} +1 &nbsp; &nbsp; &nbsp;
                        {!! Form::radio('gonio_pigment_od', '2') !!} +2 &nbsp; &nbsp; &nbsp;
                        {!! Form::radio('gonio_pigment_od', '3') !!} +3 &nbsp; &nbsp; &nbsp;
                        {!! Form::radio('gonio_pigment_od', '4') !!} +4 &nbsp; &nbsp; &nbsp;
                      </div>
                      <div class="col-md-6 col-md-offset-1">
                        Anterior Pigment Line &nbsp; &nbsp; &nbsp;
                        {!! Form::radio('gonio_anterior_pigment_line_od', 'true') !!} Yes &nbsp; &nbsp; &nbsp;
                        {!! Form::radio('gonio_anterior_pigment_line_od', 'false') !!} No &nbsp; &nbsp; &nbsp;
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
                    {!! Form::checkbox('gonio_normal_os', 'true') !!} Normal
                  </div>
                  <div class="col-md-4">
                    <div class="section-divider mt20 mb40">
                      <span> Noncompressed </span>
                    </div>
                    <div class="row">
                      <div class="col-md-2 col-md-offset-2">
                        <div class="row">
                          {!! Form::radio('gonio_noncompressed_os_abcd', 'a') !!} A
                        </div>
                        <div class="row">
                          {!! Form::radio('gonio_noncompressed_os_abcd', 'b') !!} B
                        </div>
                        <div class="row">
                          {!! Form::radio('gonio_noncompressed_os_abcd', 'c') !!} C
                        </div>
                        <div class="row">
                          {!! Form::radio('gonio_noncompressed_os_abcd', 'd') !!} D
                        </div>
                      </div>
                      <div class="col-md-3 text-center">
                        0.0 to 1.0
                      </div>
                      <div class="col-md-2 text-right">
                        <div class="row">
                          {!! Form::radio('gonio_noncompressed_os_rsq', 'r') !!} R
                        </div>
                        <div class="row">
                          {!! Form::radio('gonio_noncompressed_os_rsq', 'r') !!} S
                        </div>
                        <div class="row">
                          {!! Form::radio('gonio_noncompressed_os_rsq', 'r') !!} Q
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
                          {!! Form::radio('gonio_compressed_os_abcd', 'a') !!} A
                        </div>
                        <div class="row">
                          {!! Form::radio('gonio_compressed_os_abcd', 'b') !!} B
                        </div>
                        <div class="row">
                          {!! Form::radio('gonio_compressed_os_abcd', 'c') !!} C
                        </div>
                        <div class="row">
                          {!! Form::radio('gonio_compressed_os_abcd', 'd') !!} D
                        </div>
                      </div>
                      <div class="col-md-3 text-center">
                        0.0 to 1.0
                      </div>
                      <div class="col-md-2 text-right">
                        <div class="row">
                          {!! Form::radio('gonio_compressed_os_rsq', 'r') !!} R
                        </div>
                        <div class="row">
                          {!! Form::radio('gonio_compressed_os_rsq', 'r') !!} S
                        </div>
                        <div class="row">
                          {!! Form::radio('gonio_compressed_os_rsq', 'r') !!} Q
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
                          {!! Form::radio('gonio_pigment_os', '1') !!} +1 &nbsp; &nbsp; &nbsp;
                          {!! Form::radio('gonio_pigment_os', '2') !!} +2 &nbsp; &nbsp; &nbsp;
                          {!! Form::radio('gonio_pigment_os', '3') !!} +3 &nbsp; &nbsp; &nbsp;
                          {!! Form::radio('gonio_pigment_os', '4') !!} +4 &nbsp; &nbsp; &nbsp;
                        </div>
                        <div class="col-md-6 col-md-offset-1">
                          Anterior Pigment Line &nbsp; &nbsp; &nbsp;
                          {!! Form::radio('gonio_anterior_pigment_line_os', 'true') !!} Yes &nbsp; &nbsp; &nbsp;
                          {!! Form::radio('gonio_anterior_pigment_line_os', 'false') !!} No &nbsp; &nbsp; &nbsp;
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
                {!! Form::checkbox('fundus_dialated', 'true') !!} Dialated?
              </div>
              <div class="row">
                <div class="col-md-2">
                  Dialation notes:
                </div>
                <div class="col-md-10">
                  {!! Form::text('fundus_dialation_notes', '', ['id' => 'fundus_dialation_notes']) !!}
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
                      {!! Form::checkbox('fundus_od_cd_abnormal', 'true') !!} Abnormal
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
                      {!! Form::checkbox('fundus_od_retina_abnormal', 'true') !!} Abnormal
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
                      {!! Form::checkbox('fundus_od_cd_abnormal', 'true') !!} Abnormal
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
                      {!! Form::checkbox('fundus_os_cd_abnormal', 'true') !!} Abnormal
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10 col-md-offset-1 text-center">
                      {!! Form::text('fundus_os_cd_notes', '', ['id' => 'fundus_os_cd_notes']) !!}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10 col-md-offset-1 text-center">
                      {!! Form::checkbox('fundus_os_retina_abnormal', 'true') !!} Abnormal
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10 col-md-offset-1 text-center">
                      {!! Form::text('fundus_os_retina_notes', '', ['id' => 'fundus_os_retina_notes']) !!}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10 col-md-offset-1 text-center">
                      {!! Form::checkbox('fundus_os_cd_abnormal', 'true') !!} Abnormal
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
      </div>

      {{-- Row 9: Assesment --}}
      <div class="row">
        <div class="col-md-12">
          <div class="panel heading-border">
            <div class="panel-body bg-light">
              <div class="section-divider mt20 mb40">
                <span> Assesment </span>
              </div>
              {!! Form::textarea('assesment', '', ['id' => 'assesment']) !!}
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
              {!! Form::textarea('plan', '', ['id' => 'plan']) !!}
            </div>
          </div>
        </div>
      </div>

      {{-- FORM: SUBMIT --}}
      <div class="row">
        <div class="col-md-12">
          <button type="submit" class="btn btn-block btn-lg btn-primary"> Submit Visit </button>
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

  <!-- jQuery Validate Plugin-->
  <script src="assets/admin-tools/admin-forms/js/jquery.validate.min.js"></script>

  <!-- jQuery Validate Addon -->
  <script src="assets/admin-tools/admin-forms/js/additional-methods.min.js"></script>

  <!-- Theme Javascript -->
  <script src="assets/js/utility/utility.js"></script>
  <script src="assets/js/main.js"></script>
@endsection
