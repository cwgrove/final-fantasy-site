<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('characters', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name')->nullable();
		  $table->string('cimage')->nullable();
		  $table->integer('origin')->nullable();
		  $table->string('alliance')->nullable();
          $table->string('bio')->nullable();
		  $table->integer('age')->nullable();
		  $table->string('blood')->nullable();
          //$table->string('poststatus');
          // this needs to be an in and relate to a user.
          $table->string('postauthor')->nullable();
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
        //
		Schema::drop('characters');
    }
}
