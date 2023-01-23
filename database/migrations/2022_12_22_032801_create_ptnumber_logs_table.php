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
        Schema::create('ptnumber_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('transaction_payment_id');
            $table->string('ptnumber_old');
            $table->string('ptnumber_new');
            $table->string('details', 255);
            $table->unsignedInteger('user_id');
            $table->timestamps();

            $table->index('transaction_payment_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ptnumber_logs');
    }
};
