<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['ville','description', 'image', 'date'];
    protected $hidden = ['created_at', 'updated_at'];

    
    public function user()
    {
    return $this->belongsTo(User::class);
    }


    public function comment()
    {
    return $this->belongsTo(Comment::class);
    }

    public function likes()
    {
    return $this->hasMany(Like::class);
    }
    
}
