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
        Schema::create('apply_discounts', function (Blueprint $table) {
            $table->string('dis_id', 10);
            $table->string('bi_id', 10);
            $table->primary(['dis_id', 'bi_id']);
            $table->foreign('dis_id')->references('dis_id')->on('discounts');
            $table->foreign('bi_id')->references('bi_id')->on('bills')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apply_discounts');
    }
};
