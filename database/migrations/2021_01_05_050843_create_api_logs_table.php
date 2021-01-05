<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApiLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ip');
            $table->enum('method', ['get', 'post', 'put', 'patch', 'delete']);
            $table->string('url');
            $table->text('header');
            $table->text('request');
            $table->text('response');
            $table->enum('bound', ['in', 'out']);
            $table->float('duration');
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
        Schema::dropIfExists('api_logs');
    }
}
