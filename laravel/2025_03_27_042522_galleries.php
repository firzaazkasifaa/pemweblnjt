<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('album_id')->constrained('albums')->onDelete('cascade'); // ✅ Perbaikan di sini
            $table->string('title');
            $table->string('seotitle');
            $table->string('image');
            $table->enum('active', ['Yes','No'])->default('Yes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
