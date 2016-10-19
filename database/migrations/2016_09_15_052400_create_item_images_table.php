<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_images', function (Blueprint $table) {
            $table->increments('id');
            $table -> integer ('itemID')->nullable()->unsigned();
            $table -> string('link');
            $table->timestamps();
        });
        //add FK to item_images
        Schema::table('item_images', function (Blueprint $table) {
            $table-> foreign('itemID')->references('id')->on('items')
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
        Schema::drop('item_images');
        Schema::table('item_images', function (Blueprint $table) {
            $table->dropForeign('item_images_itemID_foreign');
        });
    }
}
