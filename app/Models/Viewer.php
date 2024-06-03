<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viewer extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'publication_id',
        'viewer_content',
        'img',
    ];

    public function Publication()
    {
        return $this->belongsTo(Publication::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

}
