<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->text('quote_text');
            $table->string('attributed_to')->nullable(); // her name, or a person's name for testimonials
            $table->string('attributed_role')->nullable(); // e.g. "رئيس مجلس الأمة الكويتي"
            $table->string('type')->default('her_quote'); // her_quote, testimonial, general
            $table->string('context')->nullable();
            $table->string('source_name')->nullable();
            $table->string('source_url')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->unsignedInteger('sort_order')->default(0);
            $table->string('status')->default('published');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
