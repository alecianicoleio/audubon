<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PersonCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        // Creating a new database table
        Schema::create('Person', function ($table) {
            // $table - Create a new row in table. 
            $table->increments('id')->unsigned();
            $table->string('first')->nullable();
            $table->string('last')->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('email')->nullable();
        });
    }

    /**
     * Reverse the migrations. Rollback
     *
     * @return void
     */

    public function down(){
        // Removes the table
        Schema::drop('Person');
    }
}
