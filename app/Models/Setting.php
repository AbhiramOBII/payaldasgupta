<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];

    // ── Static helpers ────────────────────────────────────────────────────────

    /** Retrieve a setting value by key, with an optional default. */
    public static function get(string $key, mixed $default = null): mixed
    {
        return static::where('key', $key)->value('value') ?? $default;
    }

    /** Upsert a single setting. */
    public static function set(string $key, mixed $value): void
    {
        static::updateOrCreate(['key' => $key], ['value' => $value]);
    }

    /** Upsert many settings at once from a key => value array. */
    public static function setMany(array $data): void
    {
        foreach ($data as $key => $value) {
            static::set($key, $value);
        }
    }

    /** Return all settings as a key => value array. */
    public static function allKeyed(): array
    {
        return static::pluck('value', 'key')->toArray();
    }
}
