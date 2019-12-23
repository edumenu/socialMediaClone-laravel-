@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="https://cdn.pixabay.com/photo/2017/08/30/12/45/girl-2696947_960_720.jpg" class="rounded-circle w-100">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <!-- <div class="d-flex align-items-center pb-3"> -->
                    <div class="h4">{{ $user->username }}</div>
                    <a href="/p/create">Add new post</a>
                <!-- </div> -->

            </div>

            <div class="d-flex">
                <div class="pr-5"><strong>10k</strong> posts</div>
                <div class="pr-5"><strong>20k</strong> followers</div>
                <div class="pr-5"><strong>50k</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title}}</div>
            <div>{{ $user->profile->description}}</div>
            <div><a href="#">{{ $user->profile->url}}</a></div>
        </div>
    </div>

    <div class="row pt-5">
      @foreach($user->posts as $post)
          <div class="col-4 pb-4">
              <a href="">
                  <img src="/storage/{{ $post->image }}" class="w-100">
              </a>
          </div>
      @endforeach
    </div>
</div>
@endsection
