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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('company_name_np')->nullable();
            $table->string('tagline')->nullable();
            $table->string('tagline_np')->nullable();
            $table->text('about_short')->nullable();
            $table->longText('about_full')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('address_np')->nullable();
            $table->string('working_hours')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('tiktok_url')->nullable();
            $table->text('google_map_embed')->nullable();
            $table->decimal('google_map_lat', 10, 7)->nullable();
            $table->decimal('google_map_lng', 10, 7)->nullable();
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->string('logo_path')->nullable();
            $table->string('favicon_path')->nullable();
            $table->string('hero_image')->nullable();
            $table->string('hero_headline')->nullable();
            $table->string('hero_headline_np')->nullable();
            $table->string('hero_subheadline')->nullable();
            $table->string('hero_cta_text')->nullable();
            $table->string('hero_cta_link')->nullable();
            $table->longText('vision')->nullable();
            $table->longText('mission')->nullable();
            $table->json('objectives')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
