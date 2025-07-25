<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('contact_settings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('Contact Us');
            $table->text('address');
            $table->string('phone');
            $table->string('email');
            $table->string('working_hours');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contact_settings');
    }
};