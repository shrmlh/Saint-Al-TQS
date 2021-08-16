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

        DB::table('events')->insert( array(
            array(
            "title" => "Ride Event 1", 
            "theme" => "Our Theme 1",
            "reg_start" => now()->subHours(2),
            "event_start" => now()->addDays(1),
            "event_end" => now()->addDays(2),
            "event_fee" => 100.00,
            "route_map" => "none",
            "event_status" => 1,
            "created_at"=> now(),
            "updated_at"=> now()),
        ));

        DB::table('events')->insert( array(
            array(
            "title" => "Ride Event 2", 
            "theme" => "Our Theme 2",
            "reg_start" => now()->subDays(1),
            "event_start" => now()->subDays(1),
            "event_end" => now()->addDays(2),
            "event_fee" => 100.00,
            "route_map" => "none",
            "event_status" => 3,
            "created_at"=> now(),
            "updated_at"=> now()),
        ));

        DB::table('events')->insert( array(
            array(
            "title" => "Ride Event 3", 
            "theme" => "Our Theme 3",
            "reg_start" => now(),
            "event_start" => now()->subDays(1),
            "event_end" => now()->addDays(3),
            "event_fee" => 100.00,
            "route_map" => "none",
            "event_status" => 3,
            "created_at"=> now(),
            "updated_at"=> now()),
        ));

        DB::table('events')->insert( array(
            array(
            "title" => "Ride Event 4", 
            "theme" => "Our Theme 4",
            "reg_start" => now(),
            "event_start" => now()->addDays(7),
            "event_end" => now()->addDays(8),
            "event_fee" => 100.00,
            "route_map" => "none",
            "event_status" => 4,
            "created_at"=> now(),
            "updated_at"=> now()),
        ));
        
        DB::table('events')->insert( array(
            array(
            "title" => "Ride Event 5", 
            "theme" => "Our Theme 5",
            "reg_start" => now(),
            "event_start" => now()->addDays(7),
            "event_end" => now()->addDays(8),
            "event_fee" => 100.00,
            "route_map" => "none",
            "event_status" => 5,
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
