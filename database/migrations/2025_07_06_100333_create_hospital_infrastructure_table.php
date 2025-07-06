<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('facility_infrastructure', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('facility_id'); // Foreign key to facilities table

            // Rows 1-20 already added by you — now continuing from Row 21 onward:
           $table->tinyInteger('departmental_waiting_bay')->nullable();
$table->text('departmental_waiting_bay_remarks')->nullable();

$table->tinyInteger('reception_registration_area')->nullable();
$table->text('reception_registration_area_remarks')->nullable();

$table->tinyInteger('triage_area')->nullable();
$table->text('triage_area_remarks')->nullable();

$table->tinyInteger('health_information_system')->nullable();
$table->text('health_information_system_remarks')->nullable();

$table->tinyInteger('consultation_rooms_with_mackintosh')->nullable();
$table->text('consultation_rooms_with_mackintosh_remarks')->nullable();

$table->tinyInteger('treatment_rooms')->nullable();
$table->text('treatment_rooms_remarks')->nullable();

$table->tinyInteger('minor_theatre')->nullable();
$table->text('minor_theatre_remarks')->nullable();

$table->tinyInteger('nurse_station')->nullable();
$table->text('nurse_station_remarks')->nullable();

$table->tinyInteger('staff_lounge')->nullable();
$table->text('staff_lounge_remarks')->nullable();

$table->tinyInteger('resource_centre')->nullable();
$table->text('resource_centre_remarks')->nullable();

$table->tinyInteger('orthopedic_room')->nullable();
$table->text('orthopedic_room_remarks')->nullable();

$table->tinyInteger('dental_unit')->nullable();
$table->text('dental_unit_remarks')->nullable();

$table->tinyInteger('nursing_incharge_office')->nullable();
$table->text('nursing_incharge_office_remarks')->nullable();

$table->tinyInteger('counselling_room')->nullable();
$table->text('counselling_room_remarks')->nullable();

$table->tinyInteger('hand_wash_basin')->nullable();
$table->text('hand_wash_basin_remarks')->nullable();

$table->tinyInteger('accident_emergency_department')->nullable();
$table->text('accident_emergency_department_remarks')->nullable();

$table->tinyInteger('clinic_paediatrics')->nullable();
$table->text('clinic_paediatrics_remarks')->nullable();

$table->tinyInteger('clinic_internal_medicine')->nullable();
$table->text('clinic_internal_medicine_remarks')->nullable();

$table->tinyInteger('clinic_gynaecology')->nullable();
$table->text('clinic_gynaecology_remarks')->nullable();

$table->tinyInteger('clinic_high_risk_obstetric')->nullable();
$table->text('clinic_high_risk_obstetric_remarks')->nullable();

$table->tinyInteger('clinic_surgical_orthopaedic_ent')->nullable();
$table->text('clinic_surgical_orthopaedic_ent_remarks')->nullable();

$table->tinyInteger('clinic_mental_health')->nullable();
$table->text('clinic_mental_health_remarks')->nullable();

$table->tinyInteger('clinic_ophthalmology')->nullable();
$table->text('clinic_ophthalmology_remarks')->nullable();

$table->tinyInteger('clinic_dermatology')->nullable();
$table->text('clinic_dermatology_remarks')->nullable();

$table->tinyInteger('clinic_tb_hiv_chronic')->nullable();
$table->text('clinic_tb_hiv_chronic_remarks')->nullable();

$table->tinyInteger('mch_anc_room')->nullable();
$table->text('mch_anc_room_remarks')->nullable();

$table->tinyInteger('mch_fp_room')->nullable();
$table->text('mch_fp_room_remarks')->nullable();

$table->tinyInteger('mch_cwc_room')->nullable();
$table->text('mch_cwc_room_remarks')->nullable();

$table->tinyInteger('mch_immunization_room')->nullable();
$table->text('mch_immunization_room_remarks')->nullable();

$table->tinyInteger('mch_nutrition_room')->nullable();
$table->text('mch_nutrition_room_remarks')->nullable();
 
$table->tinyInteger('mch_waiting_bay')->nullable();
$table->text('mch_waiting_bay_remarks')->nullable();

$table->tinyInteger('imaging_xray')->nullable();
$table->text('imaging_xray_remarks')->nullable();

$table->tinyInteger('imaging_opg')->nullable();
$table->text('imaging_opg_remarks')->nullable();

$table->tinyInteger('imaging_mammography')->nullable();
$table->text('imaging_mammography_remarks')->nullable();

$table->tinyInteger('imaging_ultrasound')->nullable();
$table->text('imaging_ultrasound_remarks')->nullable();

$table->tinyInteger('imaging_ct_scan')->nullable();
$table->text('imaging_ct_scan_remarks')->nullable();

$table->tinyInteger('imaging_mri')->nullable();
$table->text('imaging_mri_remarks')->nullable();

$table->tinyInteger('imaging_fluoroscopy')->nullable();
$table->text('imaging_fluoroscopy_remarks')->nullable();

$table->tinyInteger('imaging_image_intensifier')->nullable();
$table->text('imaging_image_intensifier_remarks')->nullable();

$table->tinyInteger('renal_dialysis_unit')->nullable();
$table->text('renal_dialysis_unit_remarks')->nullable();

 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
   public function down()
    {
        Schema::dropIfExists('facility_infrastructure');
    }
};
