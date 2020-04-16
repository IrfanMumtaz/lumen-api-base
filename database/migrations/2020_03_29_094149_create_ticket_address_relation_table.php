<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketAddressRelationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('ticket_id');
            $table->unsignedInteger('address_id');
            $table->boolean('pickup');
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('ticket_id')->on('tickets')->references('id')->onDelete('cascade');
            $table->foreign('address_id')->on('addresses')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('ticket_addresses');
    }
}
