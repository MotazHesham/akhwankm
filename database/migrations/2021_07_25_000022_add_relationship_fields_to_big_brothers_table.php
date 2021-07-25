<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBigBrothersTable extends Migration
{
    public function up()
    {
        Schema::table('big_brothers', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_4456200')->references('id')->on('users');
        });
    }
}
