<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::table('clients', function (Blueprint $table) {
            $table->string('logo')->nullable()->after('name');
            $table->string('website')->nullable()->after('logo');
            $table->boolean('featured')->default(false)->after('website');
        });
    }
    public function down(): void {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn(['logo','website','featured']);
        });
    }
};
