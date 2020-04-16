<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50);
            $table->string('father_name', 50);
            $table->string('password');
            $table->string('username')->unique();
            $table->string('cnic', 16)->nullable();
            $table->char('gender', 1)->default("M");
            $table->date('dob')->nullable();
            $table->string('religion', 20)->nullable();
            $table->string('nationality', 20)->nullable();
            $table->string('image')->nullable();
            $table->integer('status');
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('users');
    }
}
