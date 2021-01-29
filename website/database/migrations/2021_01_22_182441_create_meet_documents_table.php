<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meet_documents', function (Blueprint $table) {
            $table->bigIncrements('Meet_Document_id');
            $table->string('Meet_Document_meet_id');
            $table->string('Meet_Document_imageurl');
            $table->string('Meet_Document_patient_id');
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
        Schema::dropIfExists('meet_documents');
    }
}
