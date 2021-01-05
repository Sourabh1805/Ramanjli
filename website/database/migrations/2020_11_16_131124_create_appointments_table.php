<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     * appointment_status
     * 0:    Booked by Patient
     * 1:    Confirmed by Doctor
     * 2:    Confirmed by Patient
     * 3:    Rejected by Doctor
     * 4: Appointment attended
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements("Appointment_id");
            $table->string('patient_id');
            $table->string('patient_name');
            $table->string('reason');
            $table->date('Time_and_Date')->nullable();

            
            $table->string('appointment_status');

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
        Schema::dropIfExists('appointments');
    }
}
