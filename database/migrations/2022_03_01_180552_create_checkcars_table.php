<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckcarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_cars', function (Blueprint $table) {
            $table->id();
            $table->integer('car_id');
            $table->integer('oil_status');
            $table->integer('rubber_status');
            $table->integer('elect_status');
            $table->integer('status');
            $table->date('take_car');

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
        Schema::dropIfExists('checkcars');
    }
}
