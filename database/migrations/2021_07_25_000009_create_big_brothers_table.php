<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBigBrothersTable extends Migration
{
    public function up()
    {
        Schema::create('big_brothers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('job');
            $table->string('job_place');
            $table->decimal('salary', 15, 2);
            $table->integer('family_male');
            $table->integer('family_female');
            $table->string('degree');
            $table->longText('brotherhood_reason');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
