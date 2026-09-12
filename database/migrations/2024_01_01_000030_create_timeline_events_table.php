<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('timeline_events', function (Blueprint $table) {
            $table->id();
            $table->string('year');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('icon')->default('bi-flag');
            $table->string('source_name')->nullable();
            $table->string('source_url')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->unsignedInteger('sort_order')->default(0);
            $table->string('status')->default('published'); // draft, published
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('timeline_events');
    }
};
