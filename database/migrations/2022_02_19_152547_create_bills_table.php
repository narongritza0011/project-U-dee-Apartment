<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->integer('room_number');
            $table->string('bill');
            $table->float('rental_fee');
            $table->integer('water_now_meter');
            $table->integer('water_old_meter');
            $table->integer('water_unit');
            $table->integer('water');
            $table->integer('water_sum');
            $table->integer('electric_now_meter');
            $table->integer('electric_old_meter');
            $table->integer('electric_unit');
            $table->integer('electric');
            $table->integer('electric_sum');
            $table->float('total');
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
        Schema::dropIfExists('bills');
    }
}
