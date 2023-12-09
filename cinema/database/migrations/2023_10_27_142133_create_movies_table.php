
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
        Schema::create('movies', function (Blueprint $table) {

            $table->string('mv_id', 50)->primary();
            $table->string('mv_name', 100)->nullable(false);
            $table->date('mv_start')->nullable(false);
            $table->date('mv_end')->nullable(false);
            $table->time('mv_duration')->nullable(false);
            $table->string('mv_restrict', 10)->nullable(false);
            $table->string('mv_cap', 20)->nullable(false);
            $table->string('mv_link_poster', 500)->nullable(false);
            $table->string('mv_link_trailer', 500)->nullable(false);
            $table->string('mv_detail', 500);
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};