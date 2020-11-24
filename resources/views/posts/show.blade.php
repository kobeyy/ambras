@extends('layouts.app')
@section('title')
@if($post)
{{ $post->title }}
@if(!Auth::guest() && ($post->author_id == Auth::user()->id))
<button class="btn" style="float: right"><a href="{{ url('edit/'.$post->slug)}}">Edit Post</a></button>
@endif
@else
Page does not exist
@endif
@endsection
@section('title-meta')
<p>{{ $post->created_at->format('M d,Y \a\t h:i a') }} By <a href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}</a></p>
@endsection
@section('content')
@if($post)
<div>
    {!! $post->body !!}
</div>

<hr>
    <form class="form-inline" method="post" action="/comment/add">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="on_post" value="{{ $post->id }}">
        <input type="hidden" name="slug" value="{{ $post->slug }}">

        <div class="form-group flex-grow-1">
            <input required="required" placeholder="Add comment" name="body" id="comment" class="form-control w-100">
        </div>
        <button type="submit" name='post_comment' class="btn btn-primary ml-2" value = "Post">Submit</button>
    </form>
<br>
    @if($comments)
        @foreach($comments as $comment)
        <div class="media">
            <div class="media-body">
                <span class="text-muted float-right">{{ $comment->created_at->format('M d,Y \a\t h:i a') }}</span>
                @if(!Auth::guest() && ($post->author_id == Auth::user()->id))
                    <div class="btn-group">
                        <button class="btn btn-danger btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <form class="form-inline" method="post" action="/comment/delete/{{$comment->id}}">
                            @csrf
                            <div class="dropdown-menu">
                                <div class="dropdown-item" onclick="this.closest('form').submit();return false;">
                                        delete
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
                {{ $comment->body }}
            </div>
        </div>
        <hr>
        @endforeach
    @else
        <span>No comments for this post</span>
    @endif
@else
404 error
@endif
@endsection
