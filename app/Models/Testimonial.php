<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Testimonial extends Model {
    protected $guarded = [];
    protected $casts = ['published' => 'boolean'];
    public function project() { return $this->belongsTo(Project::class); }
    public function getImageUrlAttribute(): string { return Project::resolveUrl($this->image); }
}
