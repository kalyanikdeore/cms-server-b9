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
    Schema::create('therapy_services', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->text('description');
    $table->string('icon');
    $table->string('bg_color')->default('bg-gray-50');
    $table->string('text_color')->default('text-gray-600');
    $table->string('border_color')->nullable();
    $table->integer('sort_order')->default(0);
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('therapy_services');
    }
};
