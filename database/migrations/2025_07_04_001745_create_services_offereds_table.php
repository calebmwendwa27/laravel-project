<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ServicesOfferedTable extends Migration
{
    public function up()
    {
        Schema::create('services_offered', function (Blueprint $table) {
            $table->id();
            $table->foreignId('facility_id')->constrained()->onDelete('cascade'); // FK to facility

            // Loop-style fields (service1 to service84, remark1 to remark84)
            for ($i = 1; $i <= 84; $i++) {
                $table->tinyInteger("service{$i}")->nullable()->comment('0=No, 1=Partial, 2=Yes');
                $table->string("remark{$i}")->nullable();
            }

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('services_offered');
    }
}