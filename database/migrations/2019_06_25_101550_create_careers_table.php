<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCareersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('catid');
            $table->string('title');
            $table->string('company');
            $table->string('experience');
            $table->string('vacancy');
            $table->string('education');
            $table->string('deadline');
            $table->string('location');
            $table->string('salary');
            $table->string('posteddate');
            $table->text('topdescription');
            $table->text('responsibilitiestext');
            $table->text('responsibilitiespoint');
            $table->text('qualification');
            $table->text('howtoapply');
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
        Schema::dropIfExists('careers');
    }
}
