<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprovementFormsTable extends Migration
{
    public function up()
    {
        Schema::create('approvement_forms', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->string('approved');
            $table->longText('reason');
            $table->longText('description');
            $table->longText('descision');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
