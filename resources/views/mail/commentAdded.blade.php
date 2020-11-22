<div class="card">
<div class="card-body">
    <h4 class="card-title">
        Comment added on your post: <a href="{{url('/' . $post-> slug )}}">{{$post -> title}}</a>
    </h4>
    <div class="media">
        <div class="media-body">
            <span class="text-muted float-right">{{ $comment->created_at->format('M d,Y \a\t h:i a') }}</span>
            {{ $comment->body }}
        </div>
    </div>
</div>
</div>
