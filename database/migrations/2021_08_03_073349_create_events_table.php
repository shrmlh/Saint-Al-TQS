<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->string('title', 100);
            $table->string('theme')->nullable();
            $table->dateTime('reg_start');
            $table->dateTime('event_start');
            $table->dateTime('event_end');
            $table->double('event_fee', 8, 2);
            $table->string('route_map');
            $table->unsignedBigInteger('event_status');
            $table->foreign('event_status')->references('stat_id')->on('event_statuses');
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
