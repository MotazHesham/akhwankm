<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagersRattingsTable extends Migration
{
    public function up()
    {
        Schema::create('managers_rattings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('member_of_the_board_of_directors');
            $table->string('executive_director');
            $table->string('evaluation_of_fraternity_procedures');
            $table->string('evaluation_of_interviews_with_the_specialist');
            $table->integer('number_of_interviews');
            $table->string('the_convenience_of_choosing_a_bigbrother');
            $table->string('the_quality_of_the_training_program');
            $table->string('evaluate_the_study_of_challenges_and_find_solutions_to_help');
            $table->string('desire_to_continue_the_relationship_between_brothers');
            $table->string('interaction_of_the_small_brother');
            $table->string('how_well_the_brotherhood_work_team_dealt_and_interacted');
            $table->longText('general_notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
