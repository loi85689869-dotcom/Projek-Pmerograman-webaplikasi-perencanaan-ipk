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
       Schema::create('courses', function (Blueprint $table) {
    $table->id();
    $table->foreignId('semester_id')->constrained()->cascadeOnDelete();
    $table->string('kode_mata_kuliah');
    $table->string('nama_mata_kuliah');
    $table->unsignedTinyInteger('sks');
    $table->string('nilai', 2)->nullable();
    $table->decimal('bobot', 3, 2)->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
