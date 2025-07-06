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
        Schema::table('mandatory_requirements', function (Blueprint $table) {
            $table->string('opd_ae_remarks')->nullable();
            $table->string('functional_departments_remarks')->nullable();
            $table->string('inpatient_beds_remarks')->nullable();
            $table->string('icu_beds_remarks')->nullable();
            $table->string('hdu_beds_remarks')->nullable();
            $table->string('theatres_remarks')->nullable();
            $table->string('radiology_remarks')->nullable();
            $table->string('specialist_services_remarks')->nullable();
            $table->string('pharmacy_services_remarks')->nullable();
            $table->string('cssd_remarks')->nullable();
            $table->string('burns_unit_remarks')->nullable();
            $table->string('new_born_unit_remarks')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mandatory_requirements', function (Blueprint $table) {
            $table->dropColumn([
                'opd_ae_remarks',
                'functional_departments_remarks',
                'inpatient_beds_remarks',
                'icu_beds_remarks',
                'hdu_beds_remarks',
                'theatres_remarks',
                'radiology_remarks',
                'specialist_services_remarks',
                'pharmacy_services_remarks',
                'cssd_remarks',
                'burns_unit_remarks',
                'new_born_unit_remarks',
            ]);
        });
    }
};
