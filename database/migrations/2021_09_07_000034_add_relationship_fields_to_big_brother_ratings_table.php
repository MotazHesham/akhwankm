<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBigBrotherRatingsTable extends Migration
{
    public function up()
    {
        Schema::table('big_brother_ratings', function (Blueprint $table) {
            $table->unsignedBigInteger('big_brother_id');
            $table->foreign('big_brother_id', 'big_brother_fk_4822253')->references('id')->on('big_brothers');
        });
    }
}
