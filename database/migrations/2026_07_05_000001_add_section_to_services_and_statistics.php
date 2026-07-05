<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('section')->default('general')->after('sort_order');
            $table->string('formats')->nullable()->after('long_description');
        });

        Schema::table('statistics', function (Blueprint $table) {
            $table->string('section')->default('general')->after('sort_order');
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['section', 'formats']);
        });

        Schema::table('statistics', function (Blueprint $table) {
            $table->dropColumn('section');
        });
    }
};
