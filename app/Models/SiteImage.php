<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class SiteImage extends Model
{
    protected $fillable = [
        'section_key',
        'title',
        'description',
        'image_path',
        'fallback_url',
    ];

    /**
     * Get the publicly accessible URL for this image.
     */
    public function getUrlAttribute(): string
    {
        if (!empty($this->image_path)) {
            if (str_starts_with($this->image_path, 'http://') || str_starts_with($this->image_path, 'https://')) {
                return $this->image_path;
            }

            if (str_starts_with($this->image_path, 'images/')) {
                return asset($this->image_path);
            }

            return Storage::url($this->image_path);
        }

        return $this->fallback_url ?? asset('images/site/placeholder.jpg');
    }

    /**
     * Helper to retrieve URL for a given section_key.
     */
    public static function getUrl(string $sectionKey, string $default = ''): string
    {
        return Cache::remember("site_image_{$sectionKey}", 3600, function () use ($sectionKey, $default) {
            $image = static::query()->where('section_key', $sectionKey)->first();
            return $image ? $image->url : $default;
        });
    }
}

