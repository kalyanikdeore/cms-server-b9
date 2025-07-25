<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('therapy_platforms', function (Blueprint $table) {
            $table->id();
            $table->string('tab_name'); // e.g., "technology"
            $table->string('feature_name');
            $table->text('feature_description');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('therapy_platforms');
    }
};