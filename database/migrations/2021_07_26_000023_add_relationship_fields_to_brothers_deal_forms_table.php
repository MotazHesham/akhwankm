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
            $table->unsignedBigInteger('approvment_form_id')->nullable();
            $table->foreign('approvment_form_id', 'approvment_form_fk_4510059')->references('id')->on('approvement_forms');
            $table->unsignedBigInteger('specialist_id');
            $table->foreign('specialist_id', 'specialist_fk_4510194')->references('id')->on('users');
        });
    }
}
