<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlotsTable extends Migration
{
    /**
     * Run the migrations.
     * Slot_is_available
     * 0: NO
     * 1: Yes
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('slots', function (Blueprint $table) {
            $table->bigIncrements("Slot_id");
            $table->timestamp('Slot_date');
            $table->string('Slot_is_available')->default("0");
            $table->string('Slot_max_appointment_count_change')->default(0);
            $table->string('Slot_is_available_homevisit')->default("0");
            $table->string('Slot_max_appointment_count_change_homevisit')->default(0);
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
        Schema::dropIfExists('slots');
    }
}
