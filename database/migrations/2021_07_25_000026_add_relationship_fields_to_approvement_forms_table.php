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
            $table->unsignedBigInteger('brothers_deal_form_id');
            $table->foreign('brothers_deal_form_id', 'brothers_deal_form_fk_4457650')->references('id')->on('brothers_deal_forms');
        });
    }
}
