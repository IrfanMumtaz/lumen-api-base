<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('addresses', function (Blueprint $table) {
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
        });

        Schema::table('vehicles', function (Blueprint $table) {
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('departments', function (Blueprint $table) {
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('designations', function (Blueprint $table) {
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('merchants', function (Blueprint $table) {
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('cities', function (Blueprint $table) {
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
        });

        Schema::table('countries', function (Blueprint $table) {
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('booths', function (Blueprint $table) {
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('merchant_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
        });

        Schema::table('states', function (Blueprint $table) {
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
        });

        Schema::table('employees', function (Blueprint $table) {
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('designation_id')->references('id')->on('designations')->onDelete('cascade');
        });

        Schema::table('passengers', function (Blueprint $table) {
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    /* public function down()
    {
        Schema::table('users', function(Blueprint $table){
            $table->dropForeign('users_created_by_foreign');
            $table->dropForeign('users_updated_by_foreign');
        });

        Schema::table('contacts', function(Blueprint $table){
            $table->dropForeign('contacts_created_by_foreign');
            $table->dropForeign('contacts_updated_by_foreign');
        });

        Schema::table('addresses', function(Blueprint $table){
            $table->dropForeign('addresses_created_by_foreign');
            $table->dropForeign('addresses_updated_by_foreign');
            $table->dropForeign('addresses_city_id_foreign');
            $table->dropForeign('addresses_state_id_foreign');
            $table->dropForeign('addresses_country_id_foreign');
        });

        Schema::table('vehicles', function(Blueprint $table){
            $table->dropForeign('vehicles_created_by_foreign');
            $table->dropForeign('vehicles_updated_by_foreign');
        });

        Schema::table('departments', function(Blueprint $table){
            $table->dropForeign('departments_created_by_foreign');
            $table->dropForeign('departments_updated_by_foreign');
        });

        Schema::table('designations', function(Blueprint $table){
            $table->dropForeign('designations_created_by_foreign');
            $table->dropForeign('designations_updated_by_foreign');
        });

        Schema::table('merchants', function(Blueprint $table){
            $table->dropForeign('merchants_created_by_foreign');
            $table->dropForeign('merchants_updated_by_foreign');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('cities', function(Blueprint $table){
            $table->dropForeign('cities_created_by_foreign');
            $table->dropForeign('cities_updated_by_foreign');
            $table->dropForeign('cities_state_id_foreign');
            $table->dropForeign('cities_country_id_foreign');
        });

        Schema::table('countries', function(Blueprint $table){
            $table->dropForeign('countries_created_by_foreign');
            $table->dropForeign('countries_updated_by_foreign');
        });

        Schema::table('booths', function(Blueprint $table){
            $table->dropForeign('booths_created_by_foreign');
            $table->dropForeign('booths_updated_by_foreign');
            $table->dropForeign('booths_merchant_id_foreign');
            $table->dropForeign('booths_address_id_foreign');
            $table->dropForeign('booths_contact_id_foreign');
        });

        Schema::table('states', function(Blueprint $table){
            $table->dropForeign('states_created_by_foreign');
            $table->dropForeign('states_updated_by_foreign');
            $table->dropForeign('states_country_id_foreign');
        });

        Schema::table('employees', function(Blueprint $table){
            $table->dropForeign('employees_created_by_foreign');
            $table->dropForeign('employees_updated_by_foreign');
            $table->dropForeign('employees_user_id_foreign');
            $table->dropForeign('employees_department_id_foreign');
            $table->dropForeign('employees_designation_id_foreign');
        });

        Schema::table('passengers', function(Blueprint $table){
            $table->dropForeign('passengers_created_by_foreign');
            $table->dropForeign('passengers_updated_by_foreign');
            $table->dropForeign('passengers_user_id_foreign');
        });
    } */
}
