<?php

use Illuminate\Support\Facades\Schema;
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
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone')->nullable()->default(null);
            $table->string('email')->unique();
            $table->date('birthday')->nullable();
            $table->string('image_path')->nullable();
            $table->string('valid_id')->nullable();
            $table->integer('status')->default(1);
            $table->integer('role')->nullable();
            $table->integer('gender')->nullable();
            $table->decimal('wallet_balance', 10, 6)->nullable()->default(null);
            $table->char('country_code', 2)->nullable();
            $table->integer('region_id')->unsigned()->nullable();
            $table->integer('city_id')->unsigned()->nullable();
            $table->text('street')->nullable()->default(null);

            $table->string('bank')->nullable()->default(null);
            $table->string('account_name')->nullable()->default(null);
            $table->string('account_number')->nullable()->default(null);
            $table->string('bank_code')->nullable()->default(null);
            $table->string('subaccount')->nullable()->default(null);
            $table->boolean('verified')->default(false);
            // $table->string('email_token')->nullable()->default(null);

            
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('delete_due_date')->nullable()->default(null);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('country_code')->references('code')->on('countries')->onDelete('cascade');
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
