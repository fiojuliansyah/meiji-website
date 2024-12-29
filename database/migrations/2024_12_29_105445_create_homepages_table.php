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
        Schema::create('homepages', function (Blueprint $table) {
            $table->id();
            $table->json('about_title');
            $table->json('about_content');
            $table->string('about_link');
            $table->json('randd_title');
            $table->json('randd_content');
            $table->json('doctor_title');
            $table->json('doctor_content');
            $table->string('doctor_link');
            $table->string('news_section')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepages');
    }
};
