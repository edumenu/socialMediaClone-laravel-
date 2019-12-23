<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $guarded = [];  //This specifies no fields are mass assignable

  public function user()
  {
      return $this->belongsTo(User::class);
  }
}
