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
            $table->dateTime('begin');
            $table->dateTime('end');

            $table->string('description');
            $table->text('details')->nullable();
            $table->boolean('confirmed');

            $table->unsignedInteger('notebook_id');
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('professional_id');

            $table->foreign('notebook_id')->references('id')->on('notebooks');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('professional_id')->references('id')->on('professionals');

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
