<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewUserWelcomeMail;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()   //This method gets called when we're creating this method
    {
        parent::boot();

        static::created(function ($user) {  //Created event gets fired when a new model is saved or updated in the database.
            $user->profile()->create([  //This creates an empty profile with only title
                'title' => $user->username,
            ]);

            Mail::to($user->email)->send(new NewUserWelcomeMail());
        });
    }

    public function posts()
     {
         return $this->hasMany(Post::class)->orderBy('created_at', 'DESC');   //Changing the order of posts
     }

    public function following()   //This method is for  users following profiles
     {
          return $this->belongsToMany(Profile::class);
     }

    public function profile()
      {
         return $this->hasOne(Profile::class);
      }
}
