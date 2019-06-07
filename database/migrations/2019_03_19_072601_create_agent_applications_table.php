<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_applications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable()->default(null);
            $table->string('computer_use')->nullable();
            $table->text('interest')->nullable();
            $table->text('method')->nullable();
            $table->text('relationship')->nullable();
            $table->text('objection')->nullable();
            $table->text('photo')->nullable();
            $table->text('recognition')->nullable();
            $table->integer('status')->nullable()->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agent_applications');
    }
}
