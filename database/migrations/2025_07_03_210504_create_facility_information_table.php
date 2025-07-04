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
        Schema::create('facility_information', function (Blueprint $table) {
         $table->id();
        $table->string('registration_name')->nullable();
        $table->string('master_facility_no')->nullable();
        $table->string('registration_no')->nullable();
        $table->string('physical_location')->nullable();
        $table->string('contact_person_name')->nullable();
        $table->string('qualification_of_contact_person')->nullable();
        $table->string('county')->nullable();
        $table->string('sub_county')->nullable();
        $table->string('address')->nullable();
        $table->string('town')->nullable();
        $table->string('code')->nullable();
        $table->string('building_plot_no')->nullable();
        $table->string('phone')->nullable();
        $table->string('email')->nullable();
        $table->string('facility_level')->nullable();
        $table->string('facility_ownership')->nullable();
        $table->integer('catchment_population')->nullable();
        $table->integer('monthly_outpatient_workload')->nullable();
        $table->integer('inpatient_bed_capacity')->nullable();
        $table->text('location_description')->nullable();
        $table->text('facility_level_description')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facility_information');
    }
};
