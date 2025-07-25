<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('treatment_comparisons', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('Success Rate Comparison');
            $table->string('video_path');
            $table->string('note_title')->default('Important Note');
            $table->text('note_content');
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('treatment_comparisons');
    }
};