<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToManagersRattingsTable extends Migration
{
    public function up()
    {
        Schema::table('managers_rattings', function (Blueprint $table) {
            $table->unsignedBigInteger('brotherhood_specialist_id');
            $table->foreign('brotherhood_specialist_id', 'brotherhood_specialist_fk_4839345')->references('id')->on('users');
        });
    }
}
