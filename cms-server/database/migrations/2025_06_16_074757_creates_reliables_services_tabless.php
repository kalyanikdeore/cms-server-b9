<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
    Schema::create('reliable_services', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->text('description');
    $table->string('image_path')->nullable();
    $table->string('background_color')->default('#ffffff'); // Added
    $table->integer('order')->default(0); 
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});

        // If you REALLY need the column order, add it as a separate statement
        // DB::statement('ALTER TABLE reliable_services MODIFY COLUMN image_path VARCHAR(255) NULL AFTER description');
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('reliable_services');
    }
};