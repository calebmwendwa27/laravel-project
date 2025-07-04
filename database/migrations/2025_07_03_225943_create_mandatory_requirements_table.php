<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services_offered', function (Blueprint $table) {
            $table->id();
            $table->foreignId('facility_information_id')->constrained()->onDelete('cascade');

            for ($i = 1; $i <= 84; $i++) {
                $table->tinyInteger("service{$i}")->nullable();
                $table->string("remark{$i}")->nullable();
            }

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services_offered');
    }
};
