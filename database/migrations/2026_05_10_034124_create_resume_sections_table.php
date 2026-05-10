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
        Schema::create('resume_sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_type')->unique(); // profile, summary, experience, skills, education, languages, contact
            $table->string('title')->nullable();
            $table->longText('content')->nullable(); // JSON for complex data
            $table->integer('order_number')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resume_sections');
    }
};
