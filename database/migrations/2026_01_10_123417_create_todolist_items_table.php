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
        Schema::create('todolist_items', function (Blueprint $table) {
            $table->id();

            $table->string("title", 64);
            $table->string("short_description", 128);

            $table->foreignUuid('group_id')->constrained('todolist_groups');

            $table->unsignedTinyInteger('priority_id');
            $table->unsignedTinyInteger('status_id');

            $table->foreign("priority_id")
                ->references('id')
                ->on('todolist_priorities')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreign("status_id")
                ->references('id')
                ->on('todolist_statuses')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->dateTime("due_date");

            $table->index(['priority_id', 'status_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todolist_items');
    }
};
