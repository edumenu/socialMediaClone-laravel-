@extends('layouts.app')

@section('content')
<div class="container">

  <div class="row">
    <div class="col">
      @if ($posts->count() > 0)
          @foreach($posts as $post)
              <div class="row">
                  <div class="col-10">
                      <a href="/profile/{{ $post->user->id }}">
                          <img src="/storage/{{ $post->image }}" class="w-100">
                      </a>
                  </div>
              </div>
              <div class="">
                  <div class="col-10">
                      <div>
                          <p>
                          <span class="font-weight-bold">
                              <a href="/profile/{{ $post->user->id }}">
                                  <span class="text-dark">{{ $post->user->username }}</span>
                              </a>
                          </span> {{ $post->caption }}
                          </p>
                      </div>
                  </div>
              </div>
          @endforeach

              <div class="row">
                  <div class="col-12 d-flex justify-content-center">
                      {{ $posts->links() }}   <!-- This links is used whenever we use pagination-->
                  </div>
              </div>
      @else
        <div class="row">
          <div class="container">
            <div class="jumbotron">
               <h1>There are no posts!</h1>
            </div>
          </div>
        </div>
      @endif
    </div>




    <div class="col col-lg-4">
      <li class="list-group-item list-group-item-secondary"> <strong>All Users</strong></li>
       @if($all_users->count() > 0)

        @foreach($all_users as $all_user)

        <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-light">
          <img src="{{ $all_user->profile->profileImage() }}" style="width: 4em;border-radius: 50%;">
           <a href="/profile/{{$all_user->id }}"> {{ $all_user->name }} </a>
        </li>

        @endforeach

      @else

      <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-light">
        There are no users
      </li>

       @endif
     </div>

  </div>

</div>
@endsection
