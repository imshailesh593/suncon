<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Mews\Purifier\Facades\Purifier;
class Article extends Model {
    protected $guarded = [];
    protected $casts = ['published_at' => 'date', 'published' => 'boolean', 'tags' => 'array'];
    public function getImageUrlAttribute(): string { return Project::resolveUrl($this->image); }

    public function setContentAttribute(?string $value): void
    {
        $this->attributes['content'] = $value ? Purifier::clean($value, 'article') : null;
    }
}
