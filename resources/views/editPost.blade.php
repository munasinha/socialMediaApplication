@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">Edit The Post</div>
                <div class="card-body">
                <form method="post" action="/post/{{ $post->id }}">
                                {{ csrf_field() }}
                            <div class="form-group">
                              <label for="body">Edit</label>
                              <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="3">{{ $post->body }}</textarea>
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
                          
                            <button type="submit" class="btn btn-primary float-right">Edit</button>
                        </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
