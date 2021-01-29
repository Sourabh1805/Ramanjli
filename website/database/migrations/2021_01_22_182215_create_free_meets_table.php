<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreeMeetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('free_meets', function (Blueprint $table) {
            $table->bigIncrements('FreeMeet_id');
            $table->string('FreeMeet_user_id');
            $table->string('FreeMeet_cancled_meet_id');
            $table->string('FreeMeet_claimed_meet_id');
            $table->string('FreeMeet_reason');
            $table->string('FreeMeet_status');
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
        Schema::dropIfExists('free_meets');
    }
}
