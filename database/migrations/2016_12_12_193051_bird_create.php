<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BirdCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create the new database table
        Schema::create('Birds', function ($table) {
            // Create rows in table
            $table->increments('id')->unsigned();
            $table->string('species');
            $table->string('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        // 
        Schema::drop('Birds');
    }
}
