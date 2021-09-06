<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChallengesTable extends Migration
{
    public function up()
    {
        Schema::create('challenges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('other')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('small_brother_id');
            $table->foreign('small_brother_id', 'small_brother_fk_4769959')->references('id')->on('small_brothers');
            $table->unsignedBigInteger('specialist_id');
            $table->foreign('specialist_id', 'specialist_fk_4768110')->references('id')->on('users');
        });
    }
}
