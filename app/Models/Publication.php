<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'publish_title',
        'publish_content',
        'publish_img',
    ];

    public function Viewers()
    {
        return $this->hasMany(Viewer::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function PublicReplies()
    {
        return $this->hasMany(PublicReply::class);
    }

}
