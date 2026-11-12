<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Property extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'tagline',
        'description',
        'property_type',
        'status',
        'price',
        'price_display',
        'location',
        'city',
        'state',
        'address',
        'bedrooms',
        'bathrooms',
        'area_sqft',
        'parking_spaces',
        'is_featured',
        'is_eco_friendly',
        'main_image',
        'gallery_images',
        'amenities',
        'contact_phone',
        'contact_email',
        'is_approved',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'bedrooms' => 'integer',
            'bathrooms' => 'integer',
            'area_sqft' => 'integer',
            'parking_spaces' => 'integer',
            'is_featured' => 'boolean',
            'is_eco_friendly' => 'boolean',
            'is_approved' => 'boolean',
            'gallery_images' => 'array',
            'amenities' => 'array',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (self $property) {
            if (empty($property->slug)) {
                $property->slug = Str::slug($property->title) . '-' . Str::random(5);
            }
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function inquiries(): HasMany
    {
        return $this->hasMany(Inquiry::class);
    }

    /**
     * Get the public URL for main property image.
     */
    public function getMainImageUrlAttribute(): string
    {
        if (empty($this->main_image)) {
            return 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=80';
        }

        if (str_starts_with($this->main_image, 'http://') || str_starts_with($this->main_image, 'https://')) {
            return $this->main_image;
        }

        if (str_starts_with($this->main_image, 'images/')) {
            return asset($this->main_image);
        }

        return Storage::url($this->main_image);
    }

    /**
     * Get array of full image URLs including gallery.
     */
    public function getAllImagesAttribute(): array
    {
        $images = [$this->main_image_url];
        if (is_array($this->gallery_images)) {
            foreach ($this->gallery_images as $img) {
                if (!empty($img)) {
                    if (str_starts_with($img, 'http://') || str_starts_with($img, 'https://')) {
                        $images[] = $img;
                    } elseif (str_starts_with($img, 'images/')) {
                        $images[] = asset($img);
                    } else {
                        $images[] = Storage::url($img);
                    }
                }
            }
        }
        return $images;
    }
}

