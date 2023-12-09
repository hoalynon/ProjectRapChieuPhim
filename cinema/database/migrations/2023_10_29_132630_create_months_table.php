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
        Schema::create('months', function (Blueprint $table) {
            $table->string('mre_id', 10);
            $table->integer('mre_month');
            $table->string('mre_yre_id', 10);
            $table->integer('mre_count');
            $table->decimal('mre_value', 15, 2, true);
            $table->primary(['mre_id', 'mre_yre_id']);
            $table->foreign('mre_yre_id')->references('yre_id')->on('years');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('months');
    }
};
