<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBigBrotherSkillPivotTable extends Migration
{
    public function up()
    {
        Schema::create('big_brother_skill', function (Blueprint $table) {
            $table->unsignedBigInteger('big_brother_id');
            $table->foreign('big_brother_id', 'big_brother_id_fk_4457454')->references('id')->on('big_brothers')->onDelete('cascade');
            $table->unsignedBigInteger('skill_id');
            $table->foreign('skill_id', 'skill_id_fk_4457454')->references('id')->on('skills')->onDelete('cascade');
        });
    }
}
