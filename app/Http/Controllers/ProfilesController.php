<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
  public function index($user)
  {
    //Getting the user model
      $user = User::findOrFail($user);
      return view('profiles.index', [
        'user' => $user,
      ]);
  }
}
