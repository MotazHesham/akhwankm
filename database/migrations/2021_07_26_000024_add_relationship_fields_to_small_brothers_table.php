<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSmallBrothersTable extends Migration
{
    public function up()
    {
        Schema::table('small_brothers', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_4456121')->references('id')->on('users');
        });
    }
}
