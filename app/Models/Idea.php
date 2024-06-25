<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'idea_like')->withTimestamps();
    }

    public function scopeSearch(Builder $query, $search = ''): void
    {
        $query->where('content', 'like', '%' . $search . '%');
    }
}
