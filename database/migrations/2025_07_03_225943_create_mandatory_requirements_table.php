<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mandatory_requirements', function (Blueprint $table) {
            $table->id();

            // Foreign key to facility_information
            $table->foreignId('facility_information_id')
                ->constrained()
                ->onDelete('cascade');

            // Section B fields
            $table->tinyInteger('opd_ae')->nullable();
            $table->tinyInteger('functional_departments')->nullable();
            $table->tinyInteger('inpatient_beds')->nullable();
            $table->tinyInteger('icu_beds')->nullable();
            $table->tinyInteger('hdu_beds')->nullable();
            $table->tinyInteger('theatres')->nullable();
            $table->tinyInteger('radiology')->nullable();
            $table->tinyInteger('specialist_services')->nullable();
            $table->tinyInteger('pharmacy_services')->nullable();
            $table->tinyInteger('cssd')->nullable();
            $table->tinyInteger('burns_unit')->nullable();
            $table->tinyInteger('new_born_unit')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mandatory_requirements');
    }
};
