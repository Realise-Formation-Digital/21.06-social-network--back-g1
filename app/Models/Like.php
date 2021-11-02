<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $fillable = ['user'];
    protected $hidden = ['created_at', 'updated_at'];
    public function User()
 {
    return $this->belongsTo(user::class);
 }

 public function post()
 {
    return $this->belongsTo(Post::class);
 }
}