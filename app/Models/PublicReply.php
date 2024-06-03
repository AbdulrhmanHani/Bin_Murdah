<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicReply extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'publication_id',
        'public_reply_content',
        'public_reply_img',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Publication()
    {
        return $this->belongsTo(Publication::class);
    }

}
