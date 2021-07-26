<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBigBrotherCharacteristicPivotTable extends Migration
{
    public function up()
    {
        Schema::create('big_brother_characteristic', function (Blueprint $table) {
            $table->unsignedBigInteger('big_brother_id');
            $table->foreign('big_brother_id', 'big_brother_id_fk_4457453')->references('id')->on('big_brothers')->onDelete('cascade');
            $table->unsignedBigInteger('characteristic_id');
            $table->foreign('characteristic_id', 'characteristic_id_fk_4457453')->references('id')->on('characteristics')->onDelete('cascade');
        });
    }
}
