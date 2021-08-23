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
            $table->unsignedBigInteger('specialist_id')->nullable();;
            $table->foreign('specialist_id', 'user_fk_4456320')->references('id')->on('users');
            $table->unsignedBigInteger('small_brother_id')->nullable();
            $table->foreign('small_brother_id', 'small_brother_fk_4457451')->references('id')->on('small_brothers');
        });
    }
}
