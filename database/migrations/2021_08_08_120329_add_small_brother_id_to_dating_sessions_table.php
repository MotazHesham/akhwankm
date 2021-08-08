<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSmallBrotherIdToDatingSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
    {
        Schema::table('dating_sessions', function (Blueprint $table) {

            $table->unsignedBigInteger('small_brother_id');
            $table->foreign('small_brother_id')->references('id')->on('small_brothers');
        });
    }
}


