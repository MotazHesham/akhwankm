<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->datetime('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('user_type')->nullable();
            $table->string('identity_number')->nullable();
            $table->date('identity_date')->nullable();
            $table->date('dbo')->nullable();
            $table->string('marital_status')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id', 'city_id_fk_4457450')->references('id')->on('cities')->onDelete('cascade');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('degree')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
