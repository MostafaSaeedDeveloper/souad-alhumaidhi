<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('biographies', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('title')->nullable(); // e.g. "سيدة أعمال سعودية رائدة"
            $table->string('birth_year')->nullable();
            $table->string('death_year')->nullable();
            $table->string('nationality')->nullable();
            $table->string('image')->nullable();
            $table->text('intro')->nullable(); // short summary for hero/cards
            $table->longText('early_life')->nullable();
            $table->longText('career')->nullable();
            $table->longText('contributions')->nullable(); // human/social side
            $table->longText('honors')->nullable();
            $table->longText('full_content')->nullable(); // rich biography body
            $table->string('source_name')->nullable();
            $table->string('source_url')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('biographies');
    }
};
