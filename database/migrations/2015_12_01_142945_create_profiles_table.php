<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unique();
            $table->string('idsocial')->unique()->nullable();           
            $table->string('social');
            $table->string('avatar');
             $table->integer('phone');
            $table->string('company_name'); 
            $table->string('street_address');
            $table->string('home_address');
            $table->integer('postcode');
            $table->string('town');
            $table->string('city');  
            $table->string('country');            
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
        Schema::drop('profiles');
    }
}
