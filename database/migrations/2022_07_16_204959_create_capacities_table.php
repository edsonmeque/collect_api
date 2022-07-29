<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapacitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capacities', function (Blueprint $table) {
            $table->id();
            $table->double('peoples_number', 10, 2);
            $table->double('capacity_storege', 10, 2);
            $table->double('generated_capitetion', 10, 2);
            $table->double('peso', 10, 2);
            $table->double('capacityToday', 10, 2);
            $table->double('capacity_max', 10, 2);
            $table->integer('dias');
            
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
        Schema::dropIfExists('capacities');
    }
}
