<?php

namespace App\Http\Controllers\Dashboard;

use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Patient;
use App\Models\Visit;
use App\Models\DistanceVision;
use App\Models\Refraction;
use App\Models\Pupil;
use App\Models\GlassesRx;
use App\Models\AnteriorChamber;
use App\Models\Lense;
use App\Models\Iop;
use App\Models\Gonio;
use App\Models\FundusExam;


class VisitsController extends Controller
{

    // Go back function
    public function goBack(){

      $data['user'] = Auth::User();
      $data['num_unapproved_users'] = User::where(['approved' => 0])->count();

      return Redirect::back()->with($data);
    }

    // Detailed visit information
    public function visitDetailView($vid){

      // Check if user is logged in, if not send back to home
      if(!Auth::check()){
        return Redirect::to('/');
      }

      $data['user'] = Auth::User();
      $data['num_unapproved_users'] = User::where(['approved' => 0])->count();

      $data['visit'] = Visit::where('id', '=', $vid)->first();

      $data['patient'] = Patient::where('id', '=', $data['visit']->pid)->first();
      $data['dv'] = DistanceVision::where('vid', '=', $vid)->first();
      $data['refrac'] = Refraction::where('vid', '=', $vid)->first();
      $data['pupil'] = Pupil::where('vid', '=', $vid)->first();
      $data['GlassesRx'] = GlassesRx::where('vid', '=', $vid)->first();
      $data['ant_chamber'] = AnteriorChamber::where('vid', '=', $vid)->first();
      $data['lense'] = Lense::where('vid', '=', $vid)->first();
      $data['iop'] = Iop::where('vid', '=', $vid)->first();
      $data['gonio'] = Gonio::where('vid', '=', $vid)->first();
      $data['fundus'] = FundusExam::where('vid', '=', $vid)->first();

      return view('dashboard/previous_patient_visit', $data);
    }

    // Show the dashboard Home
    public function showVisits(){
      // Logic will need to be added to pass $data and authenticate user

      // Check if user is logged in, if not send back to home
      if(!Auth::check()){
        return Redirect::to('/');
      }

      $data['user'] = Auth::User();
      $data['visits'] = Visit::all();
      $data['num_visits'] = Visit::all()->count();
      $data['num_unapproved_users'] = User::where(['approved' => 0])->count();

      return view('dashboard/visits')->with($data);
    }

    // Show form to add a new visit
    public function addVisit() {
      // Get user to pass to master template in view
      $data['user'] = Auth::User();

      $data['num_unapproved_users'] = User::where(['approved' => 0])->count();

      // Collect all patients from the database for user to choose from
      $patients = array();
      $sql_patients = Patient::all()->sortBy('last_name');
      foreach ($sql_patients as $patient) {
        if($patient['first_name'] == "" && $patient['last_name'] == "") {
          $patients[$patient['id']] = $patient['id'] . ' || UNIDENTIFIED PATIENT ';
          continue;
        }
        $patients[$patient['id']] = $patient['id'] . ' || ' . $patient['last_name'] . ', ' . $patient['first_name'] . ' ' . $patient['middle'];
      }
      $data['patients'] = $patients;


      return view('dashboard/new_visit', $data);
    }

