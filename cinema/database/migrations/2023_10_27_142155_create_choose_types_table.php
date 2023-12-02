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
        Schema::create('choose_types', function (Blueprint $table) {
            $table->string('type_id', 50);
            $table->string('mv_id', 50);
            $table->primary(['type_id', 'mv_id']);
            $table->foreign('type_id')->references('type_id')->on('types');
            $table->foreign('mv_id')->references('mv_id')->on('movies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('choose_types');
    }
};
