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
        Schema::create('tickets', function (Blueprint $table) {
            $table->string('tk_id', 10);
            $table->string('mv_id', 10)->nullable(false);
            $table->string('sl_id', 10);
            $table->string('r_id', 10)->nullable(false);
            $table->decimal('tk_value', 15, 2, true);
            $table->string('st_id', 10);
            $table->string('tk_type', 20);
            $table->string('bi_id', 10);
            $table->integer('tk_available');

            $table->primary(['tk_id', 'sl_id', 'st_id']);
            $table->foreign(['sl_id','r_id','mv_id'])->references(['sl_id','r_id','mv_id'])->on('slots');
            $table->foreign(['st_id','r_id'])->references(['st_id','r_id'])->on('seats');
            $table->foreign('bi_id')->references('bi_id')->on('bills');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
