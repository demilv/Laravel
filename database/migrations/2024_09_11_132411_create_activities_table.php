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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['surf', 'windsurf', 'kayak', 'atv', 'hot air balloon']);
            $table->foreignId('user_id')->constrained(
                table:'users', indexName:'posts_user_id'
            )->onDelete('cascade');
            $table->dateTime('datetime');
            $table->boolean('paid')->default(false);
            $table->text('notes');
            $table->interger('satisfaction')->default(null)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
