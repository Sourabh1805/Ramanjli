<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->bigIncrements("Doctor_id");
            $table->string("Doctor_user_id");
            $table->string("Doctor_name");
            $table->string("Doctor_degree");
            $table->string("Doctor_specialization");
            $table->string("Doctor_address");
            $table->string("Doctor_contact_number");
            $table->string("Doctor_maximum_number_of_appointments");
            $table->time("Doctor_clinic_time_from");
            $table->time("Doctor_clinic_time_to");
            $table->string("Doctor_holiday"); 
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
        Schema::dropIfExists('doctors');
    }
}
