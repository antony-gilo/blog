<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Photo;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;
use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    use FormAccessible;

    protected $fillable = [
        'user_id',
        'photo_id',
        'category_id',
        'title',
        'body',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
