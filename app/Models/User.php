<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'password'];

    public function commentaire()
    {
    return $this->HasMany(Commentaire::class);
    }

    public function like()
    {
    return $this->HasMany(Like::class);
    }

    public function post()
    {
    return $this->HasMany(Post::class);
    }


}