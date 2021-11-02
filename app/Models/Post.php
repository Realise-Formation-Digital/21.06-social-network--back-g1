<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password',];
    protected $hidden = ['created_at', 'updated_at'];
    public function User()
    {
    return $this->belongsTo(User::class);
}
}