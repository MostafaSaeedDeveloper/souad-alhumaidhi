<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('timeline_events', function (Blueprint $table) {
            $table->string('image')->nullable()->after('icon');
        });

        Schema::table('quotes', function (Blueprint $table) {
            $table->string('image')->nullable()->after('quote_text');
        });
    }

    public function down(): void
    {
        Schema::table('timeline_events', function (Blueprint $table) {
            $table->dropColumn('image');
        });

        Schema::table('quotes', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
};
