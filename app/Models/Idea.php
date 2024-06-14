<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id'
    ];

    public function comments()
    {
        // id the foregn key and local key is standard, you don't need to mention it.
        return $this->hasMany(Comment::class, 'idea_id', 'id');
    }
}
