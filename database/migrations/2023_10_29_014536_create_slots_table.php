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
        Schema::create('slots', function (Blueprint $table) {
            $table->string('sl_id', 10);
            $table->string('r_id', 10);
            $table->string('mv_id', 10);
            $table->time('mv_duration');
            $table->datetime('sl_start');
            $table->datetime('sl_end');
            $table->decimal('sl_price', 15, 2, true);
            $table->primary(['sl_id', 'r_id', 'mv_id']);
            $table->foreign('r_id')->references('r_id')->on('rooms');
            $table->foreign('mv_id')->references('mv_id')->on('movies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slots');
    }
};
