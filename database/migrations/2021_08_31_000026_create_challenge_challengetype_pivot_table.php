<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChallengeChallengetypePivotTable extends Migration
{
    public function up()
    {
        Schema::create('challenge_challengetype', function (Blueprint $table) {
            $table->unsignedBigInteger('challenge_id');
            $table->foreign('challenge_id', 'challenge_id_fk_4768221')->references('id')->on('challenges')->onDelete('cascade');
            $table->unsignedBigInteger('challengetype_id');
            $table->foreign('challengetype_id', 'challengetype_id_fk_4768221')->references('id')->on('challengetypes')->onDelete('cascade');
        });
    }
}
