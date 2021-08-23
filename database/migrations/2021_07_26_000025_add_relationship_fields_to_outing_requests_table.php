<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOutingRequestsTable extends Migration
{
    public function up()
    {
        Schema::table('outing_requests', function (Blueprint $table) {
            $table->unsignedBigInteger('outing_type_id')->nullable();
            $table->foreign('outing_type_id', 'outing_type_fk_4456305')->references('id')->on('outing_types');
            $table->unsignedBigInteger('big_brother_id');
            $table->foreign('big_brother_id', 'big_brother_fk_4457647')->references('id')->on('big_brothers');
            $table->unsignedBigInteger('small_brother_id');
            $table->foreign('small_brother_id', 'small_brother_fk_4457648')->references('id')->on('small_brothers');
        });
    }
}
