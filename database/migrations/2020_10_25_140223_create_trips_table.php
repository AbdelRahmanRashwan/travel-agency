<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->integer('days');
            $table->integer('nights');
            $table->string('hotel_name');
            $table->integer('hotel_rate');
            $table->date('start_day');
            $table->date('end_day');
            $table->integer('max_number');
            $table->double('price');
            $table->string('image_url')->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');
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
        Schema::dropIfExists('trips');
    }
}
