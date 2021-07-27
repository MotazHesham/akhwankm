<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillSmallBrotherPivotTable extends Migration
{
    public function up()
    {
        Schema::create('skill_small_brother', function (Blueprint $table) {
            $table->unsignedBigInteger('small_brother_id');
            $table->foreign('small_brother_id', 'small_brother_id_fk_4457450')->references('id')->on('small_brothers')->onDelete('cascade');
            $table->unsignedBigInteger('skill_id');
            $table->foreign('skill_id', 'skill_id_fk_4457450')->references('id')->on('skills')->onDelete('cascade');
        });
    }
}
