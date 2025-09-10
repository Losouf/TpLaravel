<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('dish_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->timestamps();

            $table->primary(['user_id', 'dish_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};
