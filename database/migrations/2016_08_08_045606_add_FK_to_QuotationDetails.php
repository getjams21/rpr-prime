<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFKToQuotationDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quotation_details', function (Blueprint $table) {
            $table-> foreign('itemID')->references('id')->on('items')
            ->onDelete('restrict')->onUpdate('cascade');
            $table-> foreign('quotationID')->references('id')->on('quotations')
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
        Schema::table('QuotationDetails', function (Blueprint $table) {
            $table->dropForeign('quotation_details_itemID_foreign');
            $table->dropForeign('quotation_details_quotationID_foreign');
        });
    }
}
