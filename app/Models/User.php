<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'is_online',
        'can',
        'NOTE',
        'phone',
        'allPower',
        'typePower',
        'userPower',
        'delegatePower',
        'rankPower',
        'continuePower',
        'standingPower',
        'notePower',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function Posts()
    {
        return $this->hasMany(Post::class);
    }

    public function Viewers()
    {
        return $this->hasMany(Viewer::class);
    }

    public function Publication()
    {
        return $this->hasMany(Publication::class);
    }

    public function PublicReplies()
    {
        return $this->hasMany(PublicReply::class);
    }

}
