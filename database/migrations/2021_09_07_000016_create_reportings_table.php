<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportingsTable extends Migration
{
    public function up()
    {
        Schema::create('reportings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->string('day');
            $table->time('time');
            $table->integer('number_of_repeat_offences');
            $table->longText('violation_summary');
            $table->longText('violation_justifications')->nullable();
            $table->longText('committees_decision')->nullable();
            $table->unsignedBigInteger('report_type_id');
            $table->foreign('report_type_id', 'report_type_fk_4824059')->references('id')->on('report_types');
            $table->unsignedBigInteger('big_brother_id');
            $table->foreign('big_brother_id', 'big_brother_fk_4824060')->references('id')->on('big_brothers');
            $table->unsignedBigInteger('specialist_id')->nullable();
            $table->foreign('specialist_id', 'specialist_fk_4824067')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
