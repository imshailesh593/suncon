<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ContactSubmission extends Model {
    protected $fillable = ['name', 'email', 'phone', 'project_type', 'message', 'read', 'read_at'];
    protected $casts = ['read' => 'boolean', 'read_at' => 'datetime'];
}
