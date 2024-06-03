<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'creator_name',
        'title',
        'content',
        'user_id',
        'img'
    ];

    public function Replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

}
