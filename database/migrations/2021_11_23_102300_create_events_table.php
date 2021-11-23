<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->date('date');
            $table->time('begin');
            $table->time('end');
            $table->boolean('confirmed');

            $table->unsignedInteger('notebook_id');
            $table->unsignedInteger('professional_id');
            $table->unsignedInteger('customer_id');

            $table->foreign('notebook_id')->references('id')->on('notebooks');
            $table->foreign('professional_id')->references('id')->on('professionals');
            $table->foreign('customer_id')->references('id')->on('customers');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
