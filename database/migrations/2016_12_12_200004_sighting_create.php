<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SightingCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Sighting', function ($table){
            $table->increments('id')->unsigned();
            $table->datetime('date');
            $table->string('location');
            //Person 
            $table->integer('personID')->unsigned()->nullable();
            //Bird
            $table->integer('birdID')->unsigned();

            //Foreign Key
            $table->foreign('personID')
                ->references('id')->on('Person');
            //Foreign Key
            $table->foreign('birdID')
                ->references('id')->on('Birds');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Sighting');
    }
}
