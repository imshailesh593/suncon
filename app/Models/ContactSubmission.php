<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ContactSubmission extends Model {
    protected $guarded = [];
    protected $casts = ['read' => 'boolean', 'read_at' => 'datetime'];
}
