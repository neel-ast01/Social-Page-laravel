<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function follow()
    {
        return $this->belongsTo(Follow::class);
    }

    public function unfollow(User $userToUnfollow)
    {
        // Detach the provided user to unfollow from the list of followed users
        $this->following()->detach($userToUnfollow->id);
    }
}
