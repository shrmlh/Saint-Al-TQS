<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname',30);
            $table->string('middleInitial',1)->nullable();
            $table->string('lastname',30);
            $table->string('email')->unique();
            $table->unsignedBigInteger('role');
            $table->foreign('role')->references('id')->on('user_roles');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert( array(
            array(
            "firstname" => "Brynpryl", 
            "middleInitial" => "P", 
            "lastname" => "Bandiola", 
            "email" => "admin@gmail.com",
            "role" => 1,
            "password" => Hash::make("admin123"),
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
        Schema::dropIfExists('users');
    }
}
