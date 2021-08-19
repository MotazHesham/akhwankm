<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutingRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('outing_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->string('place');
            $table->string('reason')->nullable();
            $table->string('late')->nullable();
            $table->string('status')->default('pending');
            $table->datetime('outing_date')->nullable();
            $table->datetime('done_time')->nullable();
            $table->string('other')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }
}
