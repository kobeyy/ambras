@extends('layouts.mail')

@section('title')
    Comment added on your post: <a href="{{url('/' . $post-> slug )}}">{{$post -> title}}</a>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <span class="text-muted float-right">{{ $comment->created_at->format('M d,Y \a\t h:i a') }}</span>
            {{ $comment->body }}
        </div>
    </div>
@endsection
