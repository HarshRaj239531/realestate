<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    protected $fillable = [
        'key',
        'value',
        'label',
        'group',
        'type',
    ];

    /**
     * Retrieve a setting by its key with fallback.
     */
    public static function get(string $key, ?string $default = null): ?string
    {
        return Cache::remember("site_setting_{$key}", 3600, function () use ($key, $default) {
            $setting = static::query()->where('key', $key)->first();
            return $setting?->value ?? $default;
        });
    }

    /**
     * Store or update a setting.
     */
    public static function set(string $key, ?string $value, ?string $label = null, string $group = 'general', string $type = 'text'): self
    {
        Cache::forget("site_setting_{$key}");

        return static::updateOrCreate(
            ['key' => $key],
            [
                'value' => $value,
                'label' => $label ?? ucwords(str_replace('_', ' ', $key)),
                'group' => $group,
                'type' => $type,
            ]
        );
    }
}

