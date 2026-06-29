<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('discipline'); // architecture | interior | urban
            $table->string('location');
            $table->string('year', 4);
            $table->string('image');
            $table->text('description');
            $table->string('area')->nullable();
            $table->string('client')->nullable();
            $table->json('gallery')->nullable();
            $table->boolean('featured')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('projects'); }
};
