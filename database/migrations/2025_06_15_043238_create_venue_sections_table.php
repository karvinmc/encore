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
    Schema::create('venue_sections', function (Blueprint $table) {
      $table->id();
      $table->foreignId('venue_id')->constrained()->onDelete('cascade');
      $table->string('name');
      $table->enum('type', ['seated', 'standing']);
      $table->integer('capacity');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('venue_sections');
  }
};
