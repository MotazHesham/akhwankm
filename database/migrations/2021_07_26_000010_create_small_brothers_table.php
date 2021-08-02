<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmallBrothersTable extends Migration
{
    public function up()
    {
        Schema::create('small_brothers', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
