<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedInteger('book_id');
            $table->unsignedInteger('item_id');
            $table->unsignedInteger('branch_id');
            $table->string('interest_by', 10);
            $table->string('bir');
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('karat')->nullable();
            $table->string('weight')->nullable();
            $table->unsignedInteger('gross_amount')->nullable();
            $table->unsignedInteger('net_amount')->nullable();
            $table->unsignedInteger('net_amount_duplicate')->nullable();
            $table->string('status')->nullable();
            $table->string('details', 255)->nullable();
            $table->string('image_name',1000)->nullable();
            $table->string('image_location',150)->nullable();
            $table->string('image_size',20)->nullable();
            $table->string('id_presented', 55)->nullable();
            $table->unsignedInteger('user_id');
            $table->timestamps();

            $table->index('customer_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
