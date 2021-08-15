<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateEventStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_statuses', function (Blueprint $table) {
            $table->id('stat_id');
            $table->string('status', 30)->unique();
            $table->timestamps();
        });
        DB::table('event_statuses')->insert( array(
            array("status" => "Open", "created_at"=> now(),"updated_at"=> now()),
            array("status" => "Closed", "created_at"=> now(),"updated_at"=> now()),
            array("status" => "Ongoing", "created_at"=> now(),"updated_at"=> now()),
            array("status" => "Cancelled", "created_at"=> now(),"updated_at"=> now()),
            array("status" => "Completed", "created_at"=> now(),"updated_at"=> now())
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_statuses');
    }
}
