<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'fullName',
        'email',
        'password',
        'profile_picture',
    ];

    protected $hidden = [
        'password',
    ];

    // public function posts()
    // {
    //     return $this->hasMany(Post::class);
    // }
}
