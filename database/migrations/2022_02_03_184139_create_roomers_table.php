<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roomers', function (Blueprint $table) {
            $table->id();
            $table->integer('room_number');
            $table->string('card_number');
            $table->string('full_name');
            $table->string('tel');
            $table->string('contact_other');
            $table->string('start_date');
            $table->integer('status');
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
        Schema::dropIfExists('roomers');
    }
}
