<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // Menggunakan bigIncrements secara default
            $table->string('title');
            $table->string('seotitle');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Perbaikan relasi
            $table->text('content');
            $table->string('image')->nullable()->default('noimage.jpg');
            $table->integer('hits')->default(0);
            $table->enum('active', ['Yes', 'No'])->default('Yes');
            $table->enum('status', ['publish', 'draft'])->default('publish');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
