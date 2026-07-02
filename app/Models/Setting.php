<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model {
    protected $guarded = [];

    public static function get(string $key, mixed $default = null): mixed {
        return Cache::rememberForever("setting_{$key}", function () use ($key, $default) {
            return static::where('key', $key)->value('value') ?? $default;
        });
    }

    public static function set(string $key, mixed $value): void {
        static::updateOrCreate(['key' => $key], ['value' => $value]);
        Cache::forget("setting_{$key}");
    }

    public static function setMany(array $data): void {
        foreach ($data as $key => $value) {
            static::set($key, $value);
        }
    }

    public static function getGroup(string $prefix): array {
        return static::where('key', 'like', $prefix.'%')
            ->pluck('value', 'key')
            ->toArray();
    }
}
