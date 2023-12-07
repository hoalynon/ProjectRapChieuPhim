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
        Schema::create('customer', function (Blueprint $table) {
            $table->increments('c_id');
            $table->string('cus_name', 100)->nullable();
            $table->string('cus_phone', 20)->unique()->nullable();
            $table->string('cus_addr', 100)->nullable();
            $table->string('cus_gender', 10)->nullable();
            $table->string('cus_email', 100)->unique()->nullable();
            $table->foreign('cus_email')->references('cus_email')->on('account');
            // $table->string('cus_user', 50)->nullable();
            $table->date('cus_dob')->nullable();
            $table->string('cus_type', 30)->nullable();
            $table->integer('cus_point')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
};
