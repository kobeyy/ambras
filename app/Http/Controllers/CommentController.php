<?php

namespace App\Http\Controllers;

use App\Mail\CommentOnPost;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller {

    public function destroy(Request $request, $id)
    {
        $comment = Comment::find($id);
        if($comment && ($comment->post->author_id == $request->user()->id))
        {
            $comment->delete();
            $data['message'] = 'Comment deleted Successfully';
        }
        else
        {
            $data['errors'] = 'Invalid Operation. You have not sufficient permissions';
        }
        return back()->with($data);
    }

    public function store(Request $request)
    {
        $input['on_post'] = $request->input('on_post');
        $input['body'] = $request->input('body');
        $slug = $request->input('slug');
        $comment = Comment::create( $input );
        $post = Post::find($input['on_post']);
        $this->sendCommentMail($post, $comment);
        return redirect($slug)->with('message', 'Comment published');
    }

    private function sendCommentMail(Post $post, Comment $comment) {
        Mail::to($post -> author)->send(new CommentOnPost($comment, $post));
    }
}

