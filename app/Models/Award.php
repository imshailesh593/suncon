<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Award extends Model {
    protected $guarded = [];
    protected $casts = ['published' => 'boolean'];
    public function getImageUrlAttribute(): string { return Project::resolveUrl($this->image); }
}
