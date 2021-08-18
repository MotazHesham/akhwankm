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
            $table->decimal('salary', 15, 2)->nullable();
            $table->integer('family_male')->nullable();
            $table->integer('family_female')->nullable();;
            $table->longText('brotherhood_reason')->nullable();;
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
