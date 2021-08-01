<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToApprovementFormsTable extends Migration
{
    public function up()
    {
        Schema::table('approvement_forms', function (Blueprint $table) {
            $table->unsignedBigInteger('specialist_id');
            $table->foreign('specialist_id', 'specialist_fk_4456416')->references('id')->on('users');
            $table->unsignedBigInteger('big_brother_id');
            $table->foreign('big_brother_id', 'big_brother_fk_4509964')->references('id')->on('big_brothers');
        });
    }
}
