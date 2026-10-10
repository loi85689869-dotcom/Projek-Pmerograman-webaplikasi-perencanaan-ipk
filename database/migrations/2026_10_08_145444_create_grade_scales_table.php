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
        Schema::create('grade_scales', function (Blueprint $table) {
    $table->id();
    $table->string('nilai', 2);
    $table->decimal('bobot', 3, 2);
    $table->decimal('nilai_min', 5, 2)->nullable();
    $table->decimal('nilai_max', 5, 2)->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grade_scales');
    }
};
