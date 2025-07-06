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
        Schema::create('personnel_availabilities', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('medical_officers')->nullable();
$table->text('remarks_medical_officers')->nullable();

$table->tinyInteger('anaesthesiologists')->nullable();
$table->text('remarks_anaesthesiologists')->nullable();

$table->tinyInteger('cardiologists')->nullable();
$table->text('remarks_cardiologists')->nullable();

$table->tinyInteger('general_surgeons')->nullable();
$table->text('remarks_general_surgeons')->nullable();

$table->tinyInteger('orthopaedic_surgeons')->nullable();
$table->text('remarks_orthopaedic_surgeons')->nullable();

$table->tinyInteger('cardiothoracic_surgeon')->nullable();
$table->text('remarks_cardiothoracic_surgeon')->nullable();

$table->tinyInteger('critical_care_specialist')->nullable();
$table->text('remarks_critical_care_specialist')->nullable();

$table->tinyInteger('ent_surgeons')->nullable();
$table->text('remarks_ent_surgeons')->nullable();

$table->tinyInteger('physicians')->nullable();
$table->text('remarks_physicians')->nullable();

$table->tinyInteger('obstetricians_gynaecologists')->nullable();
$table->text('remarks_obstetricians_gynaecologists')->nullable();
$table->tinyInteger('palliative_care_specialists')->nullable();
$table->text('remarks_palliative_care_specialists')->nullable();

$table->tinyInteger('nephrologist')->nullable();
$table->text('remarks_nephrologist')->nullable();

$table->tinyInteger('plastic_reconstructive_surgeon')->nullable();
$table->text('remarks_plastic_reconstructive_surgeon')->nullable();

$table->tinyInteger('neurosurgeons')->nullable();
$table->text('remarks_neurosurgeons')->nullable();

$table->tinyInteger('oncologists')->nullable();
$table->text('remarks_oncologists')->nullable();

$table->tinyInteger('ophthalmologist')->nullable();
$table->text('remarks_ophthalmologist')->nullable();

$table->tinyInteger('dermatologists')->nullable();
$table->text('remarks_dermatologists')->nullable();

$table->tinyInteger('paediatricians')->nullable();
$table->text('remarks_paediatricians')->nullable();

$table->tinyInteger('pathologists')->nullable();
$table->text('remarks_pathologists')->nullable();

$table->tinyInteger('psychiatrists')->nullable();
$table->text('remarks_psychiatrists')->nullable();

$table->tinyInteger('radiologists')->nullable();
$table->text('remarks_radiologists')->nullable();

$table->tinyInteger('public_health_specialists')->nullable();
$table->text('remarks_public_health_specialists')->nullable();

$table->tinyInteger('urologists')->nullable();
$table->text('remarks_urologists')->nullable();

$table->tinyInteger('clinical_officers_general_specialized')->nullable();
$table->text('remarks_clinical_officers_general_specialized')->nullable();

$table->tinyInteger('clinical_officer_anaesthetist')->nullable();
$table->text('remarks_clinical_officer_anaesthetist')->nullable();

$table->tinyInteger('clinical_officer_lung_skin')->nullable();
$table->text('remarks_clinical_officer_lung_skin')->nullable();

$table->tinyInteger('clinical_officer_psychiatry')->nullable();
$table->text('remarks_clinical_officer_psychiatry')->nullable();

$table->tinyInteger('clinical_officer_ophthalmology')->nullable();
$table->text('remarks_clinical_officer_ophthalmology')->nullable();

$table->tinyInteger('clinical_officer_orthopaedic')->nullable();
$table->text('remarks_clinical_officer_orthopaedic')->nullable();

$table->tinyInteger('clinical_officer_dermatology')->nullable();
$table->text('remarks_clinical_officer_dermatology')->nullable();

$table->tinyInteger('clinical_officer_oncology')->nullable();
$table->text('remarks_clinical_officer_oncology')->nullable();

$table->tinyInteger('clinical_officer_paediatrics')->nullable();
$table->text('remarks_clinical_officer_paediatrics')->nullable();

$table->tinyInteger('clinical_officer_reproductive_health')->nullable();
$table->text('remarks_clinical_officer_reproductive_health')->nullable();

$table->tinyInteger('nurses_total')->nullable();
$table->text('remarks_nurses_total')->nullable();

$table->tinyInteger('ophthalmic_nurses')->nullable();
$table->text('remarks_ophthalmic_nurses')->nullable();

$table->tinyInteger('paediatric_nurses')->nullable();
$table->text('remarks_paediatric_nurses')->nullable();

$table->tinyInteger('palliative_care_nurses')->nullable();
$table->text('remarks_palliative_care_nurses')->nullable();

$table->tinyInteger('psychiatric_nurses')->nullable();
$table->text('remarks_psychiatric_nurses')->nullable();

$table->tinyInteger('registered_midwives')->nullable();
$table->text('remarks_registered_midwives')->nullable();

$table->tinyInteger('theatre_nurses')->nullable();
$table->text('remarks_theatre_nurses')->nullable();

$table->tinyInteger('anaesthetic_nurses')->nullable();
$table->text('remarks_anaesthetic_nurses')->nullable();

$table->tinyInteger('accident_emergency_nurses')->nullable();
$table->text('remarks_accident_emergency_nurses')->nullable();

$table->tinyInteger('oncology_nurses')->nullable();
$table->text('remarks_oncology_nurses')->nullable();

$table->tinyInteger('critical_care_nurses')->nullable();
$table->text('remarks_critical_care_nurses')->nullable();

$table->tinyInteger('sign_language_staff')->nullable();
$table->text('remarks_sign_language_staff')->nullable();

$table->tinyInteger('pharmacists')->nullable();
$table->text('remarks_pharmacists')->nullable();

$table->tinyInteger('clinical_pharmacists')->nullable();
$table->text('remarks_clinical_pharmacists')->nullable();

$table->tinyInteger('oncology_pharmacists')->nullable();
$table->text('remarks_oncology_pharmacists')->nullable();

$table->tinyInteger('pharmaceutical_technologists')->nullable();
$table->text('remarks_pharmaceutical_technologists')->nullable();

$table->tinyInteger('orthopaedic_trauma_technologists')->nullable();
$table->text('remarks_orthopaedic_trauma_technologists')->nullable();

$table->tinyInteger('orthopaedic_technologists')->nullable();
$table->text('remarks_orthopaedic_technologists')->nullable();

$table->tinyInteger('physiotherapists')->nullable();
$table->text('remarks_physiotherapists')->nullable();

$table->tinyInteger('speech_therapists')->nullable();
$table->text('remarks_speech_therapists')->nullable();

$table->tinyInteger('occupational_therapists')->nullable();
$table->text('remarks_occupational_therapists')->nullable();

$table->tinyInteger('dental_officers')->nullable();
$table->text('remarks_dental_officers')->nullable();

$table->tinyInteger('oral_maxillofacial_surgeon')->nullable();
$table->text('remarks_oral_maxillofacial_surgeon')->nullable();

$table->tinyInteger('paediatric_dentists')->nullable();
$table->text('remarks_paediatric_dentists')->nullable();

$table->tinyInteger('orthodontists')->nullable();
$table->text('remarks_orthodontists')->nullable();

$table->tinyInteger('dental_technologists')->nullable();
$table->text('remarks_dental_technologists')->nullable();

$table->tinyInteger('radiographers')->nullable();
$table->text('remarks_radiographers')->nullable();
$table->tinyInteger('sonographers')->nullable();
$table->text('remarks_sonographers')->nullable();

$table->tinyInteger('mammographers')->nullable();
$table->text('remarks_mammographers')->nullable();

$table->tinyInteger('ct_mri_radiographers')->nullable();
$table->text('remarks_ct_mri_radiographers')->nullable();

$table->tinyInteger('dental_radiographers')->nullable();
$table->text('remarks_dental_radiographers')->nullable();

$table->tinyInteger('therapy_radiographers')->nullable();
$table->text('remarks_therapy_radiographers')->nullable();

$table->tinyInteger('nuclear_medicine_technologists')->nullable();
$table->text('remarks_nuclear_medicine_technologists')->nullable();

$table->tinyInteger('radiation_safety_officer')->nullable();
$table->text('remarks_radiation_safety_officer')->nullable();

$table->tinyInteger('medical_social_workers')->nullable();
$table->text('remarks_medical_social_workers')->nullable();

$table->tinyInteger('laboratory_technologists')->nullable();
$table->text('remarks_laboratory_technologists')->nullable();

$table->tinyInteger('clinical_psychologists')->nullable();
$table->text('remarks_clinical_psychologists')->nullable();
$table->tinyInteger('porters')->nullable();
$table->text('remarks_porters')->nullable();

$table->tinyInteger('security_personnel')->nullable();
$table->text('remarks_security_personnel')->nullable();

$table->tinyInteger('waste_handlers')->nullable();
$table->text('remarks_waste_handlers')->nullable();

$table->tinyInteger('ambulance_drivers')->nullable();
$table->text('remarks_ambulance_drivers')->nullable();

$table->tinyInteger('cleaners')->nullable();
$table->text('remarks_cleaners')->nullable();

$table->tinyInteger('laundry_staff')->nullable();
$table->text('remarks_laundry_staff')->nullable();

$table->tinyInteger('catering_staff')->nullable();
$table->text('remarks_catering_staff')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnel_availabilities');
    }
};
