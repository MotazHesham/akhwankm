<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowUpsTable extends Migration
{
    public function up()
    {
        Schema::create('follow_ups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('deal');
            $table->string('academic_level');
            $table->longText('notes');
            $table->date('date');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
