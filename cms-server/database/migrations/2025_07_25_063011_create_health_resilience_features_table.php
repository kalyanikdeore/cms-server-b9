<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('health_resilience_features', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('video_path')->nullable();
            $table->string('section_title')->default('Holistic Health Resilience Solutions');
            $table->text('section_description')->default('Our Resilience services are designed to support your physical, mental, and emotional well-being. Explore the key features below.');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('health_resilience_features');
    }
};