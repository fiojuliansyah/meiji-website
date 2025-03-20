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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('news_category_id');
            $table->string('image');
            $table->json('slug');
            $table->json('name');
            $table->json('content');
            $table->date('date_published')->nullable();
            $table->date('end_date')->nullable();
            $table->string('user_id')->nullable();
            $table->string('is_published')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
