<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTakingNotesTable extends Migration
{
    public function up()
    {
        Schema::create('taking_notes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('day');
            $table->string('behavioral_change');
            $table->string('psychologists_opinions');
            $table->string('social_specialist_opinion');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
