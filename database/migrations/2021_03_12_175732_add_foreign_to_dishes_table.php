<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('dishes', function (Blueprint $table) {
          $table->unsignedBigInteger('restaurant_id')->after('id')->nullable();
          $table->foreign('restaurant_id')->references('id')->on('restaurants');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dishes', function (Blueprint $table) {
          $table->dropForeign('dishes_restaurant_id_foreign');
          $table->dropColumn('restaurant_id');
        });
    }
}
