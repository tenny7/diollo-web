<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('store_id')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('region_id')->nullable();
            $table->timestamp('started')->nullable();
            $table->string('duration')->nullable();
            $table->string('impressions')->nullable();
            $table->string('views')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('promotions');
    }
}
