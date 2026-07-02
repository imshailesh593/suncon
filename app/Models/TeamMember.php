<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class TeamMember extends Model {
    protected $guarded = [];
    protected $casts = ['qualifications' => 'array'];
    public function getImageUrlAttribute(): string { return Project::resolveUrl($this->image); }
}
