<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateContainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('containers', function (Blueprint $table) {
             $table->id();
             $table->string('serial');
             $table->integer('number');
             $table->string('image')->nullable();
             $table->string('tags');
             
             $table->integer('capacity_id')->unsigned();
             $table->foreign('capacity_id')->references('id')->on('capacities')->onDelete('cascade');
             
             $table->integer('color_id')->unsigned();
             $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');

             $table->integer('status_id')->unsigned()->default(3);
             $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
             
             $table->integer('user_id')->unsigned();
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
             $table->integer('district_id')->unsigned();
             $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
             
             $table->integer('type_container_id')->unsigned();
             $table->foreign('type_container_id')->references('id')->on('containers')->onDelete('cascade');

             $table->integer('localization_id')->unsigned();
             $table->foreign('localization_id')->references('id')->on('localizations')->onDelete('cascade');
            
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
        Schema::dropIfExists('containers');
    }
}
