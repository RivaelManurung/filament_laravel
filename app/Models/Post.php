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
        // This assumes your posts table has a 'user_id' column.
        // If the column name is 'author_id', you would use:
        // return $this->belongsTo(User::class, 'author_id');
        return $this->belongsTo(User::class, 'user_id');
    }
}
