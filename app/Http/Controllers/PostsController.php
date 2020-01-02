<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); //this makes all these actions require a user to login in.
    }

    public function index(User $all_user)  //Displaying all the list of profiles a User is following
    {
        $all_users = User::all();  //Obtain all users
        $users = auth()->user()->following()->pluck('profiles.user_id'); //Pluck retrieves all of the values for a given key
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);   //Searching for all the posts of the users you are following
        $follows = (auth()->user()) ? auth()->user()->following->contains($all_user->id) : false;  //Checking the user following status

        return view('posts.index', compact('posts', 'all_users','follows'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200); //Image intervention resizes the image
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]); //Creating a post using the authenticated user

        return redirect('/profile/' . auth()->user()->id);  //Grabbing the auth user and redering to the profile page.
    }

    public function show(\App\Post $post) //Laravel fetching our Post automatically by using \App\Post
    {
        return view('posts.show', compact('post'));    //
    }
}
