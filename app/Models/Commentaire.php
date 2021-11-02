<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['commentaire',];
    protected $hidden = ['created_at', 'updated_at'];
    public function User()
    {
    return $this->belongsTo(User::class);
    return $this->belongsTo(Post::class);

}
}