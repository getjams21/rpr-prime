<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFKToQuotations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quotations', function (Blueprint $table) {
            $table-> foreign('customerID')->references('id')->on('customers')
            ->onDelete('restrict')->onUpdate('cascade');
            $table-> foreign('userID')->references('id')->on('users')
            ->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Quotations', function (Blueprint $table) {
            $table->dropForeign('quotations_customerID_foreign');
            $table->dropForeign('quotations_userID_foreign');
        });
    }
}
