<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('todolist_groups', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title', 64);
            $table->string('description', 255);

            $table->unsignedTinyInteger('category_id');

            $table->foreign('category_id')
            ->references('id')
            ->on('todolist_categories')
            ->cascadeOnUpdate()
            ->restrictOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todolist_groups');
    }
};