    // Insert visit into DB
    public function insertVisit() {
      // Logic will need to be added to pass $data and authenticate user

      // Check if user is logged in, if not send back to home
      if(!Auth::check()){
        return Redirect::to('/');
      }

      /*
      **  Collect variables from form
      */
      // Patient Demographics

      // Check if new patient wants to remain anon
      if(Input::get('patient_anon') == 1 && Input::get('new_patient') == 1) {
        $new_patient = Patient::create([
          'unidentified_patient' => 1
        ]);
        $patient_id = $new_patient->id;
      } elseif (Input::get('patient_anon') == 0 && Input::get('new_patient') == 1) {
        $firstname = Input::get('demo_firstname');
        $lastname = Input::get('demo_lastname');

        // Insert patient and get patient ID back
        $new_patient = Patient::create([
          'unidentified_patient' => 0,
          'first_name' => $firstname,
          'last_name' => $lastname
        ]);
        $patient_id = $new_patient->id;
      } elseif (Input::get('new_patient') == 0){
        // Take value from select list and grab patient id
        $patient_id = (int)Input::get('patient');
      }

      $chief_complaint = Input::get('chief_complaint');
      $assessment = Input::get('assessment');
      $plan = Input::get('plan');

      // Distance visions
      $dvodsc = Input::get('dv_right');
      $dvossc = Input::get('dv_left');
      $dvodcc = Input::get('dv_glasses_right');
      $dvoscc = Input::get('dv_glasses_left');

      // Glasses RX
      $rx_od_sphere = Input::get('rx_od_sphere');
      $rx_od_cylinder = Input::get('rx_od_cylinder');
      $rx_od_axis = Input::get('rx_od_axis');
      $rx_od_add = Input::get('rx_od_add');
      $rx_os_sphere = Input::get('rx_os_sphere');
      $rx_os_cylinder = Input::get('rx_os_cylinder');
      $rx_os_axis = Input::get('rx_os_axis');
      $rx_os_add = Input::get('rx_os_add');
      $rx_notes = Input::get('rx_notes');

      // Refraction
      if(Input::get('refraction_type') == "manifest_refraction"){
        $isManifest = 1;
      } else {
        $isManifest = 0;
      }
      $refrac_od_sc_sphere = Input::get('refraction_sc_od_sphere');
      $refrac_od_sc_cylinder = Input::get('refraction_sc_od_cylinder');
      $refrac_od_sc_axis = Input::get('refraction_sc_od_axis');
      $refrac_od_cc_sphere = Input::get('refraction_cc_od_cylinder');
      $refrac_od_cc_cylinder = Input::get('refraction_cc_od_cylinder');
      $refrac_od_cc_axis = Input::get('refraction_cc_od_axis');

      $refrac_os_sc_sphere = Input::get('refraction_sc_od_sphere');
      $refrac_os_sc_cylinder = Input::get('refraction_sc_os_cylinder');
      $refrac_os_sc_axis = Input::get('refraction_sc_os_axis');
      $refrac_os_cc_sphere = Input::get('refraction_cc_os_sphere');
      $refrac_os_cc_cylinder = Input::get('refraction_cc_os_cylinder');
      $refrac_os_cc_axis = Input::get('refraction_cc_os_axis');

      // Slit lamp examp
      // Both Pupils
      $isBothPupilsNormal = Input::get('sle_pupil_both_normal');
      $bothPupilsShape = Input::get('sle_pupil_both_shape');
      $bothPupilsDiameter = Input::get('sle_pupil_both_diameter');
      $bothPupilsRapd = Input::get('sle_pupil_both_rapd');
      $bothPupilsSynechia = Input::get('sle_pupil_both_synechia');
      // Right Pupil
      $isRightPupilNormal = Input::get('sle_pupil_right_normal');
      $rightPupilShape = Input::get('sle_pupil_right_shape');
      $rightPupilDiameter = Input::get('sle_pupil_right_diameter');
      $rightPupilRapd = Input::get('sle_pupil_right_rapd');
      $rightPupilSynechia = Input::get('sle_pupil_right_synechia');
      // Left Pupil
      $isLeftPupilNormal = Input::get('sle_pupil_left_normal');
      $leftPupilShape = Input::get('sle_pupil_left_shape');
      $leftPupilDiameter = Input::get('sle_pupil_left_diameter');
      $leftPupilRapd = Input::get('sle_pupil_left_rapd');
      $leftPupilSynechia = Input::get('sle_pupil_left_synechia');
      // Anterior Chamber
      $isACODNormal = Input::get('sle_anterior_chamber_od_normal');
      $isACOSNormal = Input::get('sle_anterior_chamber_os_normal');
      $ACDepthOD = Input::get('sle_anterior_chamber_od_depth');
      $ACDepthOS = Input::get('sle_anterior_chamber_os_depth');
      $ACAngleOD = Input::get('sle_anterior_chamber_od_angle');
      $ACAngleOS = Input::get('sle_anterior_chamber_os_angle');
      $PASOD = Input::get('sle_anterior_chamber_od_pas');
      $PASOS = Input::get('sle_anterior_chamber_os_pas');
      $ACODKP = Input::get('sle_anterior_chamber_od_kp');
      $ACOSKP = Input::get('sle_anterior_chamber_os_kp');
      $isShuntOD = Input::get('sle_anterior_chamber_od_shunt');
      $isScarringOD = Input::get('sle_anterior_chamber_od_scarring');
      $isTraumaOD = Input::get('sle_anterior_chamber_od_trauma');
      $isBlebOD = Input::get('sle_anterior_chamber_od_bleb');
      $isShuntOS = Input::get('sle_anterior_chamber_os_shunt');
      $isScarringOS = Input::get('sle_anterior_chamber_os_scarring');
      $isTraumaOS = Input::get('sle_anterior_chamber_os_trauma');
      $isBlebOS = Input::get('sle_anterior_chamber_os_bleb');
      $isVascularOD = Input::get('sle_anterior_chamber_od_bleb_type');
      $BlebOD_Num = Input::get('sle_anterior_chamber_od_bleb_level');
      $isVascularOS = Input::get('sle_anterior_chamber_os_bleb_type');
      $BlebOS_Num = Input::get('sle_anterior_chamber_os_bleb_level');
      $isKSpindleOD = Input::get('sle_anterior_chamber_od_bleb_k_spindle');
      $isKSpindleOS = Input::get('sle_anterior_chamber_os_bleb_k_spindle');

      // Lenses
      $NS_OD = Input::get('sle_lens_od_ns_type');
      $NS_OD_Notes = Input::get('sle_lens_od_ns_notes');
      $NS_OS = Input::get('sle_lens_os_ns_type');
      $NS_OS_Notes = Input::get('sle_lens_os_ns_notes');
      $isStableLensOD = Input::get('sle_lens_od_stable');
      $isStableLensOS = Input::get('sle_lens_os_stable');
      $isPseudophakia_OD = Input::get('sle_lens_od_pseudohakia');
      $isPseudophakia_OS = Input::get('sle_lens_os_pseudohakia');
      $isPCO_OD = Input::get('sle_lens_od_pco');
      $isPCO_OS = Input::get('sle_lens_os_pco');
      $Cortical_OD = Input::get('sle_lens_od_cortical_type');
      $Cortical_OD_Notes = Input::get('sle_lens_od_cortical_notes');
      $Cortical_OS = Input::get('sle_lens_os_cortical_type');
      $Cortical_OS_Notes = Input::get('sle_lens_os_cortical_notes');
      $PSC_OD = Input::get('sle_lens_od_psc_type');
      $PSC_OD_Notes = Input::get('sle_lens_od_psc_notes');
      $PSC_OS = Input::get('sle_lens_os_psc_type');
      $PSC_OS_Notes = Input::get('sle_lens_os_psc_notes');

      // IOPS
      $ODValue = Input::get('intra_od_value');
      $ODType = Input::get('intra_od_type');
      $ODNotes = Input::get('intra_od_notes');
      $OSValue = Input::get('intra_os_value');
      $OSType = Input::get('intra_os_type');
      $OSNotes = Input::get('intra_os_notes');

      // Gonio
      $isHxFHA = Input::get('hx_front_headache');
      $FHASide = Input::get('hx_front_headache_side');
      $isODNormal = Input::get('gonio_normal_od');
      $odABCDNon = Input::get('gonio_noncompressed_od_abcd');
      $odABCDComp = Input::get('gonio_compressed_od_abcd');
      $odDegreeNon = Input::get('gonio_od_cd_noncompressed');
      $odDegreeComp = Input::get('gonio_od_cd_compressed');
      $odRSQNon = Input::get('gonio_noncompressed_od_rsq');
      $odRSQComp = Input::get('gonio_compressed_od_rsq');
      $odPigment = Input::get('gonio_pigment_od');
      $isODAntPigLine = Input::get('gonio_anterior_pigment_line_od');
      $isOSNormal = Input::get('gonio_normal_os');
      $osABCDNon = Input::get('gonio_noncompressed_os_abcd');
      $osABCDComp = Input::get('gonio_compressed_os_abcd');
      $osDegreeNon = Input::get('gonio_os_cd_noncompressed');
      $osDegreeComp = Input::get('gonio_os_cd_compressed');
      $osRSQNon = Input::get('gonio_noncompressed_os_rsq');
      $osRSQComp = Input::get('gonio_compressed_os_rsq');
      $osPigment = Input::get('gonio_pigment_os');
      $isOSAntPigLine = Input::get('gonio_anterior_pigment_line_os');

      // Fundus exam
      $isDialated = Input::get('fundus_dialated');
      $dialNotes = Input::get('fundus_dialation_notes');
      $isCDODAb = Input::get('fundus_od_cd_abnormal');
      $CDOD = Input::get('fundus_od_cd_count');
      $CDODNotes = Input::get('fundus_od_cd_notes');
      $isCDOSAb = Input::get('fundus_os_cd_abnormal');
      $CDOS = Input::get('fundus_os_cd_count');
      $CDOSNotes = Input::get('fundus_os_cd_notes');
      $isRetinaODAb = Input::get('fundus_od_retina_abnormal');
      $RetinaODNotes = Input::get('fundus_od_retina_notes');
      $isRetinaOSAb = Input::get('fundus_os_retina_abnormal');
      $RetinaOSNotes = Input::get('fundus_os_retina_notes');
      $isMaculaODAb = Input::get('fundus_od_macula_abnormal');
      $MaculaODNotes = Input::get('fundus_od_macula_notes');
      $isMaculaOSAb = Input::get('fundus_os_macula_abnormal');
      $MaculaOSNotes = Input::get('fundus_os_macula_notes');




      /*
      **  Create visit objects
      */
      $new_visit = Visit::create([
        'pid' => $patient_id,
        'chiefComplaint' => $chief_complaint,
        'assessment' => $assessment,
        'plan' => $plan
      ]);

      $new_distance_vision = DistanceVision::create([
        'DVODSC' => $dvodsc,
        'DVOSSC' => $dvossc,
        'DVODCC' => $dvodcc,
        'DVOSCC' => $dvoscc,
        'vid' => $new_visit->id
      ]);

      $new_glasses_rx = GlassesRx::create([
        'OD_Sphere' => $rx_od_sphere,
        'OD_Cyl' => $rx_od_cylinder,
        'OD_Axis' => $rx_od_axis,
        'OD_Add' => $rx_od_add,
        'OS_Sphere' => $rx_os_sphere,
        'OS_Cyl' => $rx_os_cylinder,
        'OS_Axis' => $rx_os_axis,
        'OS_Add' => $rx_os_add,
        'GlassesRxNotes' => $rx_notes,
        'vid' => $new_visit->id
      ]);

      $new_refraction = Refraction::create([
        'isManifest' => $isManifest,
        'SC_OD_Sphere' => $refrac_od_sc_sphere,
        'SC_OD_Cyl' => $refrac_od_sc_cylinder,
        'SC_OD_Axis' => $refrac_od_sc_axis,
        'SC_OS_Sphere' => $refrac_os_sc_sphere,
        'SC_OS_Cyl' => $refrac_os_sc_cylinder,
        'SC_OS_Axis' => $refrac_os_sc_axis,
        'CC_OD_Sphere' => $refrac_od_cc_sphere,
        'CC_OD_Cyl' => $refrac_od_cc_cylinder,
        'CC_OD_Axis' => $refrac_od_cc_axis,
        'CC_OS_Sphere' => $refrac_os_cc_sphere,
        'CC_OS_Cyl' => $refrac_os_cc_cylinder,
        'CC_OS_Axis' => $refrac_os_cc_axis,
        'vid' => $new_visit->id
      ]);

      $new_pupil = Pupil::create([
        'isBothPupilsNormal' => $isBothPupilsNormal,
        'bothShape' => $bothPupilsShape,
        'bothDiameter' => $bothPupilsDiameter,
        'isBothRAPD' => $bothPupilsRapd,
        'isBothSynechia' => $bothPupilsSynechia,
        'isRightPupilNormal' => $isRightPupilNormal,
        'rightShape' => $rightPupilShape,
        'rightDiameter' => $rightPupilDiameter,
        'isRightRAPD' => $rightPupilRapd,
        'isRightSynechia' => $rightPupilSynechia,
        'isLeftPupilNormal' => $isLeftPupilNormal,
        'leftShape' => $leftPupilShape,
        'leftDiameter' => $leftPupilDiameter,
        'isLeftRAPD' => $leftPupilRapd,
        'isLeftSynechia' => $leftPupilSynechia,
        'vid' => $new_visit->id
      ]);

      $new_anterior_chamber = AnteriorChamber::create([
        'isACODNormal' => $isACODNormal,
        'isACOSNormal' => $isACOSNormal,
        'ACDepthOD' => $ACDepthOD,
        'ACDepthOS' => $ACDepthOS,
        'ACAngleOD' => $ACAngleOD,
        'ACAngleOS' => $ACAngleOS,
        'PASOS' => $PASOS,
        'PASOD' => $PASOD,
        'ACODKP' => $ACODKP,
        'ACOSKP' => $ACOSKP,
        'isShuntOD' => $isShuntOD,
        'isScarringOD' => $isScarringOD,
        'isTraumaOD' => $isTraumaOD,
        'isBlebOD' => $isBlebOD,
        'isShuntOS' => $isShuntOS,
        'isScarringOS' => $isScarringOS,
        'isTraumaOS' => $isTraumaOS,
        'isBlebOS' => $isBlebOS,
        'isVascularOD' => $isVascularOD,
        'BlebOD_Num' => $BlebOD_Num,
        'isVascularOS' => $isVascularOS,
        'BlebOS_Num' => $BlebOS_Num,
        'isKSpindleOD' => $isKSpindleOD,
        'isKSpindleOS' => $isKSpindleOS,
        'vid' => $new_visit->id
      ]);

      $new_lense = Lense::create([
        'NS_OD' => $NS_OD,
        'NS_OD_Notes' => $NS_OD_Notes,
        'NS_OS' => $NS_OS,
        'NS_OS_Notes' => $NS_OS_Notes,
        'isStableLensOS' => $isStableLensOS,
        'isStableLensOD' => $isStableLensOD,
        'isPseudophakia_OS' => $isPseudophakia_OS,
        'isPseudophakia_OD' => $isPseudophakia_OD,
        'isPCO_OD' => $isPCO_OD,
        'isPCO_OS' => $isPCO_OS,
        'Coritcal_OS' => $Cortical_OS,
        'Cortical_OS_Notes' => $Cortical_OS_Notes,
        'Coritcal_OD' => $Cortical_OD,
        'Cortical_OD_Notes' => $Cortical_OD_Notes,
        'PSC_OD' => $PSC_OD,
        'PSC_OD_Notes' => $PSC_OD_Notes,
        'PSC_OS' => $PSC_OS,
        'PSC_OS_Notes' => $PSC_OS_Notes,
        'vid' => $new_visit->id
      ]);

      $new_iop = Iop::create([
        'ODValue' => $ODValue,
        'ODType' => $ODType,
        'ODNotes' => $ODNotes,
        'OSValue' => $OSValue,
        'OSType' => $OSType,
        'OSNotes' => $OSNotes,
        'vid' => $new_visit->id
      ]);

      $new_gonio = Gonio::create([
        'isHxFHA' => $isHxFHA,
        'FHASide' => $FHASide,
        'isODNormal' => $isODNormal,
        'odABCDNon' => $odABCDNon,
        'odABCDComp' => $odABCDComp,
        'odDegreeNon' => $odDegreeNon,
        'odDegreeComp' => $odDegreeComp,
        'odRSQNon' => $odRSQNon,
        'odRSQComp' => $odRSQComp,
        'odPigment' => $odPigment,
        'isODAntPigLine' => $isODAntPigLine,
        'isOSNormal' => $isOSNormal,
        'osABCDNon' => $osABCDNon,
        'osABCDComp' => $osABCDComp,
        'osDegreeNon' => $osDegreeNon,
        'osDegreeComp' => $osDegreeComp,
        'osRSQNon' => $osRSQNon,
        'osRSQComp' => $osRSQComp,
        'osPigment' => $osPigment,
        'isOSAntPigLine' => $isOSAntPigLine,
        'vid' => $new_visit->id
      ]);

      $new_fundus_exam = FundusExam::create([
        'isDialated' => $isDialated,
        'dialNotes' => $dialNotes,
        'isCDODAb' => $isCDODAb,
        'CDOD' => $CDOD,
        'CDODNotes' => $CDODNotes,
        'isCDOSAb' => $isCDOSAb,
        'CDOS' => $CDOS,
        'CDOSNotes' => $CDOSNotes,
        'isRetinaODAb' => $isRetinaODAb,
        'RetinaODNotes' => $RetinaODNotes,
        'isRetinaOSAb' => $isRetinaOSAb,
        'RetinaOSNotes' => $RetinaOSNotes,
        'isMaculaODAb' => $isMaculaODAb,
        'MaculaODNotes' => $MaculaODNotes,
        'isMaculaOSAb' => $isMaculaOSAb,
        'MaculaOSNotes' => $MaculaOSNotes,
        'vid' => $new_visit->id
      ]);

      return Redirect::to('/patient/'.$patient_id);

    }

