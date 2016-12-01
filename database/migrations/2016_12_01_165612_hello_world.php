<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HelloWorld extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HelloWorld', function($table){
            $table->increments('id')->unsigned();
            $table->string('name', 100);
        });
        
        DB::table('HelloWorld')->insert([
            ['name' => 'Pete'],
            ['name' => 'Frank'],
            ['name' => 'Billy'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('HelloWorld');
    }
}
