<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatingSessionsTable extends Migration
{
    public function up()
    {
        Schema::create('dating_sessions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->longText('interview_notes');
            $table->longText('recommendations');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
