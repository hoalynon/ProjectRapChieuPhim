<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->string('cus_id', 10)->primary();
            $table->string('cus_name', 100);
            $table->string('cus_phone', 20)->unique();
            $table->string('cus_gender', 10);
            $table->string('cus_email', 50)->unique()->nullable(false);
            $table->date('cus_dob');
            $table->string('cus_type', 30)->nullable(false);
            $table->integer('cus_point');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
