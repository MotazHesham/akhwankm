<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDatingSessionsTable extends Migration
{
    public function up()
    {
        Schema::table('dating_sessions', function (Blueprint $table) {
            $table->unsignedBigInteger('specialist_id');
            $table->foreign('specialist_id', 'specialist_fk_4512808')->references('id')->on('users');
            $table->unsignedBigInteger('big_brother_id');
            $table->foreign('big_brother_id', 'big_brother_fk_4512809')->references('id')->on('big_brothers');
        });
    }
}
