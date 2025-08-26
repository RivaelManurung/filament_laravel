<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'content',
        'is_published',
    ];
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
