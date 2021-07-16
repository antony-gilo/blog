<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CommentReply;
use App\Models\Post;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'author',
        'author_email',
        'body',
    ];

    public function replies()
    {
        return $this->hasMany(CommentReply::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
