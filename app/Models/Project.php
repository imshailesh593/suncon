<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Project extends Model {
    protected $guarded = [];
    protected $casts = ['featured' => 'boolean', 'gallery' => 'array'];
}
