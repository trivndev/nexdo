<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('todolists', function (Blueprint $table) {
            $table->id();
            $table->string("title", 255);
            $table->string("description");

            $table->unsignedTinyInteger('priority_id');
            $table->unsignedTinyInteger('urgency_id');
            $table->unsignedTinyInteger('category_id');
            $table->unsignedTinyInteger('status_id');
            $table->foreign("priority_id")
                ->references('id')
                ->on('todolist_priorities')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreign("category_id")
                ->references('id')
                ->on('todolist_categories')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreign("urgency_id")
                ->references('id')
                ->on('todolist_urgencies')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreign("status_id")
                ->references('id')
                ->on('todolist_statuses')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->dateTime("due_date");
            $table->index(['priority_id', 'urgency_id', 'status_id', 'category_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todolists');
    }
};
