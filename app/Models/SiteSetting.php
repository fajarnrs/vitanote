<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'type',
        'group',
    ];

    /**
     * Get a setting value by key with caching.
     */
    public static function get(string $key, $default = null)
    {
        return Cache::remember("setting_{$key}", 3600, function () use ($key, $default) {
            $setting = self::where('key', $key)->first();
            if (! $setting) {
                return $default;
            }

            // Decode JSON values automatically when type is json
            if ($setting->type === 'json') {
                $decoded = json_decode($setting->value, true);
                return $decoded === null && json_last_error() !== JSON_ERROR_NONE
                    ? $default
                    : $decoded;
            }

            return $setting->value;
        });
    }

    /**
     * Set a setting value.
     */
    public static function set(string $key, $value, string $type = 'text', string $group = 'general')
    {
        // Automatically encode arrays/objects as JSON
        if (is_array($value) || is_object($value) || $type === 'json') {
            $type = 'json';
            $value = json_encode($value, JSON_UNESCAPED_UNICODE);
        }

        $setting = self::updateOrCreate(
            ['key' => $key],
            [
                'value' => $value,
                'type' => $type,
                'group' => $group,
            ]
        );

        Cache::forget("setting_{$key}");

        return $setting;
    }

    /**
     * Clear all settings cache.
     */
    public static function clearCache()
    {
        Cache::flush();
    }
}