@extends('layouts.app')
@section('title')
    {{$title}}
@endsection
@section('content')
    @if ( !$posts->count() )
        There is no post till now. Login and write a new post now!!!
    @else
        @foreach( $posts as $post )
            <div class="card mb-2">
                <div class="card-body">
                    <h3 class="card-title"><a href="{{ url('/'.$post->slug) }}">{{ $post->title }}</a>
                        @if(!Auth::guest() && ($post->author_id == Auth::user()->id))
                            @if($post->active == '1')
                                <button class="btn float-right"><a href="{{ url('edit/'.$post->slug)}}">Edit Post</a></button>
                            @else
                                <button class="btn float-right"><a href="{{ url('edit/'.$post->slug)}}">Edit Draft</a></button>
                            @endif
                        @endif
                    </h3>
                    <span class="card-subtitle">{{ $post->created_at->format('M d,Y \a\t h:i a') }} By <a href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}</a></span>
                    <article>
                        {!! Str::limit($post->body, $limit = 500, $end = '....... <a href='.url("/".$post->slug).'>Read More</a>') !!}
                    </article>
                </div>
            </div>

        @endforeach
        {!! $posts->render() !!}
    @endif
@endsection
