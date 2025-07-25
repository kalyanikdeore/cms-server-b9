<?php

// database/migrations/[timestamp]_create_comparison_items_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('comparison_items', function (Blueprint $table) {
            $table->id();
            $table->string('feature');
            $table->string('traditional');
            $table->string('b9');
            $table->integer('sort_order')->default(0);
            $table->boolean('show_icons')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('comparison_items');
    }
};