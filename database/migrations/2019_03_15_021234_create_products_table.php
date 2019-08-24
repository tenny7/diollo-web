<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->default(null);
            $table->bigInteger('code')->nullable();
            $table->string('slug')->nullable()->default(null);
            $table->text('description')->nullable()->default(null);
            $table->text('quick_description')->nullable()->default(null);
            $table->text('waranty')->nullable()->default(null);
            $table->tinyInteger('status')->nullable()->default(null);
            $table->decimal('qty', 10, 0)->unsigned()->nullable();
            $table->tinyInteger('is_taxable')->nullable()->default(null);
            $table->decimal('original_price', 25, 2)->unsigned()->nullable()->default(null);
            $table->decimal('discount_price', 25, 2)->unsigned()->nullable()->default(null);

            $table->string('meta_title')->nullable()->default(null);
            $table->string('meta_description')->nullable()->default(null);

            $table->integer('brand')->unsigned()->nullable()->default(null);;
            $table->integer('store')->unsigned();
            $table->integer('agent')->unsigned();

            
            $table->foreign('store')->references('id')->on('stores')->onDelete('cascade');
            $table->foreign('agent')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('brand')->references('id')->on('brands')->onDelete('cascade');
            
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
        Schema::dropIfExists('products');
    }
}
