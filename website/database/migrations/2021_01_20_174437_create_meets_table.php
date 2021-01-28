<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meets', function (Blueprint $table) {
            $table->bigIncrements('Meet_id');
            $table->string('Meet_appointment_id');
            $table->string('Meet_treatment');
            $table->date('Meet_date');
            $table->string('Meet_note');
            $table->string('Meet_charges')->default(0);
            $table->string('Meet_isPaid')->default(0);
            $table->string('Meet_isHomeVisit');
            $table->string('Meet_isAdvancePaid');
            $table->string('Meet_status')->default(0);
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
        Schema::dropIfExists('meets');
    }
}
