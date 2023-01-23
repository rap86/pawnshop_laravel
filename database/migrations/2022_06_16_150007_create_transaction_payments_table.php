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
        Schema::create('transaction_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('transaction_id');
            $table->integer('ptnumber');
            $table->string('prefix')->nullable();
            $table->date('payment_startdate');
            $table->integer('add_charge_amount')->nullable();
            $table->integer('less_charge_amount')->nullable();
            $table->integer('less_partial_amount')->nullable();
            $table->integer('add_principal_amount')->nullable();
            $table->integer('percent_interest')->nullable();
            $table->integer('add_percent_amount')->nullable();
            $table->integer('add_service_charge')->nullable();
            $table->integer('total_amount')->nullable();
            $table->date('payment_enddate')->nullable();
            $table->string('status')->nullable();
            $table->string('paid')->nullable();
            $table->string('details', 255)->nullable();
            $table->string('ornumber')->nullable();
            $table->unsignedInteger('user_id_who_create_pt');
            $table->unsignedInteger('user_id_who_renew_pt');
            $table->timestamps();

            $table->index('transaction_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_payments');
    }
};
