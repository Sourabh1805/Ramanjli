<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     * Appointment_status
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
            $table->string('Appointment_patient_id');
            $table->string('Appointment_reason')->nullable();
            $table->date('Appointment_date')->nullable();
            $table->string('Appointment_charges')->default(0);
            $table->string('Appointment_status')->default(1);
            $table->string('Appointment_isPaymentComplete')->default(0);
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
