<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     * Medicine_Type
     * 0: Tablet
     * 1: Injection
     * 2: Syrup
     * 3: Saline
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->bigIncrements("Prescription_id");
            $table->string('Appointment_id');
            $table->string('Medicine_Type');
            $table->string('Medicine_name', "512");
            $table->string('Medicine_quantity');
            $table->string('Medicine_time', "999");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prescriptions');
    }
}