    public function addPatientVisit($pid){
      // Get user to pass to master template in view
      $data['user'] = Auth::User();

      $data['num_unapproved_users'] = User::where(['approved' => 0])->count();

      $data['patient'] = Patient::where('id', '=', $pid)->first();

      // Collect all patients from the database for user to choose from
      $patients = array();
      $sql_patients = Patient::all()->sortBy('last_name');
      foreach ($sql_patients as $patient) {
        if($patient['first_name'] == "" && $patient['last_name'] == "") {
          $patients[$patient['id']] = $patient['id'] . ' || UNIDENTIFIED PATIENT ';
          continue;
        }
        $patients[$patient['id']] = $patient['id'] . ' || ' . $patient['last_name'] . ', ' . $patient['first_name'] . ' ' . $patient['middle'];
      }
      $data['patients'] = $patients;


      return view('dashboard/new_patient_visit', $data);
    }

    public function insertPatientVisit() {
      // Logic will need to be added to pass $data and authenticate user

      // Check if user is logged in, if not send back to home
      if(!Auth::check()){
        return Redirect::to('/');
      }

      /*
      **  Collect variables from form
      */
      // Patient Demographics

      // Take value from select list and grab patient id
      $patient_id = (int)Input::get('patient');

      $chief_complaint = Input::get('chief_complaint');
      $assessment = Input::get('assessment');
      $plan = Input::get('plan');

      // Distance visions
      $dvodsc = Input::get('dv_right');
      $dvossc = Input::get('dv_left');
      $dvodcc = Input::get('dv_glasses_right');
      $dvoscc = Input::get('dv_glasses_left');

      // Glasses RX
      $rx_od_sphere = Input::get('rx_od_sphere');
      $rx_od_cylinder = Input::get('rx_od_cylinder');
      $rx_od_axis = Input::get('rx_od_axis');
      $rx_od_add = Input::get('rx_od_add');
      $rx_os_sphere = Input::get('rx_os_sphere');
      $rx_os_cylinder = Input::get('rx_os_cylinder');
      $rx_os_axis = Input::get('rx_os_axis');
      $rx_os_add = Input::get('rx_os_add');
      $rx_notes = Input::get('rx_notes');

      // Refraction
      if(Input::get('refraction_type') == "manifest_refraction"){
        $isManifest = 1;
      } else {
        $isManifest = 0;
      }
      $refrac_od_sc_sphere = Input::get('refraction_sc_od_sphere');
      $refrac_od_sc_cylinder = Input::get('refraction_sc_od_cylinder');
      $refrac_od_sc_axis = Input::get('refraction_sc_od_axis');
      $refrac_od_cc_sphere = Input::get('refraction_cc_od_cylinder');
      $refrac_od_cc_cylinder = Input::get('refraction_cc_od_cylinder');
      $refrac_od_cc_axis = Input::get('refraction_cc_od_axis');

      $refrac_os_sc_sphere = Input::get('refraction_sc_od_sphere');
      $refrac_os_sc_cylinder = Input::get('refraction_sc_os_cylinder');
      $refrac_os_sc_axis = Input::get('refraction_sc_os_axis');
      $refrac_os_cc_sphere = Input::get('refraction_cc_os_sphere');
      $refrac_os_cc_cylinder = Input::get('refraction_cc_os_cylinder');
      $refrac_os_cc_axis = Input::get('refraction_cc_os_axis');

      // Slit lamp examp
      // Both Pupils
      $isBothPupilsNormal = Input::get('sle_pupil_both_normal');
      $bothPupilsShape = Input::get('sle_pupil_both_shape');
      $bothPupilsDiameter = Input::get('sle_pupil_both_diameter');
      $bothPupilsRapd = Input::get('sle_pupil_both_rapd');
      $bothPupilsSynechia = Input::get('sle_pupil_both_synechia');
      // Right Pupil
      $isRightPupilNormal = Input::get('sle_pupil_right_normal');
      $rightPupilShape = Input::get('sle_pupil_right_shape');
      $rightPupilDiameter = Input::get('sle_pupil_right_diameter');
      $rightPupilRapd = Input::get('sle_pupil_right_rapd');
      $rightPupilSynechia = Input::get('sle_pupil_right_synechia');
      // Left Pupil
      $isLeftPupilNormal = Input::get('sle_pupil_left_normal');
      $leftPupilShape = Input::get('sle_pupil_left_shape');
      $leftPupilDiameter = Input::get('sle_pupil_left_diameter');
      $leftPupilRapd = Input::get('sle_pupil_left_rapd');
      $leftPupilSynechia = Input::get('sle_pupil_left_synechia');
      // Anterior Chamber
      $isACODNormal = Input::get('sle_anterior_chamber_od_normal');
      $isACOSNormal = Input::get('sle_anterior_chamber_os_normal');
      $ACDepthOD = Input::get('sle_anterior_chamber_od_depth');
      $ACDepthOS = Input::get('sle_anterior_chamber_os_depth');
      $ACAngleOD = Input::get('sle_anterior_chamber_od_angle');
      $ACAngleOS = Input::get('sle_anterior_chamber_os_angle');
      $PASOD = Input::get('sle_anterior_chamber_od_pas');
      $PASOS = Input::get('sle_anterior_chamber_os_pas');
      $ACODKP = Input::get('sle_anterior_chamber_od_kp');
      $ACOSKP = Input::get('sle_anterior_chamber_os_kp');
      $isShuntOD = Input::get('sle_anterior_chamber_od_shunt');
      $isScarringOD = Input::get('sle_anterior_chamber_od_scarring');
      $isTraumaOD = Input::get('sle_anterior_chamber_od_trauma');
      $isBlebOD = Input::get('sle_anterior_chamber_od_bleb');
      $isShuntOS = Input::get('sle_anterior_chamber_os_shunt');
      $isScarringOS = Input::get('sle_anterior_chamber_os_scarring');
      $isTraumaOS = Input::get('sle_anterior_chamber_os_trauma');
      $isBlebOS = Input::get('sle_anterior_chamber_os_bleb');
      $isVascularOD = Input::get('sle_anterior_chamber_od_bleb_type');
      $BlebOD_Num = Input::get('sle_anterior_chamber_od_bleb_level');
      $isVascularOS = Input::get('sle_anterior_chamber_os_bleb_type');
      $BlebOS_Num = Input::get('sle_anterior_chamber_os_bleb_level');
      $isKSpindleOD = Input::get('sle_anterior_chamber_od_bleb_k_spindle');
      $isKSpindleOS = Input::get('sle_anterior_chamber_os_bleb_k_spindle');

      // Lenses
      $NS_OD = Input::get('sle_lens_od_ns_type');
      $NS_OD_Notes = Input::get('sle_lens_od_ns_notes');
      $NS_OS = Input::get('sle_lens_os_ns_type');
      $NS_OS_Notes = Input::get('sle_lens_os_ns_notes');
      $isStableLensOD = Input::get('sle_lens_od_stable');
      $isStableLensOS = Input::get('sle_lens_os_stable');
      $isPseudophakia_OD = Input::get('sle_lens_od_pseudohakia');
      $isPseudophakia_OS = Input::get('sle_lens_os_pseudohakia');
      $isPCO_OD = Input::get('sle_lens_od_pco');
      $isPCO_OS = Input::get('sle_lens_os_pco');
      $Cortical_OD = Input::get('sle_lens_od_cortical_type');
      $Cortical_OD_Notes = Input::get('sle_lens_od_cortical_notes');
      $Cortical_OS = Input::get('sle_lens_os_cortical_type');
      $Cortical_OS_Notes = Input::get('sle_lens_os_cortical_notes');
      $PSC_OD = Input::get('sle_lens_od_psc_type');
      $PSC_OD_Notes = Input::get('sle_lens_od_psc_notes');
      $PSC_OS = Input::get('sle_lens_os_psc_type');
      $PSC_OS_Notes = Input::get('sle_lens_os_psc_notes');

      // IOPS
      $ODValue = Input::get('intra_od_value');
      $ODType = Input::get('intra_od_type');
      $ODNotes = Input::get('intra_od_notes');
      $OSValue = Input::get('intra_os_value');
      $OSType = Input::get('intra_os_type');
      $OSNotes = Input::get('intra_os_notes');

      // Gonio
      $isHxFHA = Input::get('hx_front_headache');
      $FHASide = Input::get('hx_front_headache_side');
      $isODNormal = Input::get('gonio_normal_od');
      $odABCDNon = Input::get('gonio_noncompressed_od_abcd');
      $odABCDComp = Input::get('gonio_compressed_od_abcd');
      $odDegreeNon = Input::get('gonio_od_cd_noncompressed');
      $odDegreeComp = Input::get('gonio_od_cd_compressed');
      $odRSQNon = Input::get('gonio_noncompressed_od_rsq');
      $odRSQComp = Input::get('gonio_compressed_od_rsq');
      $odPigment = Input::get('gonio_pigment_od');
      $isODAntPigLine = Input::get('gonio_anterior_pigment_line_od');
      $isOSNormal = Input::get('gonio_normal_os');
      $osABCDNon = Input::get('gonio_noncompressed_os_abcd');
      $osABCDComp = Input::get('gonio_compressed_os_abcd');
      $osDegreeNon = Input::get('gonio_os_cd_noncompressed');
      $osDegreeComp = Input::get('gonio_os_cd_compressed');
      $osRSQNon = Input::get('gonio_noncompressed_os_rsq');
      $osRSQComp = Input::get('gonio_compressed_os_rsq');
      $osPigment = Input::get('gonio_pigment_os');
      $isOSAntPigLine = Input::get('gonio_anterior_pigment_line_os');

      // Fundus exam
      $isDialated = Input::get('fundus_dialated');
      $dialNotes = Input::get('fundus_dialation_notes');
      $isCDODAb = Input::get('fundus_od_cd_abnormal');
      $CDOD = Input::get('fundus_od_cd_count');
      $CDODNotes = Input::get('fundus_od_cd_notes');
      $isCDOSAb = Input::get('fundus_os_cd_abnormal');
      $CDOS = Input::get('fundus_os_cd_count');
      $CDOSNotes = Input::get('fundus_os_cd_notes');
      $isRetinaODAb = Input::get('fundus_od_retina_abnormal');
      $RetinaODNotes = Input::get('fundus_od_retina_notes');
      $isRetinaOSAb = Input::get('fundus_os_retina_abnormal');
      $RetinaOSNotes = Input::get('fundus_os_retina_notes');
      $isMaculaODAb = Input::get('fundus_od_macula_abnormal');
      $MaculaODNotes = Input::get('fundus_od_macula_notes');
      $isMaculaOSAb = Input::get('fundus_os_macula_abnormal');
      $MaculaOSNotes = Input::get('fundus_os_macula_notes');




      /*
      **  Create visit objects
      */
      $new_visit = Visit::create([
        'pid' => $patient_id,
        'chiefComplaint' => $chief_complaint,
        'assessment' => $assessment,
        'plan' => $plan
      ]);

      $new_distance_vision = DistanceVision::create([
        'DVODSC' => $dvodsc,
        'DVOSSC' => $dvossc,
        'DVODCC' => $dvodcc,
        'DVOSCC' => $dvoscc,
        'vid' => $new_visit->id
      ]);

      $new_glasses_rx = GlassesRx::create([
        'OD_Sphere' => $rx_od_sphere,
        'OD_Cyl' => $rx_od_cylinder,
        'OD_Axis' => $rx_od_axis,
        'OD_Add' => $rx_od_add,
        'OS_Sphere' => $rx_os_sphere,
        'OS_Cyl' => $rx_os_cylinder,
        'OS_Axis' => $rx_os_axis,
        'OS_Add' => $rx_os_add,
        'GlassesRxNotes' => $rx_notes,
        'vid' => $new_visit->id
      ]);

      $new_refraction = Refraction::create([
        'isManifest' => $isManifest,
        'SC_OD_Sphere' => $refrac_od_sc_sphere,
        'SC_OD_Cyl' => $refrac_od_sc_cylinder,
        'SC_OD_Axis' => $refrac_od_sc_axis,
        'SC_OS_Sphere' => $refrac_os_sc_sphere,
        'SC_OS_Cyl' => $refrac_os_sc_cylinder,
        'SC_OS_Axis' => $refrac_os_sc_axis,
        'CC_OD_Sphere' => $refrac_od_cc_sphere,
        'CC_OD_Cyl' => $refrac_od_cc_cylinder,
        'CC_OD_Axis' => $refrac_od_cc_axis,
        'CC_OS_Sphere' => $refrac_os_cc_sphere,
        'CC_OS_Cyl' => $refrac_os_cc_cylinder,
        'CC_OS_Axis' => $refrac_os_cc_axis,
        'vid' => $new_visit->id
      ]);

      $new_pupil = Pupil::create([
        'isBothPupilsNormal' => $isBothPupilsNormal,
        'bothShape' => $bothPupilsShape,
        'bothDiameter' => $bothPupilsDiameter,
        'isBothRAPD' => $bothPupilsRapd,
        'isBothSynechia' => $bothPupilsSynechia,
        'isRightPupilNormal' => $isRightPupilNormal,
        'rightShape' => $rightPupilShape,
        'rightDiameter' => $rightPupilDiameter,
        'isRightRAPD' => $rightPupilRapd,
        'isRightSynechia' => $rightPupilSynechia,
        'isLeftPupilNormal' => $isLeftPupilNormal,
        'leftShape' => $leftPupilShape,
        'leftDiameter' => $leftPupilDiameter,
        'isLeftRAPD' => $leftPupilRapd,
        'isLeftSynechia' => $leftPupilSynechia,
        'vid' => $new_visit->id
      ]);

      $new_anterior_chamber = AnteriorChamber::create([
        'isACODNormal' => $isACODNormal,
        'isACOSNormal' => $isACOSNormal,
        'ACDepthOD' => $ACDepthOD,
        'ACDepthOS' => $ACDepthOS,
        'ACAngleOD' => $ACAngleOD,
        'ACAngleOS' => $ACAngleOS,
        'PASOS' => $PASOS,
        'PASOD' => $PASOD,
        'ACODKP' => $ACODKP,
        'ACOSKP' => $ACOSKP,
        'isShuntOD' => $isShuntOD,
        'isScarringOD' => $isScarringOD,
        'isTraumaOD' => $isTraumaOD,
        'isBlebOD' => $isBlebOD,
        'isShuntOS' => $isShuntOS,
        'isScarringOS' => $isScarringOS,
        'isTraumaOS' => $isTraumaOS,
        'isBlebOS' => $isBlebOS,
        'isVascularOD' => $isVascularOD,
        'BlebOD_Num' => $BlebOD_Num,
        'isVascularOS' => $isVascularOS,
        'BlebOS_Num' => $BlebOS_Num,
        'isKSpindleOD' => $isKSpindleOD,
        'isKSpindleOS' => $isKSpindleOS,
        'vid' => $new_visit->id
      ]);

      $new_lense = Lense::create([
        'NS_OD' => $NS_OD,
        'NS_OD_Notes' => $NS_OD_Notes,
        'NS_OS' => $NS_OS,
        'NS_OS_Notes' => $NS_OS_Notes,
        'isStableLensOS' => $isStableLensOS,
        'isStableLensOD' => $isStableLensOD,
        'isPseudophakia_OS' => $isPseudophakia_OS,
        'isPseudophakia_OD' => $isPseudophakia_OD,
        'isPCO_OD' => $isPCO_OD,
        'isPCO_OS' => $isPCO_OS,
        'Coritcal_OS' => $Cortical_OS,
        'Cortical_OS_Notes' => $Cortical_OS_Notes,
        'Coritcal_OD' => $Cortical_OD,
        'Cortical_OD_Notes' => $Cortical_OD_Notes,
        'PSC_OD' => $PSC_OD,
        'PSC_OD_Notes' => $PSC_OD_Notes,
        'PSC_OS' => $PSC_OS,
        'PSC_OS_Notes' => $PSC_OS_Notes,
        'vid' => $new_visit->id
      ]);

      $new_iop = Iop::create([
        'ODValue' => $ODValue,
        'ODType' => $ODType,
        'ODNotes' => $ODNotes,
        'OSValue' => $OSValue,
        'OSType' => $OSType,
        'OSNotes' => $OSNotes,
        'vid' => $new_visit->id
      ]);

      $new_gonio = Gonio::create([
        'isHxFHA' => $isHxFHA,
        'FHASide' => $FHASide,
        'isODNormal' => $isODNormal,
        'odABCDNon' => $odABCDNon,
        'odABCDComp' => $odABCDComp,
        'odDegreeNon' => $odDegreeNon,
        'odDegreeComp' => $odDegreeComp,
        'odRSQNon' => $odRSQNon,
        'odRSQComp' => $odRSQComp,
        'odPigment' => $odPigment,
        'isODAntPigLine' => $isODAntPigLine,
        'isOSNormal' => $isOSNormal,
        'osABCDNon' => $osABCDNon,
        'osABCDComp' => $osABCDComp,
        'osDegreeNon' => $osDegreeNon,
        'osDegreeComp' => $osDegreeComp,
        'osRSQNon' => $osRSQNon,
        'osRSQComp' => $osRSQComp,
        'osPigment' => $osPigment,
        'isOSAntPigLine' => $isOSAntPigLine,
        'vid' => $new_visit->id
      ]);

      $new_fundus_exam = FundusExam::create([
        'isDialated' => $isDialated,
        'dialNotes' => $dialNotes,
        'isCDODAb' => $isCDODAb,
        'CDOD' => $CDOD,
        'CDODNotes' => $CDODNotes,
        'isCDOSAb' => $isCDOSAb,
        'CDOS' => $CDOS,
        'CDOSNotes' => $CDOSNotes,
        'isRetinaODAb' => $isRetinaODAb,
        'RetinaODNotes' => $RetinaODNotes,
        'isRetinaOSAb' => $isRetinaOSAb,
        'RetinaOSNotes' => $RetinaOSNotes,
        'isMaculaODAb' => $isMaculaODAb,
        'MaculaODNotes' => $MaculaODNotes,
        'isMaculaOSAb' => $isMaculaOSAb,
        'MaculaOSNotes' => $MaculaOSNotes,
        'vid' => $new_visit->id
      ]);

      return Redirect::to('/patient/'.$patient_id);

    }

}
