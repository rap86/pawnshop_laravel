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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('book_code');
            $table->unsignedInteger('month_before_remata');
            $table->unsignedInteger('allowance_day_for_interest');
            $table->string('deduct_first_month', 20);
            $table->unsignedInteger('service_charge_granted');
            $table->unsignedInteger('service_charge_redeem');
            $table->unsignedInteger('service_charge_renew');
            $table->float('doc_stamp_interest', 8, 2);
            $table->unsignedInteger('first_month_interest');
            $table->string('details', 100);
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
        Schema::dropIfExists('books');
    }
};
