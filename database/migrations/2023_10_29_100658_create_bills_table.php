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
        Schema::create('bills', function (Blueprint $table) {
            $table->string('bi_id', 10)->primary();
            $table->string('cus_id', 10)->nullable(false);
            $table->datetime('bi_date');
            $table->integer('tk_count');
            $table->decimal('bi_value', 15, 2, true);
            $table->foreign('cus_id')->references('cus_id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
