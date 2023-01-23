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
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name',20);
            $table->string('middle_name',20)->nullable();
            $table->string('last_name',20);
            $table->string('gender',20)->nullable();
            $table->date('birthdate')->nullable();
            $table->string('marital_status',20)->nullable();
            $table->string('email',40)->nullable();
            $table->string('cellphone_number',20)->nullable();
            $table->string('occupation',100)->nullable();
            $table->string('address',100)->nullable();
            $table->string('details',100)->nullable();
            $table->string('image_name',1000)->nullable();
            $table->string('image_location',150)->nullable();
            $table->string('image_size',20)->nullable();
            $table->unsignedInteger('user_id')->nullable();
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
        Schema::dropIfExists('customers');
    }
};
