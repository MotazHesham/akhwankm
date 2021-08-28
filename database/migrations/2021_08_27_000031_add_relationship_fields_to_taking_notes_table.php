<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTakingNotesTable extends Migration
{
    public function up()
    {
        Schema::table('taking_notes', function (Blueprint $table) {
            $table->unsignedBigInteger('specialist_name_id')->nullable();
            $table->foreign('specialist_name_id', 'specialist_name_fk_4737710')->references('id')->on('users');
            $table->unsignedBigInteger('small_brother_name_id');
            $table->foreign('small_brother_name_id', 'small_brother_name_fk_4737712')->references('id')->on('small_brothers');
        });
    }
}
