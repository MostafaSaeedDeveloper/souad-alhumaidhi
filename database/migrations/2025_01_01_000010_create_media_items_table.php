<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('media_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('channel')->nullable();
            $table->string('category')->default('interview');
            $table->string('youtube_url')->nullable();
            $table->string('youtube_id')->nullable();
            $table->string('thumbnail_url')->nullable();
            $table->date('published_at')->nullable();
            $table->string('duration')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->foreignId('source_id')->nullable()->constrained('sources')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media_items');
    }
};
