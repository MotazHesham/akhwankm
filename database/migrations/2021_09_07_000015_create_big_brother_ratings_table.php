<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBigBrotherRatingsTable extends Migration
{
    public function up()
    {
        Schema::create('big_brother_ratings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('evaluation_procedures_provided_by_specialist');
            $table->string('the_quality_of_communication_with_specialist');
            $table->string('evaluation_of_required_interviews_with_specialist');
            $table->integer('number_of_interviews');
            $table->string('satisfaction_with_the_acceptance_of_the_smaller_brother');
            $table->string('quality_of_offered_programs');
            $table->string('evaluate_study_of_challenges_and_find_helpful_solutions');
            $table->string('assessment_of_the_interaction_of_the_smaller_brother');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
