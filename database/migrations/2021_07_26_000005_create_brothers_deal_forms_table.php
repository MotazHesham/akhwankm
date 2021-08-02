<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrothersDealFormsTable extends Migration
{
    public function up()
    {
        Schema::create('brothers_deal_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('day'); 
            $table->string('department_of_social_service');
            $table->string('executive_committee'); 
            $table->string('executive_director'); 
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
