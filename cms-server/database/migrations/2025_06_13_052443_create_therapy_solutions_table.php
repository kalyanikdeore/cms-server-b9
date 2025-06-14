<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('therapy_solutions', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(); // Make nullable for the main settings record
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->string('heading')->nullable();
            $table->text('subheading')->nullable();
            $table->string('youtube_video_id')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('therapy_solutions');
    }
};