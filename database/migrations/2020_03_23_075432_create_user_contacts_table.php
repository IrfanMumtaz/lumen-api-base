<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('contact_id');
            $table->boolean('primary');
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade');
            $table->foreign('contact_id')->on('contacts')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('user_contacts');
    }
}
