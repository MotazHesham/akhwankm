<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacteristicSmallBrotherPivotTable extends Migration
{
    public function up()
    {
        Schema::create('characteristic_small_brother', function (Blueprint $table) {
            $table->unsignedBigInteger('small_brother_id');
            $table->foreign('small_brother_id', 'small_brother_id_fk_4457457')->references('id')->on('small_brothers')->onDelete('cascade');
            $table->unsignedBigInteger('characteristic_id');
            $table->foreign('characteristic_id', 'characteristic_id_fk_4457457')->references('id')->on('characteristics')->onDelete('cascade');
        });
    }
}
