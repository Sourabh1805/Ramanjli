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
            $table->string('Meet_treatment')->nullable();
            $table->date('Meet_date')->nullable();
            $table->string('Meet_note')->nullable();
            $table->string('Meet_charges')->default(0);
            $table->string('Meet_isPaid')->default(0);
            $table->string('Meet_isHomeVisit')->default(0);
            $table->string('Meet_isAdvancePaid')->default(0);
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
