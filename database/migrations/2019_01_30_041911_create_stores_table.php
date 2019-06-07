<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phones');
            $table->string('email');
            $table->text('address');
            $table->text('description')->nullable()->default(null);
            $table->string('opening_hours')->nullable()->default(null);
            $table->string('color')->nullable()->default(null);
            $table->string('logo')->nullable()->default(null);
            $table->string('banner')->nullable()->default(null);
            $table->decimal('wallet_balance', 10, 6)->nullable()->default(null);
            $table->string('bank')->nullable()->default(null);
            $table->string('account_name')->nullable()->default(null);
            $table->string('account_number')->nullable()->default(null);
            $table->string('bank_code')->nullable()->default(null);
            $table->string('subaccount')->nullable()->default(null);
            $table->integer('agent_id')->unsigned()->nullable()->default(null);
            $table->integer('vendor_id')->unsigned()->nullable()->default(null);
            $table->integer('affiliate_id')->unsigned()->nullable()->default(null);
            $table->integer('availability')->default(0);
            $table->integer('status')->default(0);
            $table->integer('registration')->default(0);
            $table->timestamps();

            $table->char('country_code', 2)->nullable();
            $table->integer('region_id')->unsigned()->nullable();
            $table->integer('city_id')->unsigned()->nullable();
            
            $table->foreign('country_code')->references('code')->on('countries')->onDelete('cascade');
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');

            $table->foreign('agent_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('affiliate_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('vendor_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendors');
    }
}
