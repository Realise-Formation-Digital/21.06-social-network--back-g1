<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name', 
        'password',
        'email'
    ];

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