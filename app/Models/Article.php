<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Article extends Model {
    protected $guarded = [];
    protected $casts = ['published_at' => 'date', 'published' => 'boolean', 'tags' => 'array'];
    public function getImageUrlAttribute(): string { return Project::resolveUrl($this->image); }
}
