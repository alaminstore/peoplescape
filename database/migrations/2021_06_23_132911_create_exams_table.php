<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->increments('exam_id');
            $table->unsignedInteger('careercat_id')->nullable();
            $table->unsignedInteger('job_id')->nullable();
            $table->string('exam_name')->nullable();
            $table->string('vanue')->nullable();
            $table->string('designation')->nullable();
            $table->date('exam_date')->nullable();
            $table->string('active')->nullable();
            $table->string('status')->nullable();
            $table->date('post_date')->nullable();
            $table->text('rules')->nullable();
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
        Schema::dropIfExists('exams');
    }
}
