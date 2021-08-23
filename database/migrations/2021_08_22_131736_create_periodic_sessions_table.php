<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodicSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodic_sessions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('date');  
            $table->unsignedBigInteger('big_brother_id');
            $table->foreign('big_brother_id')->references('id')->on('big_brothers');
            $table->unsignedBigInteger('small_brother_id');
            $table->foreign('small_brother_id')->references('id')->on('small_brothers');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('periodic_sessions');
    }
}
