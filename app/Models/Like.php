<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $fillable = ['date',];
    protected $hidden = ['created_at', 'updated_at'];
    public function Like()
    {
    return $this->belongsTo(Post::class);
    return $this->belongsTo(User::class);
}
}