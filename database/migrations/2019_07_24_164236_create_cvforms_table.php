<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCvformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cvforms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('birthdate');
            $table->text('haddress');
            $table->text('paddress');
            $table->string('mobile');
            $table->string('email');
            $table->text('academic');
            $table->text('experience');
            $table->text('project');
            $table->text('interest');
            $table->string('cv');
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
        Schema::dropIfExists('cvforms');
    }
}
