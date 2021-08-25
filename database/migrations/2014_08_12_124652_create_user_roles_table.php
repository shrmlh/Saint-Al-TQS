<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_roles', function (Blueprint $table) {
            $table->id();
            $table->string('role', 20);
            $table->timestamps();
        });

        DB::table('user_roles')->insert( array(
            array(
            "role" => "Administrator",
            "created_at"=> now(),
            "updated_at"=> now()),
            array(
            "role" => "Member",
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
        Schema::dropIfExists('user_roles');
    }
}
