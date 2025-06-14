<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
  Schema::create('why_choose_us', function (Blueprint $table) {
    $table->id();
    $table->string('icon_class')->nullable(); // Now it can be NULL
    $table->string('icon_color');
    $table->string('title');
    $table->text('description');
    $table->integer('sort_order')->default(0);
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});
    }

    public function down()
    {
        Schema::dropIfExists('why_choose_us');
    }
};