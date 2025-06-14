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
    Schema::create('about_nature_therapies', function (Blueprint $table) {
    $table->id();
    $table->string('title')->nullable();
    $table->text('subtitle');
    $table->text('description');
    $table->string('button_text')->default('Read more →');
    $table->string('button_link')->default('/process');
    $table->string('video_path')->nullable();
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_nature_therapies');
    }
};
