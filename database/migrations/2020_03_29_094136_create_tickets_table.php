<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->unsignedInteger('passenger_id');
            $table->unsignedInteger('merchant_id');
            $table->date('issuance');
            $table->date('expiry');
            $table->string('kin_name');
            $table->string('kin_relation');
            $table->string('kin_contact');
            $table->integer('status');
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('passenger_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('merchant_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('created_by')->on('users')->references('id')->onDelete('cascade');
            $table->foreign('updated_by')->on('users')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
