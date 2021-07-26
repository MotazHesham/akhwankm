<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBrothersDealFormsTable extends Migration
{
    public function up()
    {
        Schema::table('brothers_deal_forms', function (Blueprint $table) {
            $table->unsignedBigInteger('big_brother_id');
            $table->foreign('big_brother_id', 'big_brother_fk_4456296')->references('id')->on('big_brothers');
            $table->unsignedBigInteger('small_brother_id');
            $table->foreign('small_brother_id', 'small_brother_fk_4456297')->references('id')->on('small_brothers');
        });
    }
}
