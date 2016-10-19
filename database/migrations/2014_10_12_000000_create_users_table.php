<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table -> increments('id');
            $table -> string('username')->unique();
            $table -> string('email')->unique();
            $table -> string('password');
            $table -> string('first_name',150)->nullable();
            $table -> string('last_name',150)->nullable();
            $table -> string('MI',1)->nullable();
            $table -> string('position')->nullable();
            $table -> integer('branchID')->nullable()->unsigned();
            $table -> boolean('IsActive')->default(1);
            $table -> rememberToken();
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
