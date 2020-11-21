@extends('layouts.app')
@section('title')
    Profile: {{ $user->name }}
@endsection
@section('content')
    <div class="d-flex">
        <div class="flex-grow-1">
            <h3 class="mt-3">Latest Posts</h3>
            @if(!empty($latest_posts[0]))
                @foreach($latest_posts as $latest_post)
                        <span class="text-muted">On {{ $latest_post->created_at->format('M d,Y \a\t h:i a') }}</span>
                        <p class="text-dark"><a href="{{ url('/'.$latest_post->slug) }}">{{ $latest_post->title }}</a></p>

                @endforeach
            @else
                <p>You have not written any post till now.</p>
            @endif
        </div>
        <div class="col-4">
            <ul class="list-group">
                <li class="list-group-item">
                    Joined on {{$user->created_at->format('M d,Y \a\t h:i a') }}
                </li>
                <li class="list-group-item panel-body">
                    <table class="table-padding">
                        <style>
                            .table-padding td{
                                padding: 3px 8px;
                            }
                        </style>
                        <tr>
                            <td>Total Posts</td>
                            <td> {{$posts_count}}</td>
                            @if($author && $posts_count)
                                <td><a href="{{ url('/my-all-posts')}}">Show All</a></td>
                            @endif
                        </tr>
                        <tr>
                            <td>Published Posts</td>
                            <td>{{$posts_active_count}}</td>
                            @if($posts_active_count)
                                <td><a href="{{ url('/user/'.$user->id.'/posts')}}">Show All</a></td>
                            @endif
                        </tr>
                        <tr>
                            <td>Posts in Draft </td>
                            <td>{{$posts_draft_count}}</td>
                            @if($author && $posts_draft_count)
                                <td><a href="{{ url('my-drafts')}}">Show All</a></td>
                            @endif
                        </tr>
                    </table>
                </li>
            </ul>
        </div>
    </div>
@endsection
