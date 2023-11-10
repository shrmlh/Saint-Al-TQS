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
            $table->id()->startingValue(100000);
            $table->string('firstname',30);
            $table->string('middleInitial',2)->nullable();
            $table->string('lastname',30);
            $table->string('contactno',11);
            $table->text('address');
            $table->date('birthday');
            // $table->unsignedBigInteger('club')->nullable();
            // $table->foreign('club')->references('id')->on('rider_groups');
            // $table->string('plateno',30)->nullable();
            // $table->string('licenseno',30)->nullable()->unique();
            $table->string('email')->unique();
            $table->unsignedBigInteger('role');
            $table->foreign('role')->references('id')->on('user_roles');
            $table->string('password');
            $table->rememberToken();
            $table->boolean('status')->default(1);
            // $table->string('membership_payment')->nullable();
            // $table->boolean('is_member')->default(0);
            $table->timestamps();
        });

        DB::table('users')->insert( array(
            array(
            "firstname" => "Admin", 
            "middleInitial" => "A,", 
            "lastname" => "Admin", 
            "contactno"=> "09123456789",
            "address" => "Koronadal City",
            "birthday" => "1999/04/26",
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
