<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmallBrotherRatingsTable extends Migration
{
    public function up()
    {
        Schema::create('small_brother_ratings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('suitability_of_program_and_its_help_in_developing_your_skills');
            $table->string('how_much_do_you_accept_the_big_brother_sister');
            $table->string('big_brother_big_sister_reacts_to_my_needs');
            $table->string('sticks_to_his_appointments');
            $table->string('good_to_listen_to_my_discussions');
            $table->string('would_you_like_to_continue_with_big_brother');
            $table->string('ease_of_registering');
            $table->string('extent_of_benefit_from_the_program');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
