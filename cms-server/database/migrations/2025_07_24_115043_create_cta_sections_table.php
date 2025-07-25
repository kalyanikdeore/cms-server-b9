<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cta_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('subtitle');
            $table->string('badge_text')->default('Limited Availability');
            $table->string('button_text')->default('Begin Your Journey');
            $table->string('background_image');
            $table->string('overlay_image');
            $table->text('disclaimer');
            $table->text('results_note');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cta_sections');
    }
};