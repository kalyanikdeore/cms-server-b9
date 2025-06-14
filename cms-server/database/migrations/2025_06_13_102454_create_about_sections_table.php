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
    Schema::create('about_sections', function (Blueprint $table) {
    $table->id();
    $table->string('main_image'); // Changed from 'image' to 'main_image'
    $table->string('scientist_image'); // Added missing column
    $table->string('title');
    $table->text('content'); // Added missing content column
    $table->unsignedInteger('sort_order')->default(0);
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_sections');
    }
};
