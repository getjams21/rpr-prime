<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table -> string('first_name')->nullable();
            $table -> string('last_name')->nullable();
            $table -> string('MI',1)->nullable();
            $table -> text('address')->nullable();
            $table -> string('phone')->nullable();
            $table -> string('email')->nullable();
            $table -> string('contact_person')->nullable();
            $table -> string('TIN')->nullable();
            # table terms
            # 1 = Cash-on-Delivery (COD)
            # 2 = 15 Days
            # 3 = 30 Days
            $table -> integer('terms')->default(1);
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
        Schema::drop('customers');
    }
}
