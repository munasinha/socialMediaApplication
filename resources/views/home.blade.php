@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <h5> People You May Know </h5>

            @foreach ($users_not_followed as $user)
            <div class="card mb-3">
                <div class="card-header">
                    <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y" class="avatar"> {{ $user->name }}
                    <span class="float-right mt-2"> <a href="/profile/follow/{{ $user->id }}" class="btn btn-sm btn-primary"> follow </a> </span>
                </div>
            </div>
            @endforeach

        </div>
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">Create New Post</div>
                <div class="card-body">
                        <form method="POST" action="{{ route('post.store') }}">
                                {{ csrf_field() }}
                            <div class="form-group">
                              <label for="body">Whats on your mind ...</label>
                              <textarea class="form-control @error('body') is-invalid @enderror "  id="body" name="body" rows="3"></textarea>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                          
                            <button type="submit" class="btn btn-primary float-right">Post</button>
                        </form>
                </div>
            </div>
            @foreach ($posts as $post)
                <div class="card mb-3">
                    <div class="card-header">
                        <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y" class="avatar"> {{ $post->name }}
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
    </div>
</div>
@endsection
