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
        Schema::create('Person', function (Blueprint $table) {
            // $table - Create a new row in table. 
            $table->increments('id')->unsigned();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('phoneNumber', 10)->nullable();
            $table->string('emailAddress')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down(){
        //
        Schema::drop('Person');
    }
}
