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
       Schema::create('departments', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->text('content');
    $table->string('icon');
    $table->string('image');
    $table->boolean('is_active')->default(true); // Will naturally come after image
    $table->integer('sort_order')->default(0);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments_tabless');
    }
};
