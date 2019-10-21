@extends('layouts.app')

@section('search')

<div class="container">
        @if(isset($details))
            <p> The Search results for your query <b> {{ $query }} </b> are :</p>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Follow</th>
                </tr>
            </thead>
            <tbody>
                @foreach($details as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>
                        <a href="" class="btn btn-info"> Follow </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
</div>
                        
@endsection