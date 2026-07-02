<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Service extends Model {
    protected $guarded = [];
    protected $casts = ['features' => 'array', 'process_steps' => 'array'];
    public function getImageUrlAttribute(): string { return Project::resolveUrl($this->image); }
}
