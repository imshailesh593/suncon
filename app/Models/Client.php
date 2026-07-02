<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Client extends Model {
    protected $guarded = [];
    protected $casts = ['featured' => 'boolean'];
    public function getLogoUrlAttribute(): string { return Project::resolveUrl($this->logo); }
}
