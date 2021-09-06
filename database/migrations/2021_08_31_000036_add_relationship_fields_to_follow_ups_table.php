<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFollowUpsTable extends Migration
{
    public function up()
    {
        Schema::table('follow_ups', function (Blueprint $table) {
            $table->unsignedBigInteger('small_brother_id');
            $table->foreign('small_brother_id', 'small_brother_fk_4768108')->references('id')->on('small_brothers');
            $table->unsignedBigInteger('specialist_id');
            $table->foreign('specialist_id', 'specialist_fk_4768109')->references('id')->on('users');
        });
    }
}
