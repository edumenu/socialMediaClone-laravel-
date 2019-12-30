<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage()  //Creating a method to add a default image just incase the image is empty
    {
        $imagePath = ($this->image) ? $this->image : 'profile/default_avatar.jpg';

        return '/storage/' . $imagePath;
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }

    //Fetching a user ID
    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
