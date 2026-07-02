<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Project extends Model {
    protected $guarded = [];
    protected $casts = ['featured' => 'boolean', 'gallery' => 'array'];

    public function getImageUrlAttribute(): string { return self::resolveUrl($this->image); }

    public static function resolveUrl(?string $path): string {
        if (!$path) return '';
        if (str_starts_with($path, 'http') || str_starts_with($path, '/')) return $path;
        if (str_starts_with($path, 'images/')) return asset($path);
        return asset('storage/'.$path);
    }
}
