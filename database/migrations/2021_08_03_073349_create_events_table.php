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
            $table->dateTime('event_start');
            $table->dateTime('event_end');
            $table->double('event_fee', 8, 2);
            $table->unsignedBigInteger('event_status');
            $table->foreign('event_status')->references('stat_id')->on('event_statuses');
            $table->timestamps();
        });

        DB::table('events')->insert( array(
            array(
            "title" => "Ride Event 1", 
            "theme" => "Our Theme 1",
            "event_start" => now()->subHours(1),
            "event_end" => now()->addHours(1),
            "event_fee" => 100.00,
            "event_status" => 1,
            "created_at"=> now(),
            "updated_at"=> now()),
        ));

        DB::table('events')->insert( array(
            array(
            "title" => "Ride Event 2", 
            "theme" => "Our Theme 2",
            "event_start" => now(),
            "event_end" => now()->addHours(2),
            "event_fee" => 100.00,
            "event_status" => 1,
            "created_at"=> now(),
            "updated_at"=> now()),
        ));

        DB::table('events')->insert( array(
            array(
            "title" => "Ride Event 3", 
            "theme" => "Our Theme 3",
            "event_start" => now()->addDays(7),
            "event_end" => now()->addDays(8),
            "event_fee" => 100.00,
            "event_status" => 1,
            "created_at"=> now(),
            "updated_at"=> now()),
        ));
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
