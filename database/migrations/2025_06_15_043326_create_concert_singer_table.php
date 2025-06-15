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
    Schema::create('concert_singer', function (Blueprint $table) {
      $table->foreignId('concert_id')->constrained()->onDelete('cascade');
      $table->foreignId('singer_id')->constrained()->onDelete('cascade');
      $table->timestamps();

      $table->primary(['concert_id', 'singer_id']);
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('concert_singer');
  }
};
