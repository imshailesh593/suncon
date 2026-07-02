<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::table('services', function (Blueprint $table) {
            $table->string('icon')->nullable()->after('image');
            $table->json('process_steps')->nullable()->after('features');
            $table->string('tagline')->nullable()->after('title');
        });
    }
    public function down(): void {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['icon','process_steps','tagline']);
        });
    }
};
