@extends('layouts.app')

@section('content')

{{-- -------------------------------------- Posts ------------------------------------ --}}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <h5>Followers</h5>
            @foreach ($followers as $user)
            <div class="card mb-3">
                <div class="card-header">
                    <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y" class="avatar"> {{ $user->name }}
                    <span class="float-right mt-2"> <a href="/profile/unfollow/{{ $user->id }}" class="btn btn-sm btn-danger"> Unfollow </a> </span>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-md-6">

            @foreach ($posts as $post)
                <div class="card mb-3">
                    <div class="card-header">
                       <div class="row">
                           <div class="col-md-8">
                                <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y" class="avatar"> {{ $post->name }}
                           </div>
                           <div class="col-md-4">
                               <a href="/post/{{ $post->id }}/edit" class="btn btn-primary"> Edit </a>
                               <a href="/post/{{ $post->id }}" class="btn btn-danger"> Delete </a>
                           </div>
                       </div>
                    </div>
                    <div class="card-body">
                        {{ $post->body }}
                    </div>
                    <div class="card-footer text-muted text-center">
                            {{ \Carbon\Carbon::parse($post->created_at)->diffForhumans() }}
                    </div>
                </div>
            @endforeach

        </div>

        <div class="col-md-3">
            <h5>Followings</h5>
            @if($followings == [] || $followings == "")
            no data
            @endif
            @foreach ($followings as $user)
            <div class="card mb-3">
                <div class="card-header">
                    <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y" class="avatar"> {{ $user->name }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
