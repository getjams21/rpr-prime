<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateItemIDColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('item_images', function (Blueprint $table) {
            $table->renameColumn('itemID','item_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item_images', function (Blueprint $table) {
            $table->renameColumn('item_id','itemID');
        });
    }
}
