<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInequalitiesTable extends Migration
{
    public function up()
    {
        Schema::create('inequalities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('reasons');
            $table->date('date');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
