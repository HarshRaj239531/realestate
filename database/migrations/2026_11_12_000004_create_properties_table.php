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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('tagline')->nullable();
            $table->longText('description');
            $table->string('property_type'); // villa, apartment, plot, commercial, penthouse
            $table->string('status')->default('for_sale'); // for_sale, for_rent, sold
            $table->decimal('price', 14, 2);
            $table->string('price_display'); // e.g. "₹ 1.85 Cr", "₹ 65,000 / mo"
            $table->string('location'); // Area / Locality
            $table->string('city')->default('Gurugram');
            $table->string('state')->default('Haryana');
            $table->text('address')->nullable();
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->integer('area_sqft');
            $table->integer('parking_spaces')->default(1);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_eco_friendly')->default(false);
            $table->string('main_image');
            $table->json('gallery_images')->nullable();
            $table->json('amenities')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_email')->nullable();
            $table->boolean('is_approved')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};

