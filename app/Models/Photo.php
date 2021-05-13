<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
    ];

    protected $path = '/images/';

    public function user()
    {
        return $this->hasOne('App/Models/User');
    }

    public function getPathAttribute($photo)
    {
        return $this->path . $photo;
    }
}
