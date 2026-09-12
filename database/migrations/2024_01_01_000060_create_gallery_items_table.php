<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gallery_items', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('alt');
            $table->string('caption')->nullable();
            $table->string('image');
            $table->string('category')->default('general'); // meetings, events, honors, portraits, occasions, archive
            $table->string('source_name')->nullable();
            $table->string('source_url')->nullable();
            $table->string('copyright_note')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->unsignedInteger('sort_order')->default(0);
            $table->string('status')->default('published');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gallery_items');
    }
};
