<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->string('type', 100);
            $table->string("image", 255)->nullable();
            $table->string('make')->nullable();
            $table->string('model');
            $table->year('year')->nullable();
            $table->string('registration', 100)->unique();
            $table->string('color', 20)->nullable();
            $table->string('chassis', 100)->nullable();
            $table->string('engine', 20)->nullable();
            $table->integer('status');
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
