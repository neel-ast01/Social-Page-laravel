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
        'profile_link', 'bio',
    ];

    protected $hidden = [
        'password',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }




    public function isFollowing(User $user)
    {
        return $this->follows()->where('followed_user_id', $user->id)->exists();
    }

    public function follow(User $user)
    {
        if (!$this->isFollowing($user)) {
            $this->follows()->attach($user->id);
        }
    }

    public function unfollow(User $user)
    {
        if ($this->isFollowing($user)) {
            $this->follows()->detach($user->id);
        }
    }

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'followed_user_id')->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'followed_user_id', 'user_id')->withTimestamps();
    }

    // public function follow(User $userToFollow)
    // {
    //     return $this->following()->attach($userToFollow->id);
    // }

    // public function unfollow(User $userToUnfollow)
    // {
    //     return $this->following()->detach($userToUnfollow->id);
    // }

    // public function isFollowing(User $user)
    // {
    //     return $this->following()->where('follower_id', $user->id)->exists();
    // }

    // public function following()
    // {
    //     return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    // }
}
